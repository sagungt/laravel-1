<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Enums\UserType;
use App\Models\User;
use Illuminate\Support\Facades\Gate;
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
        Gate::define('admin', function (User $user) {
            return $user->getAttribute('type') === UserType::ADMIN;
        });
        Gate::define('applicant', function (User $user) {
            return $user->getAttribute('type') === UserType::APPLICANT;
        });
        Gate::define('pre-member', function (User $user) {
            return $user->getAttribute('type') === UserType::PRE_MEMBER && !$user->getAttribute('is_enrolled');
        });
        Gate::define('member', function (User $user) {
            return $user->getAttribute('type') === UserType::MEMBER && $user->getAttribute('is_enrolled');
        });
    }
}
