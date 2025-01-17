<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Movie extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'description',
        'year',
        'director',
        'image',
        'image_background',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
     
}
