<?php

namespace App\Http\Controllers\Dashboard\Wish;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\WishList;
use Illuminate\Support\Facades\Auth;

class WishListController extends Controller
{
    public function store(Request $request){
        $product = Product::where('id',  $request->id)->first();
        $user = Auth::id();
        $check =  WishList::where('name_product',$product->name)->first();
        if($check){
            return response(['data-error'=>'name already added in wish list']);
        }else{

            WishList::create([
                'name_product'=>  $product->name,
                'user_id' => $user,
            ]);
            return response(['data'=>'success']);
        }
       
    }

    public function check_name(Request $request){
        $product = Product::where('id',  $request->id)->first();
        $check =  WishList::where('name_product',$product->name)->first();

        if($check){
            return response(['data'=>'name already added in wish list']);
        }else{
            return response(['error'=>'name not added in wish list']);
        }
    }
}
