<?php

namespace App\Observers;

use App\Models\User;
use Spatie\Permission\Models\Role;

class UserObserver
{
    /**
     * Handle the User "created" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function creating(User $user)
    {

        if(auth()->user()->hasRole('company-owner') || auth()->user()->hasRole('property-manager') || auth()->user()->hasRole('property-agent') ) {

            $user->parent_id = auth()->id();

        }

    }

    public function created(User $user)
    {
        $user->assignRole(request()->roles);
    }

    /**
     * Handle the User "updated" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function updated(User $user)
    {

       // $user->syncRoles(request()->roles);
    }

    public function retrieved(User $user)
    {
        /*if(request()->roles && request()->method() === 'PUT'){

            $user->syncRoles(request()->roles);

        }*/

    }



    /**
     * Handle the User "deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function deleted(User $user)
    {
        //
    }

    /**
     * Handle the User "restored" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function restored(User $user)
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public function forceDeleted(User $user)
    {
        //
    }
}
