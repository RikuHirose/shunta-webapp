<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RestaurantImage extends Model
{

    protected $table = 'restaurant_images';

    protected $fillable = [
        'restaurant_id',
        'image_id'
    ];


    // Relations
    public function restarurant()
    {
        return $this->belongsTo(\App\Models\Restaurant::class, 'restaurant_id', 'id');
    }

    public function image()
    {
        return $this->belongsTo(\App\Models\Image::class, 'image_id', 'id');
    }

}
