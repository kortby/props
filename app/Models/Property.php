<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Nova\Fields\Searchable;

class Property extends Model
{
    use HasFactory, Searchable;

    public function units()
    {
        return $this->hasMany(Unit::class);
    }
}
