<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
        // define a admin user role
        // returns true if user role is set to admin
        Gate::define('admin', function($user) {
            return $user->role == 'admin';
        });

        // define a author user role
        // returns true if user role is set to author
        Gate::define('author', function($user) {
            return $user->role == 'author';
        });

        // define a author user role
        // returns true if user role is set to author
        Gate::define('registered', function($user) {
            return $user->role == 'registered';
        });

        Gate::define('create-user', function($user) {
            return $user->role == 'admin';
        });

        Gate::define('index-user', function($user) {
            return $user->role == 'admin';
        });

        Gate::define('view-user', function($user) {
            return $user->role == 'admin';
        });

        Gate::define('delete-user', function($user) {
            return $user->role == 'admin';
        });

        Gate::define('store-user', function($user) {
            return $user->role == 'admin';
        });

        Gate::define('update-user', function($user) {
            return $user->role == 'admin';
        });
    }
}
