<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceFee extends Model
{
    use HasFactory;

    protected $withCount = ['leasings'];

    public function leasings()
    {
        return $this->belongsToMany(Leasing::class);
    }
}
