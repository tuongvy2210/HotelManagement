<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'bookings';
    protected $primaryKey = 'id';
    protected $fillable = ['customer_id', 'room_type_id', 'booking_at', 'checkin_at', 'number_of_adults', 'number_of_children', 'fullname', 'phone', 'email', 'note', 'is_cancelled'];

    protected $casts = [
        'booking_at' => 'datetime',
        'checkin_at' => 'datetime',
    ];

    public function roomType()
    {
        return $this->belongsTo(RoomType::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function order()
    {
        return $this->hasOne(Order::class);
    }
}
