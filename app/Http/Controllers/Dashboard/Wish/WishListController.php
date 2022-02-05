<?php

namespace App\Http\Controllers\Dashboard\Wish;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WishListController extends Controller
{

    public function index(){
        return view('front_pages.wishlist.index');
    }

    public function store(Request $request){

        if(! Auth::user()->wishListHas($request->id)){
            Auth::user()->wishlists()->attach($request->id);
            return response()->json(['data'=> count(auth()->user()->wishlists)]);
        }
     
       return response()->json('[error => error]');
    }

    public function destroy(Request $request){

        Auth::user()->wishlists()->detach($request->id);
        return response()->json(['data'=> count(auth()->user()->wishlists)]);
        
    }
   
}
