@extends('layouts.dashboard.master')
@section('css')
<link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css">
<!-- noty -->
<link rel="stylesheet" href="{{asset('dashboard/assets/noty/noty.css')}}">
<!-- noty js  -->
<script src="{{asset('dashboard/assets/noty/noty.min.js')}}"></script>
@endsection

@section('page-header')
<!-- breadcrumb -->
<div class="breadcrumb-header justify-content-between">
    <div class="my-auto">
        <div class="d-flex">
            <h4 class="content-title mb-0 my-auto">categories</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"> / show</span>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row opened -->
<div class="row row-sm">
    <!-- button add category  -->
    <div class="m-auto py-2">
        <a class="modal-effect btn btn-outline-primary " data-effect="effect-super-scaled" data-toggle="modal" href="#modaldemo3">
            <i class="far fa-plus-square"></i> Add Category
        </a>
    </div><!-- ../button add category  -->

    <!-- datatable show data  -->
    <div class="col-12">
        <table class="table table-bordered text-center" id="category-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>name</th>
                    <th>product</th>
                    <th>show on home</th>
                    <th>action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div><!-- ../datatable show data  -->
</div>
<!-- /row -->
</div>
<!-- Container closed -->

<!-- Add Modal effects -->
<form id="add_form">
    <div class="modal" id="modaldemo3">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header ">
                    <h6 class="modal-title">Add Category</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <label for="name_Add"> Name</label>
                    <input type="text" class="form-control" name="name" id="name_add" placeholder="Enter name">
                </div>
                <div class="modal-footer">
                    <div class="spinner-border text-success" role="status" id="sinpper_add">
                        <span class="visually-hidden"></span>
                    </div>
                    <button class="btn ripple btn-primary" type="button" id="add">Add category</button>
                    <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
                </div>
            </div>
        </div>
    </div><!-- ../End Add Modal effects-->
</form>

<!--  edit Modal effects -->
<form id="update_form">
    <div class="modal" id="modaldemo1">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Edit category</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <input type="hidden" class="form-control my-1" name="id" id="id_update" value="">
                    <input type="text" class="form-control my-2" name="name" id="name_update" value="">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" name="active" id="Check">
                        <label class="form-check-label" for="Check">
                            Add to home page
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="spinner-border text-success" role="status" id="sinpper_update">
                        <span class="visually-hidden"></span>
                    </div>
                    <button class="btn ripple btn-info" type="button" id="update">Update</button>
                    <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
                </div>
            </div>
        </div>
    </div><!-- ../End edit Modal effects-->
</form>


<!-- delete Modal effects -->
<div class="modal" id="modaldemo2">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header bg-danger text-muted">
                <h6 class="modal-title">Are you sure you want Delete category</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <input type="hidden" class="form-control my-1" name="id" id="id_delete" value="">
                <input type="text" class="form-control" name="name" id="name_delete" value="" readonly>
            </div>
            <div class="modal-footer">
                <div class="spinner-border text-success" role="status" id="sinpper_delete">
                    <span class="visually-hidden"></span>
                </div>
                <button class="btn ripple btn-danger" type="button" id="delete">Delete</button>
                <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
            </div>
        </div>
    </div>
</div><!-- ../End delete Modal effects-->


</div>
<!-- main-content closed -->
@endsection

@section('js')

<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>

<script>

    //hide sinpper
    $('#sinpper_delete').hide();
    $('#sinpper_update').hide();
    $('#sinpper_add').hide();

    //datatable category data show 
    $(function() {
        $('#category-table').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
             order: [ 1, 'asc' ],
            ajax: '{!! route("category.show") !!}',
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    title: '#',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'product',
                    title: 'product_number',
                    sortable: false,
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'checkbox',
                    title: 'show on home page',
                    sortable: false,
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'action',
                    name: 'action',
                    sortable: false,
                    orderable: false,
                    searchable: false
                },
            ]
        });
    });

    //reset modal update if click check without reload
    $('#modaldemo1').on('hidden.bs.modal', function(e) {
        $("#update_form").trigger("reset");
    })


    //get data to modal for update category 
    $('#modaldemo1').on('shown.bs.modal', function(e) {
        var button = $(e.relatedTarget);
        var id = button.data('id');
        var active = button.data('active');
        var name = button.data('name');
        var modal = $(this);
        modal.find('.modal-body #id_update').val(id);
        modal.find('.modal-body #name_update').val(name);
        active == '1' ? $("input[type='checkbox'][name='active']").attr("checked", "checked") :
            $("input[type='checkbox'][name='active']").attr("checked", false);
    })


    //get data to modal for delete category 
    $('#modaldemo2').on('shown.bs.modal', function(e) {
        var button = $(e.relatedTarget);
        var id = button.data('id');
        var name = button.data('name');
        var modal = $(this);
        modal.find('.modal-body #id_delete').val(id);
        modal.find('.modal-body #name_delete').val(name);
    })

    // ajax request add category 
    $("#add").on("click", function() {


        let data = {
            name: $('#name_add').val().trim(),
            _token: "{{ csrf_token() }}",
            is_valid: true
        };

        if (data.name == '') {
            data.is_valid = false;
            $('#name_add').css('border-bottom', '1px solid red');
        }


        if(data.is_valid){

            $('#sinpper_add').show();

            $.ajax({
                type: "POST",
                url: "{{ route('category.store')}}",
                data: data,
                success: function(data) {
                    $("#category-table").DataTable().ajax.reload();
                    $('#sinpper_add').hide();
                    $('#modaldemo3').modal('toggle');
                    new Noty({
                        type: 'success',
                        layout: 'topRight',
                        text: "You added category successfully",
                        theme: 'sunset',
                        timeout: 2500,
                        killer: true
                    }).show();
                },
                error: function(error) {
                    alert('error');
                }
            });
        }
    });

    //reset modal add clear write in input without reload
    $('#modaldemo3').on('hidden.bs.modal', function(e) {
        $("#add_form").trigger("reset");
    })

    // ajax request update category 
    $("#update").on("click", function() {

        $('#sinpper_update').show();

        $.ajax({
            type: "PUT",
            url: "category/update",
            data: {
                'id': $("#id_update").val(),
                'name': $("#name_update").val(),
                'active': ($("input[type='checkbox'][name='active']").is(':checked') == true ? '1' : '0'),
                "_token": "{{ csrf_token() }}",
            },
            success: function(data) {
                console.log(data);
                $("#category-table").DataTable().ajax.reload();
                $('#sinpper_update').hide();
                $('#modaldemo1').modal('hide');
                new Noty({
                    type: 'success',
                    layout: 'topRight',
                    text: "You updated category successfully",
                    theme: 'sunset',
                    timeout: 2500,
                    killer: true
                }).show();
            },
            error: function(error) {
                alert('error');
            }
        });
    });


    // ajax request delete category 
    $("#delete").on("click", function() {

        $('#sinpper_delete').show();

        $.ajax({
            type: "DELETE",
            url: "category/destroy",
            data: {
                'id': $("#id_delete").val(),
                'name': $("#name_delete").val(),
                "_token": "{{ csrf_token() }}",
            },
            success: function(data) {
                $("#category-table").DataTable().ajax.reload();
                $('#sinpper_delete').hide();
                $('#modaldemo2').modal('toggle');
                new Noty({
                    type: 'success',
                    layout: 'topRight',
                    text: "You deleted category successfully",
                    theme: 'sunset',
                    timeout: 2500,
                    killer: true
                }).show();
            },
            error: function(error) {
                alert('error');
            }
        });

    });


</script>

@endsection