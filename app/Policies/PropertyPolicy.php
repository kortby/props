<?php

namespace App\Policies;

use App\Models\Property;
use App\Models\User;
use App\Services\GetParentAndChildByAuthenticated;
use Illuminate\Auth\Access\HandlesAuthorization;

class PropertyPolicy
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
        return $user->can('view-any-property');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Property $property)
    {
        if(auth()->user()->hasAnyRole(config('roles-permissions'))) {

            return $user->can('view-property');

        }

        return $user->can('view-property') && $this->getEligibleUserIds($property);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {

        return $user->can('create-property') && auth()->user()->hasAnyRole(['property-manager' , 'company-owner' , 'property-agent' ]);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Property $property)
    {
        return $user->can('update-property') && $this->getEligibleUserIds($property);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Property $property)
    {
        return $user->can('delete-property')&& $this->getEligibleUserIds($property);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Property $property)
    {
        return $user->can('restore-property') && $this->getEligibleUserIds($property);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Property $property)
    {
        return $user->can('force-delete-property') && $this->getEligibleUserIds($property);
    }

    private function getEligibleUserIds(Property $property): bool
    {
        return in_array($property->user_id, (new GetParentAndChildByAuthenticated())->handle());
    }
}
