<?php

namespace App\Policies;

use App\Models\Company;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CompanyPolicy
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
         return $user->can('view-any-company');
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Company  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, Company $model)
    {
        if(auth()->user()->hasAnyRole(config('roles-permissions'))) {

            return $user->can('view-company');

        }

        return $user->can('view-company') && $model->user_id === auth()->user()->id;
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function create(User $user)
    {
        return $user->can('create-company') && auth()->user()->hasAnyRole(['property-manager' , 'property-agent' ]);
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Company  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function update(User $user, Company $model)
    {
        if(auth()->user()->hasAnyRole(config('roles-permissions'))) {

            return $user->can('update-company');

        }

        return $user->can('update-company') && $model->user_id === auth()->user()->id;
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Company  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function delete(User $user, Company $model)
    {
        if(auth()->user()->hasAnyRole(config('roles-permissions'))) {

            return $user->can('delete-company') ;

        }

        return $user->can('delete-company') && $model->user_id === auth()->user()->id;
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Company  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function restore(User $user, Company $model)
    {
        if(auth()->user()->hasAnyRole(config('roles-permissions'))) {

            return $user->can('restore-company') ;

        }

        return $user->can('restore-company') && $model->user_id === auth()->user()->id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\Company  $model
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function forceDelete(User $user, Company $model)
    {
        if(auth()->user()->hasAnyRole(config('roles-permissions'))) {

            return $user->can('force-delete-company') ;

        }

        return $user->can('force-delete-company') && $model->user_id === auth()->user()->id;
    }
}
