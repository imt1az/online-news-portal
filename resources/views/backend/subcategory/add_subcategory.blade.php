@extends('admin.admin_dashboard')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">
        
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">UBold</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                            <li class="breadcrumb-item active">Basic Elements</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Add Sub Category</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <!-- Form row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Add Sub Category</h4>
                       
                        <form id="myForm" method="post" action="{{ route('store.subcategory') }}">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6 mb-3">
                                    <label for="" class="form-label">Category Name</label>
                                    <select name="category_id" class="form-select" id="example-select">
                                        <option>Seletect One Category</option>
                                        @foreach ($categories as $item)
                                        <option value="{{ $item->id }}">{{ $item->category_name }}</option> 
                                        @endforeach
                                    </select>
                                </div>
                               
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 mb-3">
                                    <label for="" class="form-label">Sub Category Name</label>
                                    <input type="text" class="form-control" id="" name="subcategory_name" placeholder="SubCategory Name">
                                </div>
                               
                            </div>

                           

                            <button type="submit" class="btn btn-primary waves-effect waves-light">Save</button>

                        </form>

                    </div> <!-- end card-body -->
                </div> <!-- end card-->
            </div> <!-- end col -->
        </div>
        <!-- end row -->


   
        
    </div> <!-- container -->

</div> <!-- content -->
<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                subcategory_name: {
                    required : true,
                }, 
            },
            messages :{
                subcategory_name: {
                    required : 'Please Enter Sub Category Name',
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
    
@endsection