<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aksesosris extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'description',
        'price',
        'rating',
    ];

    public function aksesorisCategory()
    {
        return $this->belongsTo(AksesorisCategory::class, 'aksesoris_category_id');
    }
}
