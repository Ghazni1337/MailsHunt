<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Hyn\Tenancy\Environment;
use Hyn\Tenancy\Models\Website;
use Hyn\Tenancy\Models\Hostname;
use Whoops\Exception\ErrorException;
use Closure;

class IdentifyTenant
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (request()->has('fqdn')) {
            // Retrieve your hostname
            $hostname = Hostname::where('fqdn', request()->fqdn)->first();

            if ($hostname) {
                $website = $hostname->website;
                
                // Now switch the environment to a new tenant.
                // app(Environment::class)->hostname($hostname);
                app(Environment::class)->tenant($website);
            }else{
                return response()->json(['success'=>false, 'message'=>'Invalid email or password']);
            }
        }

        return $next($request);
    }
}
