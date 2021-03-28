<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    public function sneakers(){
        return $this->hasMany(Sneaker::class,'status_id');
    }
}
