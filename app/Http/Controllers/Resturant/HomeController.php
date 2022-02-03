<?php

namespace App\Http\Controllers\Resturant;

use App\Models\Chef;
use App\Models\Menu;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function index(){
        $chefs = Chef::where('id' ,'<','4')->get(); 
        $categories = Menu::all(); 
        return view('front_pages.index', compact(['categories','chefs']));

    }
}
