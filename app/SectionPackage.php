<?php

namespace App;

use App\Package;
use Illuminate\Database\Eloquent\Model;

class SectionPackage extends Model
{
    protected $fillable = [
        'name', 'description',
    ];

    public function packages()
    {    
        return $this->hasMany(Package::class, 'section_id');
    }
}
