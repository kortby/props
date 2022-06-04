<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitUser extends Model
{
    use HasFactory;

    protected $table = 'unit_user';

    protected $append = ['name'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function leasing()
    {
        return $this->hasOne(Leasing::class);
    }

    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

    public function getNameAttribute()
    {
        return $this->user->name . ' signing a lease for the unit number ' . $this->unit->unit_number;
    }
}
