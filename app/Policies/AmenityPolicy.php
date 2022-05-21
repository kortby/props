<?php

namespace App\Policies;

use App\Models\Amenity;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AmenityPolicy
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
        return $user->can('view-any-amenity');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Amenity  $amenity
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Amenity $amenity)
    {
        return $user->can('view-amenity');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('create-amenity');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Amenity  $amenity
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Amenity $amenity)
    {
        return $user->can('update-amenity');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Amenity  $amenity
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Amenity $amenity)
    {
        return $user->can('delete-amenity');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Amenity  $amenity
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Amenity $amenity)
    {
        return $user->can('restore-amenity');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Amenity  $amenity
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Amenity $amenity)
    {
        return $user->can('force-delete-amenity');
    }
}
