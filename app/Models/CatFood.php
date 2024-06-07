<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CatFood extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'categories_foods_id',
    ];

    public function category()
    {
        return $this->belongsTo(CategoriesFoods::class, 'categories_foods_id');
    }
}
