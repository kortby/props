<?php

namespace App\Policies;

use App\Models\Maintenance;
use App\Models\User;
use App\Services\GetParentAndChildByAuthenticated;
use Illuminate\Auth\Access\HandlesAuthorization;

class MaintenancePolicy
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
        return $user->can('view-any-maintenance');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Maintenance  $maintenance
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Maintenance $maintenance)
    {
        return $user->can('view-maintenance')  && $this->getEligibleUserIds($maintenance);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('create-maintenance');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Maintenance  $maintenance
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Maintenance $maintenance)
    {
        return $user->can('update-maintenance')  && $this->getEligibleUserIds($maintenance);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Maintenance  $maintenance
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Maintenance $maintenance)
    {
        return $user->can('delete-maintenance')  && $this->getEligibleUserIds($maintenance);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Maintenance  $maintenance
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Maintenance $maintenance)
    {
        return $user->can('restore-maintenance')  && $this->getEligibleUserIds($maintenance);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Maintenance  $maintenance
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Maintenance $maintenance)
    {
        return $user->can('force-delete-maintenance') && $this->getEligibleUserIds($maintenance);
    }

    private function getEligibleUserIds(Maintenance $maintenance): bool
    {
        return in_array($maintenance->unit->user_id, (new GetParentAndChildByAuthenticated())->handle());
    }
}
