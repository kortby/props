<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitFeature extends Model
{
    use HasFactory;

    protected $fillable = [
        'is_air_conditioning',
        'num_of_assigned_car_parking',
        'has_carpet',
        'has_hardwood_flooring',
        'is_ceiling_fan_cooling',
        'has_in_unit_fireplace',
        'has_in_unit_garden',
        'has_in_unit_laundry',
        'has_walkin_closet',
        'are_pets_allowed',
    ];

    public function units()
    {
        return $this->hasMany(Unit::class);
    }

    public function furnishingItems()
    {
        return $this->belongsToMany(FurnishingItem::class, 'unit_furnishing',  'furnishing_item_id', 'unit_feature_unit_id');
    }
}
