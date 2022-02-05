@extends('layouts.master')


@section('css')

<!-- noty -->
<link rel="stylesheet" href="{{asset('dashboard/assets/noty/noty.css')}}">
<!-- noty js  -->
<script src="{{asset('dashboard/assets/noty/noty.min.js')}}"></script>

@endsection

@section('content')

<div id="portfolio">

    <div class="section-title text-center center">
        <div class="overlay">
            <br>
            <br>
            <h2> Wishlist </h2>
        </div>
    </div>

    <!-- <h1 class="margin-bottom-15">Check Your Email </h1> -->

    <div class="bg-secondary">
        <div class="container ">
            <div class="row ">
                @foreach(auth()->user()->wishlists as $wishlist)

                <div class="panel panel-info" id="cont_product_{{$wishlist->id}}">
                    <div class="panel-heading">
                        <h3 class="panel-title">Name of product : {{$wishlist->name}}</h3>
                    </div>
                    <div class="panel-body">
                        <p>Price of product : {{$wishlist->price}}</p>
                        <hr>
                        <a href="{{ route('product_one_show',$wishlist->id)}}" class="btn btn-primary"><i class="fas fa-info-circle"></i> More Information</a>
                        <button type="button" onclick="remove_item('{{$wishlist->id}}')" class="btn btn-danger"><i class="far fa-trash-alt"></i> Delete</a>
                    </div>

                </div>

                @endforeach
            </div>
        </div>
    </div>

</div>
@endsection

@section('js')

<script>
    // remove  product from  cart
    function remove_item(product_id) {

        let data ={
            "id" : product_id,
            "_token" : "{{ csrf_token() }}",
        }

        $.ajax({
            type: "POST",
            url: "{{route('wish.destroy')}}",
            data: data,
         
            success: function(res) {
                if (res.data) {
                    $('#wish').text(res.data);
                    $('#cont_product_'+product_id).remove();
                    new Noty({
                        type: 'success',
                        layout: 'topRight',
                        text: "You remove item form wishlist successfully",
                        theme: 'sunset',
                        timeout: 2500,
                        killer: true
                    }).show();
                }
            },
            error: function(res) {
                alert(res);
            }
        });

    }
</script>

@endsection