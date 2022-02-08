<?php

namespace App\Http\Controllers\Resturant;

use App\Models\Chef;
use App\Models\Menu;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\WishList;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
  
    public function index()
    {
        $cart_id = $this->keys_id_cart();
        $chefs = Chef::where('id' ,'<','4')->get(); 
        $categories = Menu::all(); 
        return view('front_pages.index', compact(['categories','chefs','cart_id']));
    }

    public function keys_id_cart()
    {
        $cartItems = \Cart::getContent();
        foreach($cartItems as $key => $cart){
             $cart_id[] =  $key ;
        }
        return !empty($cart_id) ? $cart_id : [];
    }
    

}
