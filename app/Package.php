<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{   
    protected $table = 'packages';

    protected $fillable = [
        'name', 'description', 'conditions', 'price', 'amount_people', 'url_image1', 'url_image2', 'url_image3', 'url_video1', 'url_video2',  'section_id',
    ];

    public function section()
    {
        return $this->belongsTo(SectionPackage::class, 'section_id');
    }

    public function items()
    {
        return $this->hasMany(ItemPackage::class);
    }

    public function getGetImage1Attribute()
    {
        if($this->url_image1)
        {
            return url("Storage/$this->url_image1");
        }
    }

    public function getGetImage2Attribute()
    {
        if($this->url_image2)
        {
            return url("Storage/$this->url_image2");
        }
    }

    public function getGetImage3Attribute()
    {
        if($this->url_image3)
        {
            return url("Storage/$this->url_image3");
        }
    }

    public function getGetVideo1Attribute()
    {
        if($this->url_video1)
        {
            return url("Storage/$this->url_video1");
        }
    }

    public function getGetVideo2Attribute()
    {
        if($this->url_video2)
        {
            return url("Storage/$this->url_video2");
        }
    }

}
