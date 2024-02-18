<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;

    protected $table = 'order_details';
    protected $primaryKey = 'id';
    protected $fillable = ['order_id', 'service_id', 'price', 'discount', 'quantity'];
    
    public $timestamps = false;

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    protected function discountPrice(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->price * (100 - $this->discount) / 100
        );
    }

    protected function total(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->discountPrice * $this->quantity
        );
    }
}
