<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Laravel\Passport\Passport;

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
    public function boot(): void
    {
        $this->registerPolicies();

        // No more Passport::routes()
        // Passport routes are automatically registered by PassportServiceProvider in Laravel 10

        // Optional: If you want, you can customize models
        Passport::useClientModel(\Laravel\Passport\Client::class);
        Passport::useTokenModel(\Laravel\Passport\Token::class);
        Passport::useRefreshTokenModel(\Laravel\Passport\RefreshToken::class);
        Passport::useAuthCodeModel(\Laravel\Passport\AuthCode::class);
        Passport::usePersonalAccessClientModel(\Laravel\Passport\PersonalAccessClient::class);

        Gate::define('isAdmin', function ($user) {
            return $user->role == 'admin';
        });
        Gate::define('isSubadmin', function ($user) {
            return $user->role == 'sub-admin';
        });
        Gate::define('isStudent', function ($user) {
            return $user->role == 'student';
        });
        Gate::define('isOfficial', function ($user) {
            return $user->role == 'official';
        });
        Gate::define('isSubofficial', function ($user) {
            return $user->role == 'sub-official';
        });
        Gate::define('isAdminOrSubadmin', function ($user) {
            return $user->role == 'admin' || $user->role == 'sub-admin';
        });
        Gate::define('isSubadminOrOfficial', function ($user) {
            return $user->role == 'sub-admin' || $user->role == 'official';
        });
        Gate::define('isAllowed', function ($user) {
            return in_array($user->role, ['admin', 'sub-admin', 'official', 'sub-official']);
        });
        Gate::define('isAccepted', function ($user) {
            return in_array($user->role, ['admin', 'sub-admin', 'official', 'sub-official']);
        });
    }
}
