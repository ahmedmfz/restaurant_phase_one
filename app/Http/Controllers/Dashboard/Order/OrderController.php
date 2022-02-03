<?php

namespace App\Http\Controllers\Dashboard\Order;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order_Product;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(){
        return view('front_pages.order.index');
    }

    public function store(Request $request){
        $request->validate([
            'first_name'=>'required|string|max:255',
            'last_name'=>'required|string|max:255',
            
            'total'=>'required|numeric',
            'address_1'=>'required|string|max:255',
            'city'=>'required|string|max:100',
            'country'=>'required|string|max:100',
            'postcode'=>'required|string|max:100',
            'payment_status'=>'required|string|max:10',
            'shipping_status'=>'required|string|max:50',
        ]);

        $data =$request->all();
        $data['user_id'] = Auth::id();
        $data = Order::create($data);

        $cartItems = \Cart::getContent();
        foreach($cartItems as $item){
            Order_Product::create([
                'order_id'=> $data->id,
                'product_id'=>$item->id,
                'quantity' =>$item->quantity,
            ]);
        }
        \Cart::clear();
        return redirect('/');
    }
}
