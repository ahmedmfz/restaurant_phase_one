<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'first_name',
        'last_name',
        'total',
        'user_id',
        'address_1',
        'address_2',
        'city',
        'country',
        'postcode',
        'note',
        'payment_status',
        'shipping_status',
        'status',
        'value_status',
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function products(){
        return $this->belongsToMany(Product::class)->withPivot('quantity');
    }
}
