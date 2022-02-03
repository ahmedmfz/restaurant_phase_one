@extends('layouts.master')

@section('content')

<div id="portfolio">
    
    <div class="section-title text-center center">
        <div class="overlay">
            <br>
            <br>
            <h2> Register  </h2>
        </div>
    </div>

    <h1 class="margin-bottom-15">Create Account</h1>

    <div class="bg-secondary">
        <div class="container">
            <div class="col-md-12">			

                <form action="{{ route('register') }}" class="form-horizontal templatemo-create-account templatemo-container" role="form" method="post">
                @csrf

                    <div class="form-inner">
                        <div class="form-group">
                        <div class="col-md-6">		          	
                            <label for="first_name" class="control-label">First Name</label>
                            <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>
                            @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror            		            		            
                        </div>  
                        <div class="col-md-6">		          	
                            <label for="last_name" class="control-label">Last Name</label>
                            <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>
                            @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror	            		            		            
                        </div>             
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">		          	
                                <label for="email" class="control-label">Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror	            		            		            
                            </div>              
                        </div>			
                        <div class="form-group">
                            <div class="col-md-6">		          	
                                <label for="username" class="control-label">Username</label>
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror            		         	            		            		            
                            </div>
                            <div class="col-md-6 templatemo-radio-group">
                                <label class="radio-inline">
                                    <input id="male" type="radio"  name="gender" value="Male"> {{ (old('sex') == 'male') ? 'checked' : '' }} Male
                                </label>
                                <label class="radio-inline">
                                    <input id="female" type="radio"  name="gender" value="Female"> {{ (old('sex') == 'female') ? 'checked' : '' }} Female
                                </label>
                                @error('gender')
                                <span class="help-block">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>             
                            <br>
                        </div>
                        <div class="form-group">
                        <div class="col-md-6">
                            <label for="password" class="control-label">Password</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <label for="password-confirm" class="control-label">Confirm Password</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                        </div>
                        <div class="form-group">
                        <div class="col-md-12">
                            <input type="submit" value="Create account" class="btn btn-success">
                            <a href="{{ url('/login')}}" class="pull-right">Login</a>
                        </div>
                        </div>	
                    </div>				    	
                </form>		      
            </div>
        </div>
    </div>

</div>
@endsection



@section('css')

    <link rel="stylesheet" href="{{ asset ('assets/login/css/templatemo_style.css')}}">
   
@endsection

