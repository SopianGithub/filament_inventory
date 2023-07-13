<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Policies\RolePolicy;
use App\Policies\UserPolicy;
use App\Policies\PermissionPolicy;
use Spatie\Permission\Models\Permission;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Permission::class => PermissionPolicy::class,
        Permission::class => RolePolicy::class,
        Permission::class => UserPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}
