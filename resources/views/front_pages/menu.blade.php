@extends('layouts.master')


@section('content')

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
               
                    <div class="col-xs-12 col-sm-6">
                        <div class="menu-section">
                            <h2 class="menu-section-title">{{ $category->name }}</h2>
                            <hr>
                                @foreach($category->products as $product)
                                   
                                    <div class="menu-item">
                                        <div class="menu-item-img"> <a href=""><img src="{{asset('assets/img/menu-bg.jpg')}}"></div>
                                        <div class="menu-item-name">
                                            <a href="{{ route('menu.show',1)}}"> {{$product->name}} </a>
                                            <a href="#"><i class="far fa-heart"></i></a> 
                                        </div>
                                        <div class="menu-item-price">  <a href="#"><i class="fas fa-shopping-cart"></i></a> $45 </div>
                                        <div class="menu-item-description"> Lorem ipsum dolor sit amet, consectetur adipiscing elit, duis sed dapibus leo nec ornare diam. </div>
                                    </div>
                                
                                @endforeach
                        </div>
                    </div>
                    
                @endforeach
           
            </div>
        </div>
    </div> <!-- ../Restaurant Menu Section -->

@endsection