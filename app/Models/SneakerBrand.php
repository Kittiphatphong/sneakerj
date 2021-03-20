<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SneakerBrand extends Model
{
    use HasFactory;

    public function sizes(){
    return $this->hasOne(Size::class,'brand_id');
}
public function sneakers(){
        return $this->hasMany(Sneaker::class,'brand_id');
}

}
