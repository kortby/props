<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    public function properties(): \Illuminate\Database\Eloquent\Relations\HasMany
    {

        return $this->hasMany(Property::class);

    }
}
