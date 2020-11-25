<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Tenant;
use App\User;
use JWTAuth;
use App\Code;
use App\Account;
use Hyn\Tenancy\Environment;
use Hyn\Tenancy\Models\Website;
use Hyn\Tenancy\Models\Hostname;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\JWTException;

class ApiAuthController extends Controller 
{
    public $loginAfterSignUp = true;

    public function registerTenant(Request $request)
    {   
        $validator = $this->validator($request->all());

        if ($validator->fails())
        {
            return response()->json(['success'=>false,'errors'=>$validator->errors()->all()], 422);
        }

        $fqdn = $this->createFQDN($request);

        //send built fqdn and email to be attached to the user's website
        $tenant = Tenant::create($fqdn, $request->email);

        $user = $this->create($request->all());

        //save account details for easy gen admin access
        $this->saveAccount($user, $fqdn);
        //send email verification 
        $this->verifyEmail($user, $fqdn); 

        $credentials = $request->only('email', 'password');
        if ($this->loginAfterSignUp) {
            $token = JWTAuth::attempt($credentials);
        }

        return response()->json([
            'success'   => true,
            'user'      => $user,
            'token'     => $token,
            'fqdn'      => $tenant->hostname->fqdn
        ], 200);
    }

    private function verifyEmail(User $user, $fqdn)
    {
        $data = [];
        $urlToken = $this->genUrlToken();
        $data['url'] = "https://www.mailshunt.com?token=".$urlToken."&fqdn=".$fqdn;
        $data['user'] = $user;

        $beautymail = app()->make(\Snowfire\Beautymail\Beautymail::class);
        $beautymail->send('emails.verify', ['data'=>$data], function($message) use ($user)
        {
            $message
                ->from('support@mailshunt.com','MailsHunt.com')
                ->to($user->email)
                ->subject('Email Verification');
        });
        return true;
    }

    public function genUrlToken()
    {
        $code = md5(microtime().time());

        Code::create(['verification_code'=>$code]);

        return $code;
    }

    // function to create fully qualified domain name
    private function createFQDN(Request $request)
    {
        $baseUrl = config('app.url_base');
        
        $acct_slug = '';
        if (!empty($request->company_name)) {
            //create account slug from company name
            $acct_slug = str_replace(' ', '-', strtolower($request->company_name) ).time();
        }else{

            $acct_slug = strtolower( $request->f_name.time().$request->l_name.time() ); 
            // $acct_slug = str_replace(' ', '-', strtolower($request->company_name) );
        }

            // $acct_slug = strtolower( $request->f_name.$request->l_name); 

        //create a unique fqdn using either the company name or user's names slug and the app's base url
        return $acct_slug.'.'.$baseUrl;
    }

    public function validator(array $data)
    {
        $msg = [
            'company_name.regex' => 'Company name may only contain letters, hyphens and whitespaces',
            'f_name.required'    => 'The first name field is required',
            'f_name.string'      => 'The first name must be text',
            'f_name.max'         => 'The first name too long (Max: 220)',
            'l_name.required'    => 'The last name field is required',
            'l_name.string'      => 'The last name must be text',
            'l_name.max'         => 'The last name is too long (Max: 220)',
        ];
        return Validator::make($data, [
            'l_name' => 'required|string|max:255',
            'f_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6|confirmed',
            'phone' => 'required',

            'company_name'  => 'sometimes|string|min:3|regex:/^[\pL\s\-]+$/u',

        ], $msg);
    }

    public function create(array $data)
    {   
        $user = User::create([
            'l_name' => $data['l_name'],
            'f_name' => $data['f_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
        ]);

        $user->role = 'admin';
        $user->save();

        return $user;
    }

    public function login(Request $request)
    {
        $input = $request->only('email', 'password');
        $token = null;

        if (!$token = JWTAuth::attempt($input)) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid email or password',
            ], 401);
        }

        return response()->json([
            'success' => true,
            'user'    => auth()->user(),
            'fqdn'    => $request->fqdn,
            'token' => $token,
        ]);
    }

    public function logout(Request $request)
    {
        $this->validate($request, [
            'token' => 'required'
        ]);

        try {
            JWTAuth::invalidate($request->token);

            return response()->json([
                'success' => true,
                'message' => 'User logged out successfully'
            ]);
        } catch (JWTException $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, the user cannot be logged out'
            ], 500);
        }
    }

    public function findFQDN(Request $request)
    {
        // Retrieve email-type hostname
        $hostname = Hostname::where('fqdn', $request->email)->first();
        if ($hostname) {
            return response()->json([
                'success' => true,
                'fqdn'    => $hostname->fqdn
            ]);
        }

        return response()->json([
            'success'   => false,
            'message'   => 'No accounts found for this email address'
        ]);
    }

    public function saveAccount(User $user, $fqdn)
    {
        $acct_name = '';

        if (!empty($user->company_name)) {
            $acct_name = $user->company_name;
        }else{
            $acct_name = $user->f_name." ".$user->l_name;
        }
        Account::create(['fqdn' => $fqdn, 'acct_name' => $acct_name]);
        return true;
    }
}
