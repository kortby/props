<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Nova\Fields\Searchable;

class Unit extends Model
{
    use HasFactory, Searchable;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'date_available_from',
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
