<?php

namespace App\Observers;

use App\Models\UnitType;

class UnitTypeObserver
{

    public function creating(UnitType $unitType)
    {
        $unitType->user_id = auth()->id();
    }

    /**
     * Handle the Unit "created" event.
     *
     * @param  \App\Models\UnitType $unitType
     * @return void
     */
    public function created(UnitType $unitType)
    {
        //
    }

    /**
     * Handle the Unit "updated" event.
     *
     * @param  \App\Models\UnitType $unitType
     * @return void
     */
    public function updated(UnitType $unitType)
    {
        //
    }

    /**
     * Handle the Unit "deleted" event.
     *
     * @param  \App\Models\UnitType $unitType
     * @return void
     */
    public function deleted(UnitType $unitType)
    {
        //
    }

    /**
     * Handle the Unit "restored" event.
     *
     * @param  \App\Models\UnitType $unitType
     * @return void
     */
    public function restored(UnitType $unitType)
    {
        //
    }

    /**
     * Handle the Unit "force deleted" event.
     *
     * @param  \App\Models\UnitType $unitType
     * @return void
     */
    public function forceDeleted(UnitType $unitType)
    {
        //
    }
}
