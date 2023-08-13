@extends('admin.admin_dashboard')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<style type="text/css">
 .form-check-label{
    text-transform: capitalize;
 }
</style>
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
                    <h4 class="page-title">Add Role In Permission</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <!-- Form row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Add Role In Permission</h4>
                       
                        <form id="myForm" method="post" action="{{ route('role.permission.store') }}">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6 mb-3">
                                    <label for="" class="form-label">Roles Name</label>
                                    <select name="role_id" class="form-select" id="example-select">
                                        <option>Seletect Permission</option>
                                        @foreach ($roles as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                        
                                        
                                        
                                    </select>
                                </div>
                               
                            </div>
                            <div class="form-check mb-2 form-check-danger">
                                <input class="form-check-input rounded-circle" type="checkbox" value="" id="customckeck15">
                                <label class="form-check-label" for="customckeck15">Permission All</label>
                            </div>
                               
                            @foreach ($permission_group as $item)
                            <div class="row">
                                <div class="col-3">
                                   <div class="form-check mb-2 form-check-success">
                                       <input class="form-check-input rounded-circle" type="checkbox" value="" id="customckeck11">
                                       <label class="form-check-label" for="customckeck11">{{ $item->group_name }}</label>
                                   </div>
                                </div>
                            @php
                                $permissions = App\Models\User::getPermissionByGroupName($item->group_name)
                            @endphp

                            @foreach ($permissions as $item)
                            <div class="col-9">
                                <div class="form-check mb-2 form-check-success">
                                    <input class="form-check-input rounded-circle" name="permission[]" type="checkbox" value="{{ $item->id }}" id="customckeck{{ $item->id }}">
                                    <label class="form-check-label" for="customckeck11">{{ $item->name }}</label>
                                </div>
                             </div>
                             <br>
                            @endforeach
                               
                           </div>
                            @endforeach
                            

                        
                          

                           

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

    $('#customckeck15').click(function(){
        if($(this).is(':checked')){
            $('input[type = checkbox]').prop('checked',true);
        }
        else{
            $('input[type = checkbox]').prop('checked',false);
        }
    })
    
</script>
    
@endsection