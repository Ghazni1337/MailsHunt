<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Hyn\Tenancy\Environment;
use Hyn\Tenancy\Models\Website;
use Hyn\Tenancy\Models\Hostname;
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

            // $arrHost = $hostname->toArray();
            // return response()->json($arrHost['website_id']);
            // $website = Website::where('id', $arrHost['website_id'])->first();
            
            $website = $hostname->website;
            
            // Now switch the environment to a new tenant.
            // app(Environment::class)->hostname($hostname);
            app(Environment::class)->tenant($website);
            // $environment->hostname($hostname);
        }

        return $next($request);
    }
}
