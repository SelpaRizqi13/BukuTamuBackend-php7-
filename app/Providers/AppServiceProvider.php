<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
		Paginator::useBootstrap();

        Gate::define('roles', function(User $user){
            return $user->roles == 'super admin';
        });

        Gate::define('admin', function(User $user)
        {
            return $user->roles == 'admin' ||  $user->roles == 'super admin';
        });

        Gate::define('user', function(User $user)
        {
            return $user->roles == 'user';
        });
    }
}
