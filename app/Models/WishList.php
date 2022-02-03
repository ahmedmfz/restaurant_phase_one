<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_product',
        'user_id',
    ];

    public function user(){

        return  $this->hasMany(User::class,'user_id');
    }
}
