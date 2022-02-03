@extends('layouts.dashboard.master')


@section('css')
<!---Internal Owl Carousel css-->
<link href="{{URL::asset('dashboard/assets/plugins/owl-carousel/owl.carousel.css')}}" rel="stylesheet">
<!---Internal  Multislider css-->
<link href="{{URL::asset('dashboard/assets/plugins/multislider/multislider.css')}}" rel="stylesheet">
<!--- Select2 css -->
<link href="{{URL::asset('dashboard/assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection


@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">@lang('site.pages')</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"> / @lang('site.dashboard_pg')</span>
						</div>
					</div>
					<div class="d-flex my-xl-auto right-content">
					   <!-- //// -->
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row">
					
					<div class="col-sm-6 col-md-4 col-xl-3 ">
						<a class="modal-effect btn btn-outline-info btn-sm" data-effect="effect-super-scaled" data-toggle="modal" href="#modaldemo1"><i class="far fa-edit"></i></a>
					</div>
					<div class="col-sm-6 col-md-4 col-xl-3">
						<a class="modal-effect btn btn-outline-danger btn-sm" data-effect="effect-scale" data-toggle="modal" href="#modaldemo2"> <i class="far fa-trash-alt"></i></a>
					</div>

					<!-- Modal effects -->
					<div class="modal" id="modaldemo1">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content modal-content-demo">
								<div class="modal-header">
									<h6 class="modal-title">Modal Header</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
								</div>
								<div class="modal-body">
									<h6>Modal Body</h6>
									<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
								</div>
								<div class="modal-footer">
									<button class="btn ripple btn-primary" type="button">Save changes</button>
									<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
								</div>
							</div>
						</div>
					</div><!-- End Modal effects-->

					<!-- Modal effects -->
					<div class="modal" id="modaldemo2">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content modal-content-demo">
								<div class="modal-header">
									<h6 class="modal-title">Modal Header</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
								</div>
								<div class="modal-body">
									<h6>Modal Body</h6>
									<p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
								</div>
								<div class="modal-footer">
									<button class="btn ripple btn-primary" type="button">Save changes</button>
									<button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
								</div>
							</div>
						</div>
					</div><!-- End Modal effects-->

				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection

@section('js')
<!--Internal  Datepicker js -->
<script src="{{URL::asset('dashboard/assets/plugins/jquery-ui/ui/widgets/datepicker.js')}}"></script>
<!-- Internal Select2 js-->
<script src="{{URL::asset('dashboard/assets/plugins/select2/js/select2.min.js')}}"></script>
<!-- Internal Modal js-->
<script src="{{URL::asset('dashboard/assets/js/modal.js')}}"></script>
@endsection