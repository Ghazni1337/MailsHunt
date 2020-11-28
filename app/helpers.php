<?php
use App\Plan;
use App\Account;

if ( ! function_exists('pageJsonData')){
    function pageJsonData(){


        $jobModalOpen = false;
        if (session('job_validation_fails')){
            $jobModalOpen = true;
        }

        $data = [
            'home_url'                    => route('home'),
            'asset_url'                   => asset('assets'),
            'csrf_token'                  => csrf_token(),
        ];

        $routeLists = \Illuminate\Support\Facades\Route::getRoutes();

        $routes = [];
        foreach ($routeLists as $route){
            $routes[$route->getName()] = $data['home_url'].'/'.$route->uri;
        }
        $data['routes'] = $routes;

        return json_encode($data);
    }
}

if (! function_exists('plansCount')) {
    function plansCount(){
        return Plan::all()->count();
    }
}

function accountsCount()
{
    return Account::all()->count();
}

?>