<?php

namespace App\Models;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function getRouteKeyName()
    {
        return 'url';
    }

    public function Movie()
    {
        return $this->hasMany(Movie::class);
    }
}
