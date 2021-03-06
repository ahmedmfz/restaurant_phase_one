@extends('layouts.master')

@section('content')

<div id="portfolio">
    
    <div class="section-title text-center center">
        <div class="overlay">
            <br>
            <br>
            <h2> Reset Password </h2>
        </div>
    </div>


    <div class="bg-secondary">
        <div class="container">
            <div class="row text-center email_verification">
                <div class="col-md-8 col-md-offset-2">
                <div class="card">
                    <!-- <div class="card-header">{{ __('Reset Password') }}</div> -->

                    <div class="card-body">
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="row reset_input">
                                <label for="email" class="col-md-4 col-form-label text-md-end reset_input_label">{{ __('E-Mail Address : ') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <p>{{ $message }}</p>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row reset_input">
                                <label for="password" class="col-md-4 col-form-label text-md-end reset_input_label">{{ __('Password : ') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <p>{{ $message }}</p>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row reset_input">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end reset_input_label">{{ __('Confirm Password : ') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-12 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Reset Password') }}
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




