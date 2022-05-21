<?php

namespace App\Policies;

use App\Models\AmenitySchedule;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class AmenitySchedulePolicy
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
        return $user->can('view-any-amenity-schedule');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AmenitySchedule  $amenitySchedule
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, AmenitySchedule $amenitySchedule)
    {
        return $user->can('view-amenity-schedule');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('create-amenity-schedule');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AmenitySchedule  $amenitySchedule
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, AmenitySchedule $amenitySchedule)
    {
        return $user->can('update-amenity-schedule');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AmenitySchedule  $amenitySchedule
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, AmenitySchedule $amenitySchedule)
    {
        return $user->can('delete-amenity-schedule');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AmenitySchedule  $amenitySchedule
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, AmenitySchedule $amenitySchedule)
    {
        return $user->can('restore-amenity-schedule');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\AmenitySchedule  $amenitySchedule
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, AmenitySchedule $amenitySchedule)
    {
        return $user->can('force-delete-amenity-schedule');
    }
}
