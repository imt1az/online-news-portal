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
                    <h4 class="page-title">Update Banner</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <!-- Form row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Update banner</h4>
                       
                        <form id="myForm" method="post" action="{{ route('update.banner') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{ $banner->id }}">
                            <div class="row">
                                {{-- Image --}}
                                <div class="form-group col-md-6 mb-3">
                                    <label class="form-label">Home Banner One</label>
                                    <input type="file" id='image' name="home_one" class="form-control">
                                </div>

                                <div class="form-group col-md-6 mb-3">
                                    <label for="example-fileinput" class="form-label"></label>
                                    <img id='showImage' src="{{(!empty($banner->home_one) ? url($banner->home_one) : 
                                    url('upload/no_image.jpg'))}}"
                                        class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">
                                </div>
                                {{-- End Image --}}

                                {{-- Image --}}
                                <div class="form-group col-md-6 mb-3">
                                    <label class="form-label">Home Banner Two</label>
                                    <input type="file" id='image1' name="home_two" class="form-control">
                                </div>

                                <div class="form-group col-md-6 mb-3">
                                    <label for="example-fileinput" class="form-label"></label>
                                    <img id='showImage1' src="{{(!empty($banner->home_two) ? url($banner->home_two) : 
                                    url('upload/no_image.jpg'))}}"
                                        class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">
                                </div>
                                {{-- End Image --}}
                                {{-- Image --}}
                                <div class="form-group col-md-6 mb-3">
                                    <label class="form-label">Home Banner Three</label>
                                    <input type="file" id='image2' name="home_three" class="form-control">
                                </div>

                                <div class="form-group col-md-6 mb-3">
                                    <label for="example-fileinput" class="form-label"></label>
                                    <img id='showImage2' src="{{(!empty($banner->home_three) ? url($banner->home_three) : 
                                    url('upload/no_image.jpg'))}}"
                                        class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">
                                </div>
                                {{-- End Image --}}
                                {{-- Image --}}
                                <div class="form-group col-md-6 mb-3">
                                    <label class="form-label">Home Banner Four</label>
                                    <input type="file" id='image3' name="home_four" class="form-control">
                                </div>

                                <div class="form-group col-md-6 mb-3">
                                    <label for="example-fileinput" class="form-label"></label>
                                    <img id='showImage3' src="{{(!empty($banner->home_four) ? url($banner->home_four) : 
                                    url('upload/no_image.jpg'))}}"
                                        class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">
                                </div>
                                {{-- End Image --}}
                                {{-- Image --}}
                                <div class="form-group col-md-6 mb-3">
                                    <label class="form-label">Home Banner Five</label>
                                    <input type="file" id='image4' name="home_five" class="form-control">
                                </div>

                                <div class="form-group col-md-6 mb-3">
                                    <label for="example-fileinput" class="form-label"></label>
                                    <img id='showImage4' src="{{(!empty($banner->home_five) ? url($banner->home_five) : 
                                    url('upload/no_image.jpg'))}}"
                                        class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">
                                </div>
                                {{-- End Image --}}
                                {{-- Image --}}
                                <div class="form-group col-md-6 mb-3">
                                    <label class="form-label">Home Banner Six</label>
                                    <input type="file" id='image5' name="home_six" class="form-control">
                                </div>

                                <div class="form-group col-md-6 mb-3">
                                    <label for="example-fileinput" class="form-label"></label>
                                    <img id='showImage5' src="{{(!empty($banner->home_six) ? url($banner->home_six) : 
                                    url('upload/no_image.jpg'))}}"
                                        class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">
                                </div>
                                {{-- End Image --}}
                                {{-- Image --}}
                                <div class="form-group col-md-6 mb-3">
                                    <label class="form-label">Category Pages Banner</label>
                                    <input type="file" id='image6' name="home_category_one" class="form-control">
                                </div>

                                <div class="form-group col-md-6 mb-3">
                                    <label for="example-fileinput" class="form-label"></label>
                                    <img id='showImage6' src="{{(!empty($banner->home_category_one) ? url($banner->home_category_one) : 
                                    url('upload/no_image.jpg'))}}"
                                        class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">
                                </div>
                                {{-- End Image --}}
                                {{-- Image --}}
                                <div class="form-group col-md-6 mb-3">
                                    <label class="form-label">News Details Banner</label>
                                    <input type="file" id='image7' name="news_details_one" class="form-control">
                                </div>

                                <div class="form-group col-md-6 mb-3">
                                    <label for="example-fileinput" class="form-label"></label>
                                    <img id='showImage7' src="{{(!empty($banner->news_details_one) ? url($banner->news_details_one) : 
                                    url('upload/no_image.jpg'))}}"
                                        class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">
                                </div>
                                {{-- End Image --}}
                               
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
    $(document).ready(function() {
        $('#image').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        })
        $('#image1').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage1').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        })
        $('#image2').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage2').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        })
        $('#image3').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage3').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        })
        $('#image4').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage4').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        })
        $('#image5').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage5').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        })
        $('#image6').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage6').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        })
        $('#image7').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage7').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        })
    })
</script>
    
@endsection