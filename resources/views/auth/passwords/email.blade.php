@extends('layouts.master')

@section('content')

<div id="portfolio">
    
    <div class="section-title text-center center">
        <div class="overlay">
            <br>
            <br>
            <h2> Forget Password </h2>
        </div>
    </div>


    <div class="bg-secondary">
        <div class="container">
            <div class="row text-center email_verification">
                <div class="col-md-8 col-md-offset-2">
                    <div class="card">
                        <!-- <div class="card-header">{{ __('Reset Password') }}</div> -->

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf

                                <div class="row mb-3 ">
                                    <label for="email" class="col-md-4 col-form-label text-md-end email_reset">{{ __('E-Mail Address :') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <p>{{ $message }}</p>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-0 mx-auto">
                                    <div class="col-md-12 offset-md-8 ">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Send Password Reset Link') }}
                                        </button>
                                    </div>
                                </div>
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

