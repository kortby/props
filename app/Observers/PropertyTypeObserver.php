<?php

namespace App\Observers;

use App\Models\Property;
use App\Models\PropertyType;

class PropertyTypeObserver
{
    public function creating(PropertyType $propertyType)
    {
        $propertyType->user_id = auth()->id();
    }

    /**
     * Handle the Property "created" event.
     *
     * @param  \App\Models\PropertyType $propertyType
     * @return void
     */
    public function created(PropertyType $propertyType)
    {
        //
    }

    /**
     * Handle the Property "updated" event.
     *
     * @param  \App\Models\PropertyType $propertyType
     * @return void
     */
    public function updated(PropertyType $propertyType)
    {
        //
    }

    /**
     * Handle the Property "deleted" event.
     *
     * @param  \App\Models\PropertyType $propertyType
     * @return void
     */
    public function deleted(PropertyType $propertyType)
    {
        //
    }

    /**
     * Handle the Property "restored" event.
     *
     * @param  \App\Models\PropertyType $propertyType
     * @return void
     */
    public function restored(PropertyType $propertyType)
    {
        //
    }

    /**
     * Handle the Property "force deleted" event.
     *
     * @param  \App\Models\PropertyType $propertyType
     * @return void
     */
    public function forceDeleted(PropertyType $propertyType)
    {
        //
    }
}
