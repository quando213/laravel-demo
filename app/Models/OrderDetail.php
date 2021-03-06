<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'option_id',
        'product_id',
        'unit_price',
        'quantity',
        'status'
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function option() {
        return $this->belongsTo(Option::class);
    }

    public function product() {
        return $this->belongsTo(Product::class);
    }
}
