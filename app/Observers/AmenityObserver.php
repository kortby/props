<?php

namespace App\Observers;

use App\Models\Amenity;

class AmenityObserver
{

    public function creating(Amenity $amenity)
    {
        $amenity->user_id = auth()->id();
    }

    /**
     * Handle the Unit "created" event.
     *
     * @param  \App\Models\Amenity $amenity
     * @return void
     */
    public function created(Amenity $amenity)
    {
        //
    }

    /**
     * Handle the Unit "updated" event.
     *
     * @param  \App\Models\Amenity $amenity
     * @return void
     */
    public function updated(Amenity $amenity)
    {
        //
    }

    /**
     * Handle the Unit "deleted" event.
     *
     * @param  \App\Models\Amenity $amenity
     * @return void
     */
    public function deleted(Amenity $amenity)
    {
        //
    }

    /**
     * Handle the Unit "restored" event.
     *
     * @param  \App\Models\Amenity $amenity
     * @return void
     */
    public function restored(Amenity $amenity)
    {
        //
    }

    /**
     * Handle the Unit "force deleted" event.
     *
     * @param  \App\Models\Amenity $amenity
     * @return void
     */
    public function forceDeleted(Amenity $amenity)
    {
        //
    }
}
