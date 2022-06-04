<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Leasing extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'entered_on',
        'commencement_date',
        'experation_date',
        'termination_period',
        'first_due_date',
        'next_due_date',
        'deposit_date',
    ];

    public function leasing()
    {
        return $this->hasMany(Leasing::class);
    }

    public function unitUser()
    {
        return $this->belongsTo(UnitUser::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('leasing_collection');
    }
}
