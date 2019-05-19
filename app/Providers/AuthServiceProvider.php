<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use Illuminate\Contracts\Auth\Access\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Project' => 'App\Policies\ProjectPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(Gate $gate)
    {
        $this->registerPolicies();

        // $gate->before(function ($user) {
        //     if ($user->id == 2) return true;
            
        //     //this is admin id  //will no longer go to ProjectPolicy becase of before hook??
        // });

        $gate->before(function ($user) {
            if ($user->id == 2) {
                return true;
            }
        });

        //
    }
}
