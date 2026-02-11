<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Policies\PermissionPolicy;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [];

    public function boot()
    {
        $this->registerPolicies();

        Gate::define('gerer-stock', [PermissionPolicy::class, 'gererStock']);
        Gate::define('gerer-ventes', [PermissionPolicy::class, 'gererVentes']);
        Gate::define('admin', fn($user) => $user->role === 'admin');
    }
}