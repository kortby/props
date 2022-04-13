<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function type()
    {
        return $this->hasOne(Type::class);
    }
}
