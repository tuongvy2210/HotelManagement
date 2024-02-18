<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Utility extends Model
{
    use HasFactory;

    protected $table = 'utilities';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'icon', 'is_shown'];
    
    public function scopeDisplay(Builder $query): void
    {
        $query->where('is_shown', 1);
    }
    
    public $timestamps = false;
}
