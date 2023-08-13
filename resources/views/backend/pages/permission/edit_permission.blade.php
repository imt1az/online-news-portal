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
                    <h4 class="page-title">Edit Permission</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <!-- Form row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Edit Permission</h4>
                       
                        <form id="myForm" method="post" action="{{ route('update.permission') }}">
                            @csrf
                            <input type="hidden" name='id' value="{{ $permission->id }}">
                            <div class="row">
                                <div class="form-group col-md-6 mb-3">
                                    <label for="inputEmail4" class="form-label">Permission Name </label>
                                    <input type="text"  value="{{ $permission->name }}" name="name" class="form-control" id="inputEmail4" placeholder="Add Permission">
                                </div>
                               
                                <div class="row">
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="" class="form-label">Group Name</label>
                                        <select name="group_name" class="form-select" id="example-select">
                                            <option>Seletect Permission</option>
                                            
                                            <option value="category" {{ $permission->group_name == 'category' ? 'selected' : '' }}>Category</option> 
                                            <option value="subCategory" {{ $permission->group_name == 'subCategory' ? 'selected' : '' }}>SubCategory</option> 
                                            <option value="news" {{ $permission->group_name == 'news' ? 'selected' : '' }}>News</option> 
                                            
                                            <option value="Admin" {{ $permission->group_name == 'Admin' ? 'selected' : '' }}>Admin Setting</option> 
                                            <option value="Role" {{ $permission->group_name == 'Role' ? 'selected' : '' }}>Role And Permission</option> 
                                            
                                        </select>
                                    </div>
                                   
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
                category_name: {
                    required : true,
                }, 
            },
            messages :{
                category_name: {
                    required : 'Please Enter Category Name',
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