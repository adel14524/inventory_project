@extends('admin.admin-master')

@section('main')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <h4 class="card-title">Add Product</h4><br><br>

                            <form method="post" action="{{ route('product.store') }}" id="myForm" enctype="multipart/form-data">
                                @csrf

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Product Name </label>
                                    <div class="form-group col-sm-10">
                                        <input name="name" class="form-control" type="text">
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Supplier Name</label>
                                    <div class="col-sm-10">
                                        <select name="supplier_id" id="supplier_id" class="form-select select2" style="width: 100%" aria-label="Default select example">
                                            <option selected=""></option>

                                            @foreach($supplier as $supp)
                                                <option value="{{ $supp->id }}">{{ $supp->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Unit Name </label>
                                    <div class="col-sm-10">
                                        <select name="unit_id" id="unit_id" class="form-select select2" aria-label="Default select example">
                                            <option selected=""></option>

                                            @foreach($unit as $uni)
                                                <option value="{{ $uni->id }}">{{ $uni->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Category Name</label>

                                    <div class="col-sm-10">
                                        <select name="category_id" id="category_id" class="form-select select2" aria-label="Default select example">
                                            <option selected=""></option>

                                            @foreach($category as $cat)
                                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Quantity </label>
                                    <div class="form-group col-sm-10">
                                        <input id="qty" type="text" value="" name="qty">
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Product Image </label>
                                    <div class="form-group col-sm-10">
                                        <input name="product_image" class="form-control" type="file"  id="image">
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">  </label>
                                    <div class="col-sm-10">
                                        <img id="showImage" class="rounded avatar-lg" src="{{  url('upload/no_image.jpg') }}" alt="Card image cap">
                                    </div>
                                </div>
                                <!-- end row -->
                                <br>

                                <input type="submit" class="btn btn-info waves-effect waves-light" value="Add Product">
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function (){
            $('#supplier_id').select2({
                width: 'resolve',
                placeholder: 'Please Select Supplier',
            });

            $('#unit_id').select2({
                width: 'resolve',
                placeholder: 'Please Select Unit',
            });

            $('#category_id').select2({
                width: 'resolve',
                placeholder: 'Please Select Category',
            });

            $('#qty').TouchSpin({
                initval: 40
            });

            $('#myForm').validate({
                rules: {
                    name: {
                        required : true,
                    },
                    supplier_id: {
                        required : true,
                    },
                    unit_id: {
                        required : true,
                    },
                    category_id: {
                        required : true,
                    },
                },
                messages :{
                    name: {
                        required : 'Please Enter Your Product Name',
                    },
                    supplier_id: {
                        required : 'Please Select One Supplier',
                    },
                    unit_id: {
                        required : 'Please Select One Unit',
                    },
                    category_id: {
                        required : 'Please Select One Category',
                    },
                },
                errorElement : 'span',
                errorPlacement: function (error,element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight : function(element, errorClass, validClass){
                    $(element).addClass('is-invalid');
                },
                unhighlight : function(element, errorClass, validClass){
                    $(element).removeClass('is-invalid');
                },
            });
        });
    </script>

    <script type="text/javascript">

        $(document).ready(function(){
            $('#image').change(function(e){
                var reader = new FileReader();
                reader.onload = function(e){
                    $('#showImage').attr('src',e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
@endsection
