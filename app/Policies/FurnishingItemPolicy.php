<?php

namespace App\Policies;

use App\Models\FurnishingItem;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class FurnishingItemPolicy
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
        return $user->can('view-any-furnishing-item');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\FurnishingItem  $furnishingItem
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, FurnishingItem $furnishingItem)
    {
        return $user->can('view-furnishing-item');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('create-furnishing-item');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\FurnishingItem  $furnishingItem
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, FurnishingItem $furnishingItem)
    {
        return $user->can('update-furnishing-item');
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\FurnishingItem  $furnishingItem
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, FurnishingItem $furnishingItem)
    {
        return $user->can('delete-furnishing-item');
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\FurnishingItem  $furnishingItem
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, FurnishingItem $furnishingItem)
    {
        return $user->can('restore-furnishing-item');
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\FurnishingItem  $furnishingItem
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, FurnishingItem $furnishingItem)
    {
        return $user->can('force-delete-furnishing-item');
    }
}
