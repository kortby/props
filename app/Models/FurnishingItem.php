<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FurnishingItem extends Model
{
    use HasFactory;

    public function units()
    {
        return $this->belongsToMany(Unit::class);
    }
}
