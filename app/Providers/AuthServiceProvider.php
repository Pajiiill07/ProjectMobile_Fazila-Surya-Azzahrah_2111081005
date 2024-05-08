<?php

namespace App\Providers;


use App\Models\User;
use Gate;
// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('isAdmin', function ($user) {
            return $user->hak_akses === 'Admin';
        });

        Gate::define('isManager', function ($user) {
            return $user->hak_akses === 'Manager';
        });

        Gate::define('isKeuangan', function ($user) {
            return $user->hak_akses === 'Keuangan';
        });
    }
}
