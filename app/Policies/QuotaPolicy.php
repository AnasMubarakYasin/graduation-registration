<?php

namespace App\Policies;

use App\Models\Quota;
use App\Models\Admin;
use Illuminate\Auth\Access\HandlesAuthorization;

class QuotaPolicy
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
     * @param  \App\Models\Quota  $quota
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(Admin $user, Quota $quota)
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
     * @param  \App\Models\Quota  $quota
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(Admin $user, Quota $quota)
    {
        return $user->is_administrator;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\Admin  $user
     * @param  \App\Models\Quota  $quota
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(Admin $user, Quota $quota)
    {
        return $user->is_administrator;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\Admin  $user
     * @param  \App\Models\Quota  $quota
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(Admin $user, Quota $quota)
    {
        return $user->is_administrator;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\Admin  $user
     * @param  \App\Models\Quota  $quota
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(Admin $user, Quota $quota)
    {
        return $user->is_administrator;
    }
}
