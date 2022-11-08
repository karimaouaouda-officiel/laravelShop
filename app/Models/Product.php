<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    public function shop(){
        return $this->belongsTo(Shop::class);
    }


    public function rates(){
        return $this->hasMany(Rate::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }
}
