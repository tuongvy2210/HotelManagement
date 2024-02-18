<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    use HasFactory;

    protected $table = 'room_types';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'price', 'discount', 'image_url', 'description', 'number_of_bed', 'number_of_bathroom', 'utilities', 'is_shown'];
    
    public function scopeDisplay(Builder $query): void
    {
        $query->where('is_shown', 1);
    }
    
    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    protected function discountPrice(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->price * (100 - $this->discount) / 100
        );
    }

    protected function images(): Attribute
    {
        return Attribute::make(
            get: fn () => json_decode($this->image_url, true)
        );
    }
}
