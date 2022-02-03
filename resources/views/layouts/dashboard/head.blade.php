<!-- Title -->
<title> MY Resturant Project</title>
<!-- Favicon -->
<link rel="icon" href="{{URL::asset('dashboard/assets/img/brand/favicon.png')}}" type="image/x-icon" />
<!-- Icons css -->
<link href="{{URL::asset('dashboard/assets/css/icons.css')}}" rel="stylesheet">
<!--  Custom Scroll bar-->
<link href="{{URL::asset('dashboard/assets/plugins/mscrollbar/jquery.mCustomScrollbar.css')}}" rel="stylesheet" />
<!--  Sidebar css -->
<link href="{{URL::asset('dashboard/assets/plugins/sidebar/sidebar.css')}}" rel="stylesheet">

@if (app()->getLocale() == 'ar')
    <!-- Sidemenu css -->
    <link rel="stylesheet" href="{{URL::asset('dashboard/assets/css-rtl/sidemenu.css')}}">
    @yield('css-rlt')
    <!--- Style css -->
    <link href="{{URL::asset('dashboard/assets/css-rtl/style.css')}}" rel="stylesheet">
    <!--- Dark-mode css -->
    <link href="{{URL::asset('dashboard/assets/css-rtl/style-dark.css')}}" rel="stylesheet">
    <!---Skinmodes css-->
    <link href="{{URL::asset('dashboard/assets/css-rtl/skin-modes.css')}}" rel="stylesheet">
    <!-- font cairo  -->
    <link href="https://fonts.googleapis.com/css?family=Cairo:400,700" rel="stylesheet">
     <!---custom css-->
     <link href="{{URL::asset('dashboard/assets/css-rtl/main.css')}}" rel="stylesheet">

@else
    <!-- Sidemenu css -->
    <link rel="stylesheet" href="{{URL::asset('dashboard/assets/css/sidemenu.css')}}">
    @yield('css-ltr')
    <!--- Style css -->
    <link href="{{URL::asset('dashboard/assets/css/style.css')}}" rel="stylesheet">
    <!--- Dark-mode css -->
    <link href="{{URL::asset('dashboard/assets/css/style-dark.css')}}" rel="stylesheet">
    <!---Skinmodes css-->
    <link href="{{URL::asset('dashboard/assets/css/skin-modes.css')}}" rel="stylesheet">
      <!-- font San-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,,400italic,600italic">
  
    <!---custom css-->
    <link href="{{URL::asset('dashboard/assets/css/main.css')}}" rel="stylesheet">
@endif

@yield('css')