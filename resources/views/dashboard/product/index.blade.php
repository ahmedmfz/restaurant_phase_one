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
            <h4 class="content-title mb-0 my-auto">Products</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0"> / show</span>
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
            <i class="far fa-plus-square"></i> Add Product
        </a>
    </div><!-- ../button add category  -->

    <!-- datatable show data  -->
    <div class="col-12">
        <table class="table table-bordered text-center" id="product-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>name</th>
                    <th id="cat">category_name</th>
                    <th>price</th>
                    <th>quantity</th>
                    <th>description</th>
                    <th> show</th>
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
<div class="modal" id="modaldemo3">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header ">
                <h6 class="modal-title">Add Product</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">

                    <div class="form-group">
                        <label for="name_update"> Product Name</label>
                        <input type="text" class="form-control my-2" name="name" id="name_add" value="">
                    </div>

                    <div class="form-group">
                        <label> Category Name</label>
                        <select name="menu_id" class="form-control my-2" id="menu_id_add">

                            <option value="" selected readonly> --- </option>

                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="price_update"> Price</label>
                        <input type="text" class="form-control my-2" name="price" id="price_add" value="">
                    </div>

                    <div class="form-group">
                        <label for="qty_update"> Quantity</label>
                        <input type="text" class="form-control my-2" name="qty" id="qty_add" value="">
                    </div>

                    <div class="form-group">
                        <label for="description_update"> Description </label>
                        <textarea class="form-control my-2" name="description" id="description_add"></textarea>
                    </div>

                </div>
            <div class="modal-footer">
                <div class="spinner-border text-success" role="status" id="sinpper_add">
                    <span class="visually-hidden"></span>
                </div>
                <button class="btn ripple btn-primary" type="button" id="add">Add Product</button>
                <button class="btn ripple btn-secondary" data-dismiss="modal" type="button">Close</button>
            </div>
        </div>
    </div>
</div><!-- ../End Add Modal effects-->


<!--  edit Modal effects -->
<form id="update_form">
    <div class="modal" id="modaldemo1">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Edit Product</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">

                    <input type="hidden" class="form-control my-1" name="id" id="id_update" value="">
                    <div class="form-group">
                        <label for="name_update"> Product Name</label>
                        <input type="text" class="form-control my-2" name="name" id="name_update" value="">
                    </div>

                    <div class="form-group">
                        <label> Category Name</label>
                        <select name="menu_id" class="form-control my-2" id="menu_id">

                            <option value="" id="category_select" selected></option>

                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="price_update"> Price</label>
                        <input type="text" class="form-control my-2" name="price" id="price_update" value="">
                    </div>

                    <div class="form-group">
                        <label for="qty_update"> Quantity</label>
                        <input type="text" class="form-control my-2" name="qty" id="qty_update" value="">
                    </div>

                    <div class="form-group">
                        <label for="description_update"> Description </label>
                        <textarea class="form-control my-2" name="description" id="description_update"></textarea>
                    </div>

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
                <h6 class="modal-title">Are you sure you want Delete product</h6><button aria-label="Close" class="close" data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
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


    //datatable product data show 
    $(function() {
        $('#product-table').DataTable({
            processing: true,
            serverSide: true,
            responsive: true,
            order: [1, 'asc'],
            ajax: '{!! route("product.show") !!}',
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
                    title: 'category_name',
                    searchable: true
                },
                {
                    data: 'price',
                    name: 'price',
                    title: 'price',
                },
                {
                    data: 'qty',
                    title: 'quantity'
                },
                {
                    data: 'description',
                    name: 'description',
                    title: 'description',
                    sortable: false,
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'checkbox',
                    title: 'show ',
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


    //get data to modal for update category 
    $('#modaldemo1').on('shown.bs.modal', function(e) {
        var button = $(e.relatedTarget);
        var id = button.data('id');
        var name = button.data('name');
        var price = button.data('price');
        var qty = button.data('qty');
        var menu = button.data('menu');
        var description = button.data('description');
        var active = button.data('active');
        var modal = $(this);


        modal.find('.modal-body #id_update').val(id);
        modal.find('.modal-body #name_update').val(name);
        modal.find('.modal-body #price_update').val(price);
        modal.find('.modal-body #qty_update').val(qty);
        modal.find('.modal-body #description_update').val(description);
        modal.find('.modal-body #category_select').val(menu);
        modal.find('.modal-body #category_select').text();


        $.ajax({
            type: "Post",
            url: "{{ route('category_name.show')}}",
            data: {
                'id': menu,
                "_token": "{{ csrf_token() }}",
            },
            success: function(data) {
                modal.find('.modal-body #category_select').text(data.name);
            },
        });

        active == '1' ? $("input[type='checkbox'][name='active']").attr("checked", "checked") :
            $("input[type='checkbox'][name='active']").attr("checked", false);
    })


    //reset modal update if click check without reload
    $('#modaldemo1').on('hidden.bs.modal', function(e) {
        $("#update_form").trigger("reset");
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
            menu_id: $("#menu_id_add").val(),
            price: $("#price_add").val().trim(),
            qty: $("#qty_add").val().trim(),
            description: $("#description_add").val().trim(),
            _token: "{{ csrf_token() }}",
            is_valid: true
        };

        if (data.name == '') {
            data.is_valid = false;
            $('#name_add').css('border-bottom', '1px solid red');
        }

        if (data.menu_id == '') {
            data.is_valid = false;
            $('#menu_id_add').css('border-bottom', 'none');
            $('#menu_id_add').css('border-bottom', '1px solid red ');
        }

        if (data.price == '') {
            data.is_valid = false;
            $('#price_add').css('border-bottom', '1px solid red');
        }

        if (data.qty == '') {
            data.is_valid = false;
            $('#qty_add').css('border-bottom', '1px solid red');
        }

        if (data.description == '') {
            data.is_valid = false;
            $('#description_add').css('border-bottom', '1px solid red');
        }

        if (data.is_valid) {

            $('#sinpper_add').show();

            $.ajax({
                type: "POST",
                url: "{{ route('product.store')}}",
                data: data,
                success: function(data) {
                    $("#product-table").DataTable().ajax.reload();
                    $('#sinpper_add').hide();
                    $('#modaldemo3').modal('toggle');
                    new Noty({
                        type: 'success',
                        layout: 'topRight',
                        text: "You added product successfully",
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


    // ajax request update category 
    $("#update").on("click", function() {

        let data_update = {
            id: $("#id_update").val(),
            name: $("#name_update").val().trim(),
            menu_id: $("#menu_id").val().trim(),
            price: $("#price_update").val().trim(),
            qty: $("#qty_update").val().trim(),
            description: $("#description_update").val().trim(),
            active: ($("input[type='checkbox'][name='active']").is(':checked') == true ? '1' : '0'),
            _token: "{{ csrf_token() }}",
        };
        $('#sinpper_update').show();

        $.ajax({
            type: "PUT",
            url: "product/update",
            data: data_update,
            success: function(data) {
                console.log(data);
                $("#product-table").DataTable().ajax.reload();
                $('#sinpper_update').hide();
                $('#modaldemo1').modal('hide');
                new Noty({
                    type: 'success',
                    layout: 'topRight',
                    text: "You updated product successfully",
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
            url: "product/destroy",
            data: {
                'id': $("#id_delete").val(),
                'name': $("#name_delete").val(),
                "_token": "{{ csrf_token() }}",
            },
            success: function(data) {
                $("#product-table").DataTable().ajax.reload();
                $('#sinpper_delete').hide();
                $('#modaldemo2').modal('toggle');
                new Noty({
                    type: 'success',
                    layout: 'topRight',
                    text: "You deleted product successfully",
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