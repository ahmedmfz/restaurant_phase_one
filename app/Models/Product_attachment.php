<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_attachment extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'product_id',
    ];

    public function product(){
         return $this->belongsTo(Prduct::class,'product_id');
    }
}
