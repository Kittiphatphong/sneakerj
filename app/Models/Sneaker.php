<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sneaker extends Model
{
    use HasFactory;

    public function brands(){
        return $this->belongsTo(SneakerBrand::class,'brand_id');
    }
    public function types(){
        return $this->belongsTo(SneakerType::class,'type_id');
    }
    public function sneakerSizes(){
         return $this->hasMany(SizeSneaker::class,'sneaker_id');
    }
    public function sneakerColors(){
        return $this->hasMany(ColorSneaker::class,'sneaker_id');
    }
    public function sneakerImages(){
        return $this->hasMany(SneakerImage::class,'sneaker_id');
    }
}
