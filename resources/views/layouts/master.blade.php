<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Touché</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Favicons
    ================================================== -->
    <!-- <link rel="shortcut icon" href="{{ asset('assets/img/favicon.ico')}}" type="image/x-icon"> -->
    <link rel="apple-touch-icon" href="{{ asset('assets/img/apple-touch-icon.png')}}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('assets/img/apple-touch-icon-72x72.png')}}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('assets/img/apple-touch-icon-114x114.png')}}">



    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/all.css')}}">

    <!-- Stylesheet
    ================================================== -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/nivo-lightbox/nivo-lightbox.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/nivo-lightbox/default.css')}}">
    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.css')}}">

    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script:400,700" rel="stylesheet">
    @yield('css')
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
    <!-- Navigation
    ==========================================-->
    <nav id="menu" class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                <a class="navbar-brand page-scroll" href="#page-top">Touché</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{ url('/')}}" class="page-scroll">Home</a></li>
                    <li><a href="{{ url('/menu')}}" class="page-scroll">Menu</a></li>
                    <li><a href="{{ url('/gallery')}}" class="page-scroll">Gallery</a></li>
                    <li><a href="{{ url('/chefs')}}" class="page-scroll">Chefs</a></li>
                    <li><a href="{{ url('/contact')}}" class="page-scroll">Contact</a></li>
                    <li>
                        <a href="{{ route('cart.list')}}"><i class="fas fa-shopping-cart icon"></i>
                            <span class="badge bg-secondary" id="cart"> {{ Cart::getTotalQuantity() }}</span>
                        </a>
                    </li>
                    @auth
                        <li>
                            <a href="{{ route('wishlist')}}"><i class="far fa-heart icon"></i>
                                <span class="badge bg-secondary" id="wish"> {{ count( auth()->user()->wishlists )}}</span>
                            </a>
                        </li>
                    @endauth
            
                    @guest
                    @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @endif
                    @else
                    <li>
                        <div class="list_login">
                            <div class="dropdown">
                                <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
                                   {{auth()->user()->username}}
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('user.show', auth()->user()->id)}}">Profile</a></li>
                                    <li role="presentation"><a role="menuitem" tabindex="-1" href="{{ route('user.orders', auth()->user()->id)}}">Old Orders</a></li>
                                    <li  role="presentation">
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    @endguest
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
    </nav>



    @yield('content')


    @if (Request::is('login') || Request::is('register') || Request::is('email/verify') || Request::is('password/reset') || Request::is('password/reset/{token}'))

    @else
    <!-- Contact Section -->
    <div id="contact" class="text-center">
        <div class="container">
            <div class="section-title text-center">
                <h2>Contact Form</h2>
                <hr>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit duis sed.</p>
            </div>
            <div class="col-md-10 col-md-offset-1">

                <form method="POST" action="{{ url('contact')}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Name" required="required">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Email" required="required">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <textarea name="message" class="form-control" rows="4" placeholder="Message" required></textarea>
                        <p class="help-block text-danger"></p>
                    </div>
                    <button type="submit" class="btn btn-custom btn-lg">Send Message</button>
                </form>

            </div>
        </div>
    </div>
    @endif

    <div id="footer">
        <div class="container text-center">
            <div class="col-md-4">
                <h3>Address</h3>
                <div class="contact-item">
                    <p>4321 California St,</p>
                    <p>San Francisco, CA 12345</p>
                </div>
            </div>
            <div class="col-md-4">
                <h3>Opening Hours</h3>
                <div class="contact-item">
                    <p>Mon-Thurs: 10:00 AM - 11:00 PM</p>
                    <p>Fri-Sun: 11:00 AM - 02:00 AM</p>
                </div>
            </div>
            <div class="col-md-4">
                <h3>Contact Info</h3>
                <div class="contact-item">
                    <p>Phone: +1 123 456 1234</p>
                    <p>Email: info@company.com</p>
                </div>
            </div>
        </div>
        <div class="container-fluid text-center copyrights">
            <div class="col-md-8 col-md-offset-2">
                <div class="social">
                    <ul>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    </ul>
                </div>
                <p>&copy; 2022 . All rights reserved. Designed by <a href="https://www.comma-software.com" rel="nofollow">Ahmed Mahfouz</a></p>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="{{ asset('assets/js/jquery.1.11.1.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/nivo-lightbox.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.isotope.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jqBootstrapValidation.js')}}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/SmoothScroll1.js')}}"></script>
    <!-- <script type="text/javascript" src="{{ asset('assets/js/contact_me.js')}}"></script> -->
    <script type="text/javascript" src="{{ asset('assets/js/main.js')}}"></script>

    @yield('js')
</body>

</html>