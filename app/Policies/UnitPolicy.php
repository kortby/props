<?php

namespace App\Policies;

use App\Models\Unit;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UnitPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function viewAny(User $user)
    {
        return $user->can('view-any-unit');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Unit $unit)
    {
        if(auth()->user()->hasAnyRole(config('roles-permissions'))) {

            return $user->can('view-unit');

        }

        return $user->can('view-unit') && $unit->user_id === auth()->user()->id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('create-unit');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Unit $unit)
    {
        return $user->can('update-unit') && $unit->user_id === auth()->user()->id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Unit $unit)
    {
        return $user->can('delete-unit') && $unit->user_id === auth()->user()->id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Unit $unit)
    {
        return $user->can('restore-unit') && $unit->user_id === auth()->user()->id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Unit  $unit
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Unit $unit)
    {
        return $user->can('force-delete-unit') && $unit->user_id === auth()->user()->id;
    }
}
