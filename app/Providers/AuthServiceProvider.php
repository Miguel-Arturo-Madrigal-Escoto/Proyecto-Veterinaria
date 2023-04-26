<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\Appointment;
use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Access\Response;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        'App\Models\Pet' => 'App\Policies\PetPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // - Gates
        Gate::define('show-admin-dashboard', function (User $user){
            return $user->is_admin;
        });

        Gate::define('show-admin-navigation', function (User $user){
            return $user->is_admin;
        });

        // Users
        Gate::define('show-users', function (User $user){
            return $user->is_admin;
        });

        // Appointments
        Gate::define('show-all-appointments', function (User $user) {
            return $user->is_admin;
        });

        Gate::define('retrieve-all-pets', function (User $user) {
            return $user->is_admin;
        });

        Gate::define('show-appointment', function (User $user, Appointment $appointment) : Response {
            return ($user->is_admin || $user->id === $appointment->user_id)? Response::allow() : Response::denyWithStatus(403, 'No es posible ver esta cita');
        });

        Gate::define('update-appointment', function (User $user, Appointment $appointment) : Response {
            return ($user->is_admin || $user->id === $appointment->user_id)? Response::allow() : Response::denyWithStatus(403, 'No es posible actualizar esta cita');
        });

        Gate::define('delete-appointment', function (User $user, Appointment $appointment) : Response {
            return ($user->is_admin || $user->id === $appointment->user_id)? Response::allow() : Response::denyWithStatus(403, 'No es posible eliminar esta cita');
        });


    }
}
