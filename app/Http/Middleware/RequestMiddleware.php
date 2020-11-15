<?php

namespace App\Http\Middleware;

use App\Stat;
use Closure;
use Illuminate\Support\Carbon;

class RequestMiddleware
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
        $stats =  Stat::where('ip', request()->ip())->orderBy('id', 'DESC')->get();
        if (isset($stats[4]) && Carbon::parse($stats[4]->created_at)->addHour()->gt(Carbon::now())) {
            $message = "You are doing that too much. Try again in " . str_replace(' after', '.', Carbon::parse($stats[2]->created_at)->addHour()->diffForHumans(Carbon::now()));
            if ($request->path() === "domain-search") {
                return response()->json($message);
            } else {
                return response()->json($message);
            }
        }

        return $next($request);
    }
}
