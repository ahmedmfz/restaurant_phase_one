<?php

namespace App\Http\Controllers\Resturant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(){
        return view('front_pages.gallery');
    }
}
