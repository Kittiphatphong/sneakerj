<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ColorSneaker extends Model
{
    use HasFactory;
    public function sneakers(){
        return $this->belongsTo(Sneaker::class,'sneaker_id');
    }
    public function colors(){
        return $this->belongsTo(Color::class,'color_id');
    }
}
