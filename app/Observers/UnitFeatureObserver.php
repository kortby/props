<?php

namespace App\Observers;

use App\Models\UnitFeature;

class UnitFeatureObserver
{
    /**
     * Handle the UnitFeature "created" event.
     *
     * @param  \App\Models\UnitFeature  $unitFeature
     * @return void
     */
    public function created(UnitFeature $unitFeature)
    {
        // $unitFeature->user_id = auth()->id();
    }

    /**
     * Handle the UnitFeature "updated" event.
     *
     * @param  \App\Models\UnitFeature  $unitFeature
     * @return void
     */
    public function updated(UnitFeature $unitFeature)
    {
        //
    }

    /**
     * Handle the UnitFeature "deleted" event.
     *
     * @param  \App\Models\UnitFeature  $unitFeature
     * @return void
     */
    public function deleted(UnitFeature $unitFeature)
    {
        //
    }

    /**
     * Handle the UnitFeature "restored" event.
     *
     * @param  \App\Models\UnitFeature  $unitFeature
     * @return void
     */
    public function restored(UnitFeature $unitFeature)
    {
        //
    }

    /**
     * Handle the UnitFeature "force deleted" event.
     *
     * @param  \App\Models\UnitFeature  $unitFeature
     * @return void
     */
    public function forceDeleted(UnitFeature $unitFeature)
    {
        //
    }
}
