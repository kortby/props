<?php

namespace App\Policies;

use App\Models\FurnishingCategory;
use App\Models\User;
use App\Services\GetParentAndChildByAuthenticated;
use Illuminate\Auth\Access\HandlesAuthorization;

class FurnishingCategoryPolicy
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
        return $user->can('view-any-furnishing-category');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\FurnishingCategory  $furnishingCategory
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, FurnishingCategory $furnishingCategory)
    {
        return $user->can('view-furnishing-category') && $this->getEligibleUserIds($furnishingCategory);
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('create-furnishing-category');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\FurnishingCategory  $furnishingCategory
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, FurnishingCategory $furnishingCategory)
    {
        return $user->can('update-furnishing-category') && $this->getEligibleUserIds($furnishingCategory);
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\FurnishingCategory  $furnishingCategory
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, FurnishingCategory $furnishingCategory)
    {
        return $user->can('delete-furnishing-category') && $this->getEligibleUserIds($furnishingCategory);
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\FurnishingCategory  $furnishingCategory
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, FurnishingCategory $furnishingCategory)
    {
        return $user->can('restore-furnishing-category') && $this->getEligibleUserIds($furnishingCategory);
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\FurnishingCategory  $furnishingCategory
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, FurnishingCategory $furnishingCategory)
    {
        return $user->can('force-delete-furnishing-category') && $this->getEligibleUserIds($furnishingCategory);
    }

    private function getEligibleUserIds(FurnishingCategory $furnishingCategory): bool
    {
        return in_array($furnishingCategory->user_id, (new GetParentAndChildByAuthenticated())->handle());
    }
}
