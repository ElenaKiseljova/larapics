<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Enums\Role;
use App\Models\Image;
use App\Models\User;
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
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        Gate::define('update-image', function (User $user, Image $image) {
            return $user->id === $image->user_id || $user->role === Role::Editor;
        });

        Gate::define('delete-image', function (User $user, Image $image) {
            return $user->id === $image->user_id;
        });

        Gate::before(function (User $user, $ability) {
            if ($user->role === Role::Admin) {
                return true;
            }
        });
    }
}
