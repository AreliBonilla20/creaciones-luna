<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name', 'description', 'price', 'available', 'url_image'
    ];

    public function getGetImageAttribute()
    {
        if($this->url_image)
        {
            return url("Storage/$this->url_image");
        }
    }
}
