<?php

namespace App\Observers;

use App\Models\Property;

class PropertyObserver
{
    public function creating(Property $property)
    {
        $property->user_id = auth()->id();
    }

    /**
     * Handle the Property "created" event.
     *
     * @param  \App\Models\Property  $property
     * @return void
     */
    public function created(Property $property)
    {
        //
    }

    /**
     * Handle the Property "updated" event.
     *
     * @param  \App\Models\Property  $property
     * @return void
     */
    public function updated(Property $property)
    {
        //
    }

    /**
     * Handle the Property "deleted" event.
     *
     * @param  \App\Models\Property  $property
     * @return void
     */
    public function deleted(Property $property)
    {
        //
    }

    /**
     * Handle the Property "restored" event.
     *
     * @param  \App\Models\Property  $property
     * @return void
     */
    public function restored(Property $property)
    {
        //
    }

    /**
     * Handle the Property "force deleted" event.
     *
     * @param  \App\Models\Property  $property
     * @return void
     */
    public function forceDeleted(Property $property)
    {
        //
    }
}
