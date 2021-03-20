<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SneakerImage extends Model
{
    use HasFactory;
    public function sneakers(){
        return $this->belongsTo(Sneaker::class,'sneaker_id');
    }
}
