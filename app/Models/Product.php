<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'qty',
        'description',
        'menu_id',
        'active',
    ];

    public function category(){
        return $this->belongsTo(Menu::class,'menu_id','id');
    }

    public function images(){
        return  $this->belongsTo(Product_attachment::class);
    }
}
