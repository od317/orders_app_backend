<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'store_id',
        'stock',
        'price',
        'description'
    ];
    
    public function store(){
        return $this->belongsTo(Store::class);
    }

    public function cart(){
        return $this->hasMany(Cart::class);
    }

    public function wishList(){
        return $this->hasMany(WishList::class);
    }
    
}
