<?php

namespace App\Http\Controllers\Resturant;

use App\Models\Menu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuController extends Controller
{
    public function index(){
        
        $categories = Menu::get(); 
        return view('front_pages.menu', compact('categories' ));

    }

    public function show($id){
        return view('front_pages.product.show');
    }
      
    
}
