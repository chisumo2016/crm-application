<?php

namespace App\Providers;

use App\Models\Business;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::before(function (User $user, $permission) {
            $business = Business::find(session('businessId'));
                //$business->isNotEmpty() &&
            if($business->plan->permissions->flatten()->pluck('name')->unique()->contains($permission)) {
                return $user->permissions()->contains($permission);

            }else{
                //abort('403', 'This feature not available');
                return  false;
            }

        });
    }
}
//return $this->roles->map->permissions->flatten()->pluck('name')->unique();
