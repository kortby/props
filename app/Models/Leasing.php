<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leasing extends Model
{
    use HasFactory;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'entered_on',
        'commencement_date',
        'experation_date',
        'termination_period',
        'first_due_date',
        'next_due_date',
        'deposit_date',
    ];

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }

    // public function property()
    // {
    //     return $this->belongsTo(Property::class);
    // }
}
