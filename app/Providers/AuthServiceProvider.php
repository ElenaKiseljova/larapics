<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Enums\Role;
use App\Models\Image;
use App\Models\User;
// use App\Policies\ImagePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // Image::class => ImagePolicy::class
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        // Gate::define('update-image', [ImagePolicy::class, 'update']);

        // Gate::define('delete-image', [ImagePolicy::class, 'delete']);

        Gate::before(function (User $user, $ability) {
            if ($user->role === Role::Admin) {
                return true;
            }
        });
    }
}
