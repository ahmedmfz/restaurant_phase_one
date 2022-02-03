<?php

namespace App\Http\Controllers\Resturant;

use App\Http\Controllers\Controller;
use App\Models\Chef;
use Illuminate\Http\Request;

class ChefController extends Controller
{
    public function index(){
        $chefs = Chef::get(); 
        return view('front_pages.chefs',compact('chefs'));
    }
}
