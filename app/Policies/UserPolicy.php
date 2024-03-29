<?php

namespace App\Policies;

use App\Models\User;
use App\Services\GetParentAndChildByAuthenticated;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
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
         return $user->can('view-any-user');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, User $model)
    {
        if(auth()->user()->hasAnyRole(config('roles-permissions'))) {

            return $user->can('view-user');

        }

        return $user->can('view-user') && $this->getEligibleUserIds($model);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('create-user');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, User $model)
    {
        if(auth()->user()->hasAnyRole(config('roles-permissions'))) {

            return $user->can('update-user');

        }

        return $user->can('update-user') && $this->getEligibleUserIds($model);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, User $model)
    {
        if(auth()->user()->hasAnyRole(config('roles-permissions'))) {

            return $user->can('delete-user') ;

        }

        return $user->can('delete-user') && $this->getEligibleUserIds($model);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, User $model)
    {
        if(auth()->user()->hasAnyRole(config('roles-permissions'))) {

            return $user->can('restore-user') ;

        }

        return $user->can('restore-user') &&  $this->getEligibleUserIds($model);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\User  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, User $model)
    {
        if(auth()->user()->hasAnyRole(config('roles-permissions'))) {

            return $user->can('force-delete-user') ;

        }

        return $user->can('force-delete-user') && $this->getEligibleUserIds($model);
    }

    /**
     * @param User $model
     * @return bool
     */
    private function getEligibleUserIds(User $model): bool
    {
        return in_array($model->parent_id, (new GetParentAndChildByAuthenticated())->handle());
    }
}
