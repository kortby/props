<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Nova\Actions\Actionable;
use Laravel\Nova\Fields\Searchable;

class Unit extends Model
{
    use HasFactory, Searchable, Actionable;

    protected $fillable = [
        'is_active',
    ];

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

    public function unitType()
    {
        return $this->belongsTo(UnitType::class);
    }
}
