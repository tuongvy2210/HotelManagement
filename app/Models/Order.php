<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $primaryKey = 'id';
    protected $fillable = ['booking_id', 'room_id', 'customer_id', 'fullname', 'phone', 'email', 'checkin_at', 'checkout_at', 'price', 'discount'];

    protected $casts = [
        'checkin_at' => 'datetime',
        'checkout_at' => 'datetime',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function order_details()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    protected function rentHours(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->checkout_at?->diffInHours($this->checkin_at) + 1
        );
    }

    protected function totalPrice(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->price * (100 - $this->discount) / 100 * $this->rent_hours
        );
    }
    
    protected function servicePrice(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->orderDetails->sum('total')
        );
    }

    protected function mustPayPrice(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->totalPrice + $this->servicePrice
        );
    }

    protected function checkoutRentHours(): Attribute
    {
        return Attribute::make(
            get: fn () => now()->diffInHours($this->checkin_at) + 1
        );
    }

    protected function checkoutTotalPrice(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->price * (100 - $this->discount) / 100 * $this->checkoutRentHours
        );
    }

    protected function checkoutMustPayPrice(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->checkoutTotalPrice + $this->servicePrice
        );
    }
}
