<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    use HasFactory;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'preferred_maintenece_time',
        'due_date',
        'finished',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
