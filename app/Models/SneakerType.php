<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SneakerType extends Model
{
    use HasFactory;

    public function sneakers(){
        return $this->hasMany(Sneaker::class,'type_id');
    }
}
