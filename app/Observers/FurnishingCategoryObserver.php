<?php

namespace App\Observers;

use App\Models\FurnishingCategory;

class FurnishingCategoryObserver
{
    public function creating(FurnishingCategory $furnishingCategory)
    {
        $furnishingCategory->user_id = auth()->id();
    }
    /**
     * Handle the FurnishingCategory "created" event.
     *
     * @param  \App\Models\FurnishingCategory  $furnishingCategory
     * @return void
     */
    public function created(FurnishingCategory $furnishingCategory)
    {

    }

    /**
     * Handle the FurnishingCategory "updated" event.
     *
     * @param  \App\Models\FurnishingCategory  $furnishingCategory
     * @return void
     */
    public function updated(FurnishingCategory $furnishingCategory)
    {
        //
    }

    /**
     * Handle the FurnishingCategory "deleted" event.
     *
     * @param  \App\Models\FurnishingCategory  $furnishingCategory
     * @return void
     */
    public function deleted(FurnishingCategory $furnishingCategory)
    {
        //
    }

    /**
     * Handle the FurnishingCategory "restored" event.
     *
     * @param  \App\Models\FurnishingCategory  $furnishingCategory
     * @return void
     */
    public function restored(FurnishingCategory $furnishingCategory)
    {
        //
    }

    /**
     * Handle the FurnishingCategory "force deleted" event.
     *
     * @param  \App\Models\FurnishingCategory  $furnishingCategory
     * @return void
     */
    public function forceDeleted(FurnishingCategory $furnishingCategory)
    {
        //
    }
}
