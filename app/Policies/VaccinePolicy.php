<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Vaccine;
use Illuminate\Auth\Access\Response;

class VaccinePolicy
{

    public function viewAny(User $user)
    {
        return ($user->is_admin) ? Response::allow() : Response::denyWithStatus(403, 'No tiene permisos para acceder a esta página');
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(User $user, Vaccine $vaccine)
    {
        return Response::denyWithStatus(404, 'Página inexistente');
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user)
    {
        return ($user->is_admin) ? Response::allow() : Response::denyWithStatus(403, 'No tiene permisos para acceder a esta página');
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(User $user, Vaccine $vaccine)
    {
        return ($user->is_admin) ? Response::allow() : Response::denyWithStatus(403, 'No tiene permisos para acceder a esta página');
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(User $user, Vaccine $vaccine)
    {
        return ($user->is_admin) ? Response::allow() : Response::denyWithStatus(403, 'No tiene permisos para acceder a esta página');
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(User $user, Vaccine $vaccine)
    {
        return ($user->is_admin) ? Response::allow() : Response::denyWithStatus(403, 'No tiene permisos para acceder a esta página');
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(User $user, Vaccine $vaccine)
    {
        return ($user->is_admin) ? Response::allow() : Response::denyWithStatus(403, 'No tiene permisos para acceder a esta página');
    }
}
