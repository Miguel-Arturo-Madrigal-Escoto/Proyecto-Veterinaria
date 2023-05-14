<?php

namespace App\Providers;

use App\Models\Appointment;
use App\Models\Pet;
use App\Models\User;
use App\Models\Vaccine;
use App\Policies\PetPolicy;
use App\Policies\VaccinePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Auth\Access\Response;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Vaccine::class => VaccinePolicy::class,
        Pet::class => PetPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // register own account verification email
        VerifyEmail::toMailUsing(function ($notifiable, $url){
            $mail = new MailMessage;
            $mail->subject('Bienvenido!');
            $mail->markdown('emails.verify-email', ['url' => $url]);
            return $mail;
        });

        Gate::guessPolicyNamesUsing(function (string $modelClass) {
            return 'App\\Http\\Policies\\' . class_basename($modelClass) . 'Policy';
        });

        // - Gates
        Gate::define('show-admin-dashboard', function (User $user){
            return $user->is_admin;
        });

        Gate::define('show-admin-navigation', function (User $user){
            return $user->is_admin;
        });

        Gate::define('edit-appointment-as-admin', function (User $user){
            return $user->is_admin;
        });

        Gate::define('show-errors-as-authenticated', function (User $user){
            return !is_null($user);
        });

        // Users
        Gate::define('show-users', function (User $user){
            return $user->is_admin;
        });

        // Appointments

        // should not edit the appointment if is finished
        Gate::define('edit-appointment-not-finished', function(User $user, Appointment $appointment){
            return $appointment->status != 3;
        });

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

        Gate::define('add-user-to-pet', function(User $user){
            return $user->is_admin;
        });

        Gate::define('admin-user-pet', function(User $user){
            return $user->is_admin;
        });

    }
}
