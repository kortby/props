<?php

namespace App\Observers;

use App\Models\Category;

class CategoryObserver
{

    public function creating(Category $category)
    {
        $category->user_id = auth()->id();
    }

    /**
     * Handle the Unit "created" event.
     *
     * @param  \App\Models\Category $category
     * @return void
     */
    public function created(Category $category)
    {
        //
    }

    /**
     * Handle the Unit "updated" event.
     *
     * @param  \App\Models\Category $category
     * @return void
     */
    public function updated(Category $category)
    {
        //
    }

    /**
     * Handle the Unit "deleted" event.
     *
     * @param  \App\Models\Category $category
     * @return void
     */
    public function deleted(Category $category)
    {
        //
    }

    /**
     * Handle the Unit "restored" event.
     *
     * @param  \App\Models\Category $category
     * @return void
     */
    public function restored(Category $category)
    {
        //
    }

    /**
     * Handle the Unit "force deleted" event.
     *
     * @param  \App\Models\Category $category
     * @return void
     */
    public function forceDeleted(Category $category)
    {
        //
    }
}
