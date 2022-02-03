@section('css')
<!---Internal Owl Carousel css-->
<link href="{{URL::asset('dashboard/assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
<!---Internal  Multislider css-->
<link href="{{URL::asset('dashboard/assets/plugins/multislider/multislider.css')}}" rel="stylesheet">
<!--- Select2 css -->
<link href="{{URL::asset('dashboard/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection



	
    <!-- <div class="col-sm-6 col-md-4 col-xl-3 "> -->

        <a class="modal-effect btn btn-outline-info btn-sm my-2" 
        data-effect="effect-super-scaled" 
        data-toggle="modal" 
        data-id = "{{$id}}"
        data-name="{{$name}}"
        data-active = {{$active}}
        href="#modaldemo1">
        <i class="far fa-edit"></i></a>


        <a class="modal-effect btn btn-outline-danger btn-sm"
            data-effect="effect-scale" 
            data-toggle="modal" 
            data-id = "{{$id}}"
            data-name="{{$name}}"
            href="#modaldemo2"> 
            <i class="far fa-trash-alt"></i></a>
    <!-- </div> -->

     


        



