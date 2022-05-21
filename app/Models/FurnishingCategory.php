<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FurnishingCategory extends Model
{
    use HasFactory;


    public function furnishingItems()
    {
        return $this->hasMany(FurnishingItem::class);
    }
}
