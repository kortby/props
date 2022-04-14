<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    //Casts of the model dates
    protected $casts = [
        'date_available_from' => 'date'
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
}
