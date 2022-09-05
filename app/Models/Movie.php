<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $guarded = [];
    use HasFactory;

    public function gerRouteKeyName()
    {
        return 'url';
    }

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }
}
