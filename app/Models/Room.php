<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $table = 'rooms';
    protected $primaryKey = 'id';
    protected $fillable = ['room_type_id', 'room_status_id', 'order_id', 'name', 'is_shown'];

    public function scopeDisplay(Builder $query): void
    {
        $query->where('is_shown', 1);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function roomType()
    {
        return $this->belongsTo(RoomType::class);
    }

    public function roomStatus()
    {
        return $this->belongsTo(RoomStatus::class);
    }

    public function bookings()
    {
        return $this->hasManyThrough(Booking::class, Order::class);
    }

    public function order()
    {
        return $this->hasOne(Order::class);
    }
}
