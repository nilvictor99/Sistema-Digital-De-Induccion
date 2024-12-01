<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Policies\RolePolicy;
use App\Policies\PermissionPolicy;


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
        Model::unguard();

        // Definir permisos para Activity
        Gate::define('view Activity', function ($user) {
            return $user->hasPermissionTo('view Activity');
        });

        Gate::define('create Activity', function ($user) {
            return $user->hasPermissionTo('create Activity');
        });

        Gate::define('update Activity', function ($user) {
            return $user->hasPermissionTo('update Activity');
        });

        Gate::define('delete Activity', function ($user) {
            return $user->hasPermissionTo('delete Activity');
        });

        // Repetir para todas las categorías y permisos
        foreach (['Category', 'Content', 'Tool', 'User'] as $category) {
            Gate::define("view {$category}", function ($user) use ($category) {
                return $user->hasPermissionTo("view {$category}");
            });

            Gate::define("create {$category}", function ($user) use ($category) {
                return $user->hasPermissionTo("create {$category}");
            });

            Gate::define("update {$category}", function ($user) use ($category) {
                return $user->hasPermissionTo("update {$category}");
            });

            Gate::define("delete {$category}", function ($user) use ($category) {
                return $user->hasPermissionTo("delete {$category}");
            });
        }

        Gate::before(function (User $user, string $ability) {
            return $user->isSuperAdmin() ? true : null;
        });
    }
}
