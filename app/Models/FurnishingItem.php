<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FurnishingItem extends Model
{
    use HasFactory;

    public function unitFeatures()
    {
        return $this->belongsToMany(UnitFeature::class, 'unit_furnishing', 'unit_feature_unit_id', 'furnishing_item_id');
    }

    public function furnishingCategory()
    {
        return $this->belongsTo(FurnishingCategory::class, 'furnishing_category_id');
    }
}
