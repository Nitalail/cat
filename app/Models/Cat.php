<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'price',
        'rating',
        'image',
        'category_id' // Make sure to include the foreign key in the fillable array
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // public function aksesoriscategory()
    // {
    //     return $this->belongsTo(aksesoriscategory::class, 'aksesoris_category_id');
    // }

}
