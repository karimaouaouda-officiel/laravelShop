<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'statut',
        'product_id'
    ];

    public function getWaitTimeAttribute(){
        return $this->order_date;
    }



    public function order(){
        return $this->belongsTo(OrderSource::class);
    }
}
