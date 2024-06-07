<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // Register your model policies
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot()
    {
        $this->registerPolicies();

        // Define a gate to check if the user is a Merchandiser
        Gate::define('is-merchandiser', function (User $user) {
            return $user->role->name == 'Merchandiser';
        });

        // Define a gate to check if the user is a SuperAdmin
        Gate::define('is-superadmin', function (User $user) {
            return $user->role->name == 'SuperAdmin';
        });

        // Define a gate to check if the user is a customer
        Gate::define('is-customer', function (User $user) {
            return $user->role->name == 'Customer';
        });

        // Define a gate to check if the user is superadmin or merchandiser
        Gate::define('is-superadmin-or-merchandiser', function (User $user) {
            return $user->role->name == 'SuperAdmin' || $user->role->name == 'Merchandiser';
        });
    }
}
