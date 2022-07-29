<?php

namespace App\Observers;

use App\Models\Leasing;
use App\Models\ServiceFee;

class ServiceFeeObserver
{
    public function creating(ServiceFee $serviceFee)
    {
        $serviceFee->user_id = auth()->id();
    }

    /**
     * Handle the Leasing "created" event.
     *
     * @param  \App\Models\ServiceFee  $serviceFee
     * @return void
     */
    public function created(ServiceFee $serviceFee)
    {
        //
    }

    /**
     * Handle the Leasing "updated" event.
     *
     * @param  \App\Models\ServiceFee  $serviceFee
     * @return void
     */
    public function updated(ServiceFee $serviceFee)
    {
        //
    }

    /**
     * Handle the Leasing "deleted" event.
     *
     * @param  \App\Models\ServiceFee  $serviceFee
     * @return void
     */
    public function deleted(ServiceFee $serviceFee)
    {
        //
    }

    /**
     * Handle the Leasing "restored" event.
     *
     * @param  \App\Models\ServiceFee  $serviceFee
     * @return void
     */
    public function restored(ServiceFee $serviceFee)
    {
        //
    }

    /**
     * Handle the Leasing "force deleted" event.
     *
     * @param  \App\Models\ServiceFee  $serviceFee
     * @return void
     */
    public function forceDeleted(ServiceFee $serviceFee)
    {
        //
    }
}
