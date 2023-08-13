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
                    <h4 class="page-title">Add Admin</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <!-- Form row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Add Admin</h4>
                       
                        <form id="myForm" method="post" action="{{ route('update.admin') }}">
                            @csrf
                            <input type="hidden" name='id' value="{{ $admin->id }}">
                            <div class="row">
                                <div class="form-group col-md-6 mb-3">
                                    <label for="" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="" value="{{ $admin->name }}" name="name" placeholder="">
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <label for="" class="form-label">Username</label>
                                    <input type="text" class="form-control" id="" value="{{ $admin->username }}" name="username" placeholder="">
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <label for="" class="form-label">Email </label>
                                    <input type="text" class="form-control" id="" value="{{ $admin->email }}" name="email" placeholder="">
                                </div>
                                {{-- <div class="form-group col-md-6 mb-3">
                                    <label for="" class="form-label">Password</label>
                                    <input type="text" class="form-control" id="" name="password" placeholder="">
                                </div> --}}
                                <div class="form-group col-md-6 mb-3">
                                    <label for="" class="form-label">Phone</label>
                                    <input type="text" class="form-control" id="" value="{{ $admin->phone }}" name="phone" placeholder="">
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
                name: {
                    required : true,
                }, 
                username: {
                    required : true,
                }, 
                email : {
                    required : true,
                }, 
                password: {
                    required : true,
                }, 
                phone: {
                    required : true,
                }, 
             
            },
            messages :{
                name: {
                    required : 'Please Enter name',
                },
                username: {
                    required : 'Please Enter username',
                },
                email: {
                    required : 'Please Enter email',
                },
                password: {
                    required : 'Please Enter password',
                },
                phone: {
                    required : 'Please Enter phone',
                }
             
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