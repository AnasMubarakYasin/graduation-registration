<?php

namespace App\Policies;

use App\Models\Admin;
use App\Models\Registrar;
use Illuminate\Auth\Access\HandlesAuthorization;

class RegistrarPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\Admin  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(Admin $user)
    {
        return $user->is_administrator;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Admin  $user
     * @param  \App\Models\Registrar  $registrar
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Admin $user, Registrar $registrar)
    {
        return $user->is_administrator;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Admin  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(Admin $user)
    {
        return $user->is_administrator;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Admin  $user
     * @param  \App\Models\Registrar  $registrar
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Admin $user, Registrar $registrar)
    {
        return $user->is_administrator;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Admin  $user
     * @param  \App\Models\Registrar  $registrar
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Admin $user, Registrar $registrar)
    {
        return $user->is_administrator;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Admin  $user
     * @param  \App\Models\Registrar  $registrar
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Admin $user, Registrar $registrar)
    {
        return $user->is_administrator;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Admin  $user
     * @param  \App\Models\Registrar  $registrar
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Admin $user, Registrar $registrar)
    {
        return $user->is_administrator;
    }

    public function validate(Admin $user, Registrar $registrar)
    {
        return $user->is_administrator | $user->is_academic_operator | $user->is_faculty_operator;
    }
}
