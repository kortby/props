<?php

namespace App\Observers;

use App\Models\Leasing;

class LeasingObserver
{
    public function creating(Leasing $leasing)
    {
        $leasing->user_id = auth()->id();
    }

    /**
     * Handle the Leasing "created" event.
     *
     * @param  \App\Models\Leasing  $leasing
     * @return void
     */
    public function created(Leasing $leasing)
    {
        //
    }

    /**
     * Handle the Leasing "updated" event.
     *
     * @param  \App\Models\Leasing  $leasing
     * @return void
     */
    public function updated(Leasing $leasing)
    {
        //
    }

    /**
     * Handle the Leasing "deleted" event.
     *
     * @param  \App\Models\Leasing  $leasing
     * @return void
     */
    public function deleted(Leasing $leasing)
    {
        //
    }

    /**
     * Handle the Leasing "restored" event.
     *
     * @param  \App\Models\Leasing  $leasing
     * @return void
     */
    public function restored(Leasing $leasing)
    {
        //
    }

    /**
     * Handle the Leasing "force deleted" event.
     *
     * @param  \App\Models\Leasing  $leasing
     * @return void
     */
    public function forceDeleted(Leasing $leasing)
    {
        //
    }
}
