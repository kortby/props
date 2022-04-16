<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Nova\Fields\Searchable;

class Category extends Model
{
    use HasFactory;
    use Searchable;

    public function maintenance()
    {
        return $this->hasMany(Maintenance::class);
    }
}
