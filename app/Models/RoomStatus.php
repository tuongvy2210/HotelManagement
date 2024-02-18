<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomStatus extends Model
{
    use HasFactory;

    protected $table = 'room_statuses';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'color', 'is_shown'];

    public $timestamps = false;

    public function scopeDisplay(Builder $query): void
    {
        $query->where('is_shown', 1);
    }
    
    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
