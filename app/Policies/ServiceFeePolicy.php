<?php

namespace App\Policies;

use App\Models\Amenity;
use App\Models\ServiceFee;
use App\Models\User;
use App\Services\GetParentAndChildByAuthenticated;
use Illuminate\Auth\Access\HandlesAuthorization;

class ServiceFeePolicy
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
        return $user->can('view-any-service-fee');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ServiceFee $serviceFee
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, ServiceFee $serviceFee)
    {
        return $user->can('view-service-fee') && $this->getEligibleUserIds($serviceFee);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('create-service-fee');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ServiceFee $serviceFee
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, ServiceFee $serviceFee)
    {
        return $user->can('update-service-fee') && $this->getEligibleUserIds($serviceFee);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ServiceFee $serviceFee
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, ServiceFee $serviceFee)
    {
        return $user->can('delete-service-fee') && $this->getEligibleUserIds($serviceFee);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ServiceFee $serviceFee
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, ServiceFee $serviceFee)
    {
        return $user->can('restore-service-fee') && $this->getEligibleUserIds($serviceFee);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\ServiceFee $serviceFee
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, ServiceFee $serviceFee)
    {
        return $user->can('force-delete-service-fee') && $this->getEligibleUserIds($serviceFee);
    }

    private function getEligibleUserIds(ServiceFee $serviceFee): bool
    {
        return in_array($serviceFee->user_id, (new GetParentAndChildByAuthenticated())->handle());
    }
}
