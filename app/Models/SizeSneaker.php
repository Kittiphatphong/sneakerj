<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SizeSneaker extends Model
{
    use HasFactory;

    public function snearkers(){
        return $this->belongsTo(Sneaker::class,'sneaker_id');
    }
    public function sizes(){
        return $this->belongsTo(Size::class,'size_id');
}
}
