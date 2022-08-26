<?php

namespace App\Models;

use App\Models\Pivot\Renter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Nova\Actions\Actionable;
use Laravel\Nova\Fields\Searchable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Unit extends Model implements HasMedia
{
    use HasFactory, Searchable, Actionable, InteractsWithMedia;

    protected $fillable = [
        'is_active',
        'is_air_conditioning',
        'parking_spot',
        'has_carpet',
        'has_hardwood_flooring',
        'is_ceiling_fan_cooling',
        'has_in_unit_fireplace',
        'has_in_unit_garden',
        'has_in_unit_laundry',
        'has_walkin_closet',
        'are_pets_allowed',
    ];

    /*protected  $casts = [
      'start'=>'datetime',
      'end'=>'datetime'
    ];*/

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'date_available_from',
        'start' => 'date',
        'end' => 'date',
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function renters(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class)
            ->withPivot('status', 'start', 'end')
            ->withTimestamps();
    }

    public function property(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Property::class);
    }

    public function unitType(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(UnitType::class);
    }

    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(130)
            ->height(130);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('units_collection');
    }

    public function furnishingItems()
    {
        return $this->belongsToMany(FurnishingItem::class);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
}
