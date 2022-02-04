@extends('layouts.master')

@section('content')

<div id="portfolio">
    
    <div class="section-title text-center center">
        <div class="overlay">
            <br>
            <br>
            <h2> Verification Email </h2>
        </div>
    </div>

    <!-- <h1 class="margin-bottom-15">Check Your Email </h1> -->

    <div class="bg-secondary">
        <div class="container ">
            <div class="row text-center  email_verification">
                @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('A fresh verification link has been sent to your email address.') }}
                    </div>
                @endif
                <div class="col-md-7 col-md-offset-3 ">
                    <div class="card">
                        <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                        <div class="card-body">

                            {{ __('Before proceeding, please check your email for a verification link.') }}
                            {{ __('If you did not receive the email') }},
                            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}" >
                                @csrf
                                <button type="submit" class="btn btn-info  p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection



@section('css')

    <link rel="stylesheet" href="{{ asset ('assets/login/css/templatemo_style.css')}}">
   
@endsection

