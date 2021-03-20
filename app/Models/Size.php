<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    use HasFactory;

    public function brands(){
        return $this->belongsTo(SneakerBrand::class,'brand_id');
    }
    public function sizeSnearkers(){
        return $this->hasMany(SizeSneaker::class,'size_id');
    }
}
