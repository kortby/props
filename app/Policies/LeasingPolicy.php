<?php

namespace App\Policies;

use App\Models\Leasing;
use App\Models\User;
use App\Services\GetParentAndChildByAuthenticated;
use Illuminate\Auth\Access\HandlesAuthorization;

class LeasingPolicy
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
        return $user->can('view-any-leasing');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Amenity  $amenity
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Leasing $leasing)
    {
        return $user->can('view-leasing') && $this->getEligibleUserIds($amenity);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('create-leasing');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Amenity  $amenity
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Leasing $leasing)
    {
        return $user->can('update-leasing') && $this->getEligibleUserIds($amenity);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Amenity  $amenity
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Leasing $leasing)
    {
        return $user->can('delete-leasing') && $this->getEligibleUserIds($amenity);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Amenity  $amenity
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Leasing $leasing)
    {
        return $user->can('restore-leasing') && $this->getEligibleUserIds($amenity);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Amenity  $amenity
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Leasing $leasing)
    {
        return $user->can('force-delete-leasing') && $this->getEligibleUserIds($amenity);
    }

    private function getEligibleUserIds(Leasing $leasing): bool
    {
        return in_array($leasing->user_id, (new GetParentAndChildByAuthenticated())->handle());
    }
}
