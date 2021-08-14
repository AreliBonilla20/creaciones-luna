<?php

namespace App;
use App\CategoryProduct;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{   
    use Sluggable;

    protected $fillable = [
        'name', 'description', 'price', 'available', 'url_image', 'category_id',
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name',
                'onUpdate' => true
            ]
        ];
    }

    public function category()
    {
        return $this->belongsTo(CategoryProduct::class, 'category_id');
    }

    public function getGetImageAttribute()
    {
        if($this->url_image)
        {
            return url("Storage/$this->url_image");
        }
    }

    public function getGetAvailabilityAttribute()
    {
        if($this->available == 1)
        {
            return 'En existencia';
        }
        else
        {
            return 'Agotado';
        }
    }

   
}
