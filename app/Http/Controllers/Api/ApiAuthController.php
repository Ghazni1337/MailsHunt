<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Tenant;
use App\User;
use JWTAuth;
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
            return response()->json(['errors'=>$validator->errors()->all()], 422);
        }

        $fqdn = $this->createFQDN($request);

        $tenant = Tenant::create($fqdn);

        $user = $this->create($request->all());

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
            $acct_slug = str_replace(' ', '-', strtolower($request->company_name) );
        }else{

            $acct_slug = strtolower( $request->f_name.$request->l_name); 

        }
        //create a unique fqdn using either the company name or user's names slug and the app's base url
        return $acct_slug.'.'.$baseUrl;
    }

    public function validator(array $data)
    {
        $msg = ['company_name.regex' => 'Company name may only contain letters, hyphens and whitespaces'];
        return Validator::make($data, [
            'l_name' => 'required|string|max:255',
            'f_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6|confirmed',
            'phone' => 'required',

            'company_name'  => 'string|min:3|regex:/^[\pL\s\-]+$/u'
            'company_name'  => 'required|string|min:3|regex:/^[\pL\s\-]+$/u'

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
                'message' => 'Invalid Email or Password',
            ], 401);
        }

        return response()->json([
            'success' => true,
            'user'    => auth()->user(),
            'user'    => JWTAuth::toUser($token),
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
}
