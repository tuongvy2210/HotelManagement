<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'price', 'discount', 'is_shown'];
    
    public function scopeDisplay(Builder $query): void
    {
        $query->where('is_shown', 1);
    }
    
    public function order_details()
    {
        return $this->hasMany(OrderDetail::class);
    }

    protected function discountPrice(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->price * (100 - $this->discount) / 100
        );
    }
}
