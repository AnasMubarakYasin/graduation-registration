<?php

namespace App\Policies;

use App\Models\Administrator;
use App\Models\Operator;
use App\Models\Registrar;
use Illuminate\Auth\Access\HandlesAuthorization;

class RegistrarPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\Administrator|Operator  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(Administrator|Operator $user)
    {
        return $user->is_administrator || $user->is_academic || $user->is_faculty;
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\Administrator|Operator  $user
     * @param  \App\Models\Registrar  $registrar
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Administrator|Operator $user, Registrar $registrar)
    {
        return $user->is_administrator;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\Administrator|Operator  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(Administrator|Operator $user)
    {
        return $user->is_administrator;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\Administrator|Operator  $user
     * @param  \App\Models\Registrar  $registrar
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Administrator|Operator $user, Registrar $registrar)
    {
        return $user->is_administrator;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Administrator|Operator  $user
     * @param  \App\Models\Registrar  $registrar
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Administrator|Operator $user, Registrar $registrar)
    {
        return $user->is_administrator;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Administrator|Operator  $user
     * @param  \App\Models\Registrar  $registrar
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Administrator|Operator $user, Registrar $registrar)
    {
        return $user->is_administrator;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Administrator|Operator  $user
     * @param  \App\Models\Registrar  $registrar
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Administrator|Operator $user, Registrar $registrar)
    {
        return $user->is_administrator;
    }

    public function validate(Administrator|Operator $user, Registrar $registrar)
    {
        return $user->is_administrator || $user->is_academic || $user->is_faculty;
    }
}
