<?php

namespace App\Http\Controllers\Dashboard\Cart;

use Darryldecode\Cart\Cart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    
    public function cartList()
    {
        $cartItems = \Cart::getContent();
        return view('front_pages.cart.index', compact('cartItems'));
    }

    public function addToCart(Request $request)
    {
        \Cart::add([
            'id' => $request->id,
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'attributes' => array(
                'image' => $request->image,
            )
        ]);
        return response(['data'=> \Cart::getTotalQuantity() , 'cart_status'=>$this->check_in_cart($request->id)]);
    }

    public function updateCart(Request $request)
    {
        \Cart::update(
            $request->id,
            [
                'quantity' => [
                    'relative' => false,
                    'value' => $request->quantity
                ],
            ]
        );

        return response(['data'=> \Cart::getTotalQuantity() ,'qty' => $request->quantity]);
    }

    public function removeCart(Request $request)
    {
        \Cart::remove($request->id);
        return response(['data'=> \Cart::getTotalQuantity()]);
    }

    public function clearAllCart()
    {
        \Cart::clear();
        return response(['data'=> \Cart::getTotalQuantity()]);
    }

    public function check_in_cart($id)
    {

        $cartItems = \Cart::getContent();
        foreach($cartItems as $key => $cart){
            $result[] = $key;
        }
        if(in_array($id , $result)){
            return true;
        }
        return false;
    }

}
