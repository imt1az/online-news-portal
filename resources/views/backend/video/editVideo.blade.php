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
                            <li class="breadcrumb-item"><a href="javascript: void(0);">StarLine</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                            <li class="breadcrumb-item active">Basic Elements</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Edit Video</h4>
                </div>
            </div>
        </div>     
        <!-- end page title --> 

        <!-- Form row -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Edit Video</h4>
                       
                        <form id="myForm" method="post" action="{{ route('update.video') }}" enctype="multipart/form-data">
                            
                            @csrf
                            <input type="hidden" name="id" value="{{ $video->id }}">
                            <div class="row">
                                <div class="form-group col-md-6 mb-3">
                                    <label for="" class="form-label">Video title</label>
                                    <input type="text" class="form-control" id="title" name="video_title" value="{{ $video->video_title }}" placeholder="Video Title" >
                                </div>
                                <div class="form-group col-md-6 mb-3">
                                    <label for="" class="form-label">Video Url</label>
                                    <input   type="text" class="form-control" id="title" name="video_url" value="{{ $video->video_url }}" placeholder="Video Title" style="overflow: hidden" >
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Choose Image</label>
                                        <input type="file" id='image' name="video_image" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="example-fileinput" class="form-label"></label>
                                        <img id='showImage'
                                            src="{{ asset($video->video_image) }}"
                                            class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">

                                    </div>
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
    $(document).ready(function() {
        $('#image').change(function(e) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        })
    })
</script>

    
@endsection