<?php

namespace App\Policies;

use App\Models\Property;
use App\Models\PropertyType;
use App\Models\User;
use App\Services\GetParentAndChildByAuthenticated;
use Illuminate\Auth\Access\HandlesAuthorization;

class PropertyTypePolicy
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
        return $user->can('view-any-property-type');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PropertyType  $propertyType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, PropertyType $propertyType)
    {
        return $user->can('view-property-type') && $this->getEligibleUserIds($propertyType);;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('create-property-type') ;
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PropertyType  $propertyType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, PropertyType $propertyType)
    {
        return $user->can('update-property-type') && $this->getEligibleUserIds($propertyType);;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PropertyType  $propertyType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, PropertyType $propertyType)
    {
        return $user->can('delete-property-type') && $this->getEligibleUserIds($propertyType);;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PropertyType  $propertyType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, PropertyType $propertyType)
    {
        return $user->can('restore-property-type') && $this->getEligibleUserIds($propertyType);;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PropertyType  $propertyType
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, PropertyType $propertyType)
    {
        return $user->can('force-delete-property-type') && $this->getEligibleUserIds($propertyType);
    }

    private function getEligibleUserIds(PropertyType $propertyType): bool
    {
        return in_array($propertyType->user_id, (new GetParentAndChildByAuthenticated())->handle());
    }
}
