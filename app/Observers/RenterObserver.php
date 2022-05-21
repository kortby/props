<?php

namespace App\Observers;

use App\Models\Renter;

class RenterObserver
{
    /**
     * Handle the User "created" event.
     *
     * @param  \App\Models\Renter $renter
     * @return void
     */
    public function creating(Renter $renter)
    {
        if(auth()->user()->hasRole('property-manager') || auth()->user()->hasRole('property-agent') ) {

            $renter->parent_id = auth()->id();

        }

    }

    public function created(Renter $renter)
    {
        if(auth()->user()->hasRole('property-manager') || auth()->user()->hasRole('property-agent') ) {

            $renter->assignRole(6);

        }

    }

    /**
     * Handle the User "updated" event.
     *
     * @param  \App\Models\Renter $renter
     * @return void
     */
    public function updated(Renter $renter)
    {
        //
    }

    /**
     * Handle the User "deleted" event.
     *
     * @param  \App\Models\Renter $renter
     * @return void
     */
    public function deleted(Renter $renter)
    {
        //
    }

    /**
     * Handle the User "restored" event.
     *
     * @param  \App\Models\Renter $renter
     * @return void
     */
    public function restored(Renter $renter)
    {
        //
    }

    /**
     * Handle the User "force deleted" event.
     *
     * @param  \App\Models\Renter $renter
     * @return void
     */
    public function forceDeleted(Renter $renter)
    {
        //
    }
}
