@extends('layouts.master')

@section('content')
<div id="portfolio">
    
    <div class="section-title text-center center">
        <div class="overlay">
            <br>
            <br>
            <h2> Login  </h2>
        </div>
    </div>

    <div class="container">
		<div class="col-md-12">
			<h1 class="margin-bottom-15">Login </h1>
			<form action="{{ route('login') }}" class="form-horizontal templatemo-container templatemo-login-form-1 margin-bottom-30" role="form"  method="post">		
            @csrf
		
		        <div class="form-group">
		          <div class="col-xs-12">		            
		            <div class="control-wrapper">
		            	<label for="email" class="control-label fa-label"><i class="fas fa-user fa-2x"></i></label>
		            	<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"  placeholder="Email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
		            </div>		            	            
		          </div>              
		        </div>
		        <div class="form-group">
		          <div class="col-md-12">
		          	<div class="control-wrapper">
		            	<label for="password" class="control-label fa-label"><i class="fas fa-lock fa-2x"></i></label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
		            </div>
		          </div>
		        </div>
		        <div class="form-group">
		          <div class="col-md-12">
	             	<div class="checkbox control-wrapper">
                     <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
	                	<label class="form-check-label tx-15" for="remember">Remember me</label>
	              	</div>
		          </div>
		        </div>
		        <div class="form-group">
		          <div class="col-md-12">
		          	<div class="control-wrapper">
		          		<input type="submit" value="Log in" class="btn btn-info">
                        @if (Route::has('password.request'))
                             <a href="{{ route('password.request') }}" class="text-right pull-right">Forgot password?</a>
                        @endif
		          	</div>
		          </div>
		        </div>
		      </form>
		      <div class="text-center">
		      	<a href="{{ url('/register')}}" class="templatemo-create-new">Create new account <i class="fa fa-arrow-circle-o-right"></i></a>	
		      </div>
		</div>
	</div>
  
</div>
@endsection


@section('css')

    <link rel="stylesheet" href="{{ asset ('assets/login/css/bootstrap-social.css')}}">
    <link rel="stylesheet" href="{{ asset ('assets/login/css/templatemo_style.css')}}">
   
@endsection