@extends('layouts.master')



@section('content')

<div id="portfolio">
    
    <div class="section-title text-center center">
        <div class="overlay">
            <h2>product page</h2>
            <hr>
            <p> your are welcome.</p>
        </div>
    </div>

    <div class="single-product-area">
        <div class="zigzag-bottom"></div>
        <div class="container">
            <div class="row">
              
                <div class="col-md-12">
                    <div class="product-content-right">
                        <div class="product-breadcroumb">
                            <a href="">Home</a>
                            <a href="">Category Name</a>
                            <a href="">Sony Smart TV - 2015</a>
                        </div>
                        
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="product-images">
                                    <div class="product-main-img">
                                    <img src="{{ asset('assets/img/portfolio/01-small.jpg')}}" alt="">
                                    </div>
                                    
                                    <div class="product-gallery">
                                        <img src="{{ asset('assets/img/portfolio/02-small.jpg')}}" alt="">
                                        <img src="{{ asset('assets/img/portfolio/03-small.jpg')}}" alt="">
                                        <img src="{{ asset('assets/img/portfolio/04-small.jpg')}}" alt="">
                                        <img src="{{ asset('assets/img/portfolio/05-small.jpg')}}" alt="">
                                        <img src="{{ asset('assets/img/portfolio/05-small.jpg')}}" alt="">
                                        
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="product-inner">
                                    <h2 class="product-name">{{$product->name}}</h2>
                                    <div class="product-inner-price">
                                        <ins>${{$product->price}}</ins> <del>$100.00</del>
                                    </div>    
                                    
                                    <form action="{{ route('cart.store') }}" method="POST" class="cart">
                                        @csrf
                                        
                                        @if(!in_array($product->id , $cart_id))
                                        <div class="quantity">
                                            <input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1">
                                        </div>
                                            <input type="hidden" value="{{ $product->id }}" name="id" id="id">
                                            <input type="hidden" value="{{ $product->name }}" name="name" id="name">
                                            <input type="hidden" value="{{ $product->price }}" name="price" id="price">
                                            <input type="hidden" value="2" name="image" id="image">
                                        
                                            <button class="add_to_cart_button" type="submit">Add to cart</button>
                                        @else
                                            <button class="add_to_cart_button" type="button" disabled>Added</button>
                                        @endif
                                    </form>   
                                    
                                    <div class="product-inner-category">
                                        <p>Category: <a href="">{{$product->category->name}}</a>.  </p>
                                    </div> 
                                    
                                    <div role="tabpanel">
                                        <ul class="product-tab" role="tablist">
                                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Description</a></li>
                                            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Reviews</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                <h2>Product Description</h2>  
                                                <p>{{$product->description}}</p>

                                               
                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="profile">
                                                <h2>Reviews</h2>
                                                <div class="submit-review">
                                                    <p><label for="name">Name</label> <input name="name" type="text"></p>
                                                    <p><label for="email">Email</label> <input name="email" type="email"></p>
                                                    <div class="rating-chooser">
                                                        <p>Your rating</p>

                                                        <div class="rating-wrap-post">
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                            <i class="fa fa-star"></i>
                                                        </div>
                                                    </div>
                                                    <p><label for="review">Your review</label> <textarea name="review" id="" cols="30" rows="10"></textarea></p>
                                                    <p><input type="submit" value="Submit"></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="related-products-wrapper">
                            <h2 class="related-products-title">Related Products</h2>
                            <div class="related-products-carousel">
                                <div class="single-product">
                                    <div class="product-f-image">
                                    <img src="{{ asset('assets/img/portfolio/02-small.jpg')}}" alt="">
                                        <div class="product-hover">
                                            <a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                            <a href="" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                        </div>
                                    </div>

                                    <h2><a href="">Sony Smart TV - 2015</a></h2>

                                    <div class="product-carousel-price">
                                        <ins>$700.00</ins> <del>$100.00</del>
                                    </div> 
                                </div>
                                <div class="single-product">
                                    <div class="product-f-image">
                                    <img src="{{ asset('assets/img/portfolio/03-small.jpg')}}" alt="">
                                        <div class="product-hover">
                                            <a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                            <a href="" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                        </div>
                                    </div>

                                    <h2><a href="">Apple new mac book 2015 March :P</a></h2>
                                    <div class="product-carousel-price">
                                        <ins>$899.00</ins> <del>$999.00</del>
                                    </div> 
                                </div>
                                <div class="single-product">
                                    <div class="product-f-image">
                                    <img src="{{ asset('assets/img/portfolio/04-small.jpg')}}" alt="">
                                        <div class="product-hover">
                                            <a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                            <a href="" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                        </div>
                                    </div>

                                    <h2><a href="">Apple new i phone 6</a></h2>

                                    <div class="product-carousel-price">
                                        <ins>$400.00</ins> <del>$425.00</del>
                                    </div>                                 
                                </div>
                                <div class="single-product">
                                    <div class="product-f-image">
                                    <img src="{{ asset('assets/img/portfolio/05-small.jpg')}}" alt="">
                                        <div class="product-hover">
                                            <a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                            <a href="" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                        </div>
                                    </div>

                                    <h2><a href="">Sony playstation microsoft</a></h2>

                                    <div class="product-carousel-price">
                                        <ins>$200.00</ins> <del>$225.00</del>
                                    </div>                            
                                </div>
                                <div class="single-product">
                                    <div class="product-f-image">
                                    <img src="{{ asset('assets/img/portfolio/06-small.jpg')}}" alt="">
                                        <div class="product-hover">
                                            <a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                            <a href="" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                        </div>
                                    </div>

                                    <h2><a href="">Sony Smart Air Condtion</a></h2>

                                    <div class="product-carousel-price">
                                        <ins>$1200.00</ins> <del>$1355.00</del>
                                    </div>                                 
                                </div>
                                <div class="single-product">
                                    <div class="product-f-image">
                                    <img src="{{ asset('assets/img/portfolio/07-small.jpg')}}" alt="">
                                        <div class="product-hover">
                                            <a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                            <a href="" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                        </div>
                                    </div>

                                    <h2><a href="">Samsung gallaxy note 4</a></h2>

                                    <div class="product-carousel-price">
                                        <ins>$400.00</ins>
                                    </div>                            
                                </div>                                    
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>

</div>
@endsection


@section('css')

    <link rel="stylesheet" href="{{ asset ('assets/cart/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{ asset ('assets/cart/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset ('assets/cart/css/responsive.css')}}">

@endsection


@section('js')

<script src="{{ asset('assets/cart/js/owl.carousel.min.js')}}"></script>
<script src="{{ asset('assets/cart/js/jquery.sticky.js')}}"></script>
<script src="{{ asset('assets/cart/js/jquery.easing.1.3.min.js')}}"></script>
<script src="{{ asset('assets/cart/js/main.js')}}"></script>
@endsection