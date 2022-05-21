<?php

namespace App\Policies;

use App\Models\UnitFeature;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UnitFeaturePolicy
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
        return $user->can('view-any-unit-feature');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\UnitFeature  $unitFeature
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, UnitFeature $unitFeature)
    {
        return $user->can('view-unit-feature');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('create-unit-feature');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\UnitFeature  $unitFeature
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, UnitFeature $unitFeature)
    {
        return $user->can('update-unit-feature');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\UnitFeature  $unitFeature
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, UnitFeature $unitFeature)
    {
        return $user->can('delete-unit-feature');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\UnitFeature  $unitFeature
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, UnitFeature $unitFeature)
    {
        return $user->can('restore-unit-feature');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\UnitFeature  $unitFeature
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, UnitFeature $unitFeature)
    {
        return $user->can('force-delete-unit-feature');
    }
}
