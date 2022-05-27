<?php

namespace App\Observers;

use App\Models\Prospect;

class ProspectObserver
{
    /**
     * Handle the Prospect "creating" event.
     *
     * @param  \App\Models\Prospect  $prospect
     * @return void
     */
    public function creating(Prospect $prospect)
    {
        $prospect->user_id = auth()->id();
    }
    /**
     * Handle the Prospect "created" event.
     *
     * @param  \App\Models\Prospect  $prospect
     * @return void
     */
    public function created(Prospect $prospect)
    {
        //
    }

    /**
     * Handle the Prospect "updated" event.
     *
     * @param  \App\Models\Prospect  $prospect
     * @return void
     */
    public function updated(Prospect $prospect)
    {
        //
    }

    /**
     * Handle the Prospect "deleted" event.
     *
     * @param  \App\Models\Prospect  $prospect
     * @return void
     */
    public function deleted(Prospect $prospect)
    {
        //
    }

    /**
     * Handle the Prospect "restored" event.
     *
     * @param  \App\Models\Prospect  $prospect
     * @return void
     */
    public function restored(Prospect $prospect)
    {
        //
    }

    /**
     * Handle the Prospect "force deleted" event.
     *
     * @param  \App\Models\Prospect  $prospect
     * @return void
     */
    public function forceDeleted(Prospect $prospect)
    {
        //
    }
}
