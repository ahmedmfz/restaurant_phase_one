
@extends('layouts.master')

@section('css')

<!-- noty -->
<link rel="stylesheet" href="{{asset('dashboard/assets/noty/noty.css')}}">
<!-- noty js  -->
<script src="{{asset('dashboard/assets/noty/noty.min.js')}}"></script>
 
@endsection

@section('content')

<!-- Header -->
<header id="header">
    <div class="intro">
        <div class="overlay">
            <div class="container">
                <div class="row">
                    <div class="intro-text">
                        <h1>Touché</h1>
                        <p>Restaurant / Coffee / Pub</p>
                        <a href="#about" class="btn btn-custom btn-lg page-scroll">Discover Story</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!--../ Header -->

<!-- Restaurant About Section -->
<div id="about">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-md-6 ">
                <div class="about-img"><img src="{{ asset('assets/img/about.jpg')}}" class="img-responsive" alt=""></div>
            </div>
            <div class="col-xs-12 col-md-6">
                <div class="about-text">
                    <h2>Our Restaurant</h2>
                    <hr>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare diam. Sed commodo nibh ante facilisis bibendum dolor feugiat at. Duis sed dapibus leo nec ornare diam commodo nibh.</p>
                    <h3>Awarded Chefs</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sed dapibus leo nec ornare diam. Sed commodo nibh ante facilisis bibendum dolor feugiat at. Duis sed dapibus leo nec ornare.</p>
                </div>
            </div>
        </div>
    </div>
</div> <!-- ../ Restaurant About Section -->

<!-- Restaurant Menu Section -->
<div id="restaurant-menu">
    <div class="section-title text-center center">
        <div class="overlay">
            <h2>Menu</h2>
            <hr>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit duis sed.</p>
        </div>
    </div>
    <div class="container">
        <div class="row">

            @foreach($categories as $category)
            @if($category->active == 1)
            <div class="col-xs-12 col-sm-6">
                <div class="menu-section">
                    <h2 class="menu-section-title">{{ $category->name }}</h2>
                    <hr>
                    @foreach($category->products as $product)
                    @if($product->active == 1)
                    
                    <div class="menu-item">
                        <div class="menu-item-img"> <a href=""><img src="{{asset('assets/img/menu-bg.jpg')}}"></div>
                        <div class="menu-item-name">
                            <a href="{{ route('product_one_show', $product->id )}}"> {{$product->name}} </a>

                            <a href="javascript:void(0);" class="wishlist_btn"  onclick="add_wish('{{$product->id}}')">
                                <i class="far fa-heart" id="input-wish-{{$product->id}}" att="0"></i>
                            </a>
                        </div>
                        <div class="menu-item-price">
                            <form action="{{ route('cart.store')}}" method="POST" class="cart-form" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" value="{{ $product->id }}" name="id">
                                <input type="hidden" value="{{ $product->name }}" name="name">
                                <input type="hidden" value="{{ $product->price }}" name="price">
                                <input type="hidden" value="2" name="image">
                                <input type="hidden" value="1" name="quantity">
                                <button class="cart"><i class="fas fa-shopping-cart"></i></button>
                            </form>
                            
                            <p>{{$product->price}}</p> 

                        </div>
                        <div class="menu-item-description"> {{$product->description}} </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
            @endif
            @endforeach

        </div>
    </div>
</div> <!-- ../Restaurant Menu Section -->

<!-- Restaurant gallery Section -->
@include('front_pages.components.gallery')
<!-- ../ Restaurant gallery Section -->

<!-- Restaurant chefs Section -->
@include('front_pages.components.chefs')
<!-- ../ Restaurant chefs Section -->

<!-- Call Reservation Section -->
<div id="call-reservation" class="text-center">
    <div class="container">
        <h2>Want to make a reservation? Call <strong>1-887-654-3210</strong></h2>
    </div>
</div> <!-- ../Call Reservation Section -->

@endsection

@section('js')

<script>
 
    function add_wish(product_id) {

        var inputWishElement = $("#input-wish-" + product_id);
       
        if($(inputWishElement).attr('att') == 0){
            $(inputWishElement).css('color', 'red');
            $(inputWishElement).attr('att',1);
            save_to_db(product_id);
        } else {
            $(inputWishElement).css('color', 'grey');
            $(inputWishElement).attr('att',0);
        }
    }


    function save_to_db(product_id) {
        
        var inputWishElement = $("#input-wish-" + product_id);
        var data = {
            'id' : product_id,
            "_token": "{{ csrf_token() }}",
        }
        $.ajax({
            url: "{{ route('wish.store')}}",
            data: data ,
            type: 'post',
            success: function(response) {
                $(inputWishElement).css('color', 'red');
                $(inputWishElement).attr('att',1);
                if(response.data){
                    new Noty({
                            type: 'success',
                            layout: 'topRight',
                            text: "You added product to wishlist successfully",
                            theme: 'sunset',
                            timeout: 2500,
                            killer: true
                    }).show();
                }else{
                    new Noty({
                            type: 'success',
                            layout: 'topRight',
                            text: "You aleardy have this product in wishlist ",
                            theme: 'sunset',
                            timeout: 2500,
                            killer: true
                    }).show();
                }
               
            },
            error:function(error){
                console.log('error');
            }
        });
    }
    
    function check_name(product_id){
        var inputWishElement = $(".wishlist_btn");
        var data = {
            'id' : product_id,
            "_token": "{{ csrf_token() }}",
        }
        $.ajax({
            url: "{{ route('wish.check')}}",
            data: data ,
            type: 'post',
            success: function(response) {
              
                if(response.data){
                    console.log('true');
                    $(inputWishElement).css('color', 'red');
                    $(inputWishElement).attr('att',1);
                }else{
                    console.log('fasle');
                    $(inputWishElement).css('color', 'grey');
                    $(inputWishElement).attr('att',0);
                }
               
            },
            error:function(error){
                console.log('error');
            }
        });

    }
  
</script>

@endsection