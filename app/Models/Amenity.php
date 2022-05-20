<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amenity extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'updated_at', 'deleted_at'];

    public function amenitySchedules()
    {
        return $this->hasMany(AmenitySchedule::class);
    }
}
