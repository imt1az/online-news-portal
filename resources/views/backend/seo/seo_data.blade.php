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
                            <h4 class="header-title">Update Seo</h4>

                            <form id="myForm" method="post" action="{{ route('seo.update') }}">
                                @csrf
                                <input type="hidden" name="id" value="{{ $seo->id }}">
                                <div class="row">

                                    <div class="form-group col-md-6 mb-3">
                                        <label class="form-label">Meta Title</label>
                                        <input type="text" id='' name="meta_title" value="{{ $seo->meta_title }}" class="form-control">
                                    </div>





                                    <div class="form-group col-md-6 mb-3">
                                        <label class="form-label">Meta Author</label>
                                        <input type="text" id='' name="meta_author" value="{{ $seo->meta_author }}" class="form-control">
                                    </div>



                                    <div class="col-lg-6 mb-3">
                                        <div>
                                            <label class="form-label">Meta Keyword</label>
                                            <label for="inputEmail4" class="form-label"></label>
                                            <input type="text" name="meta_keyword" value="{{ $seo->meta_keyword }}" class="selectize-close-btn" value="Feni">

                                        </div>
                                    </div>


                                    <div class="form-group col-md-6 mb-3">
                                        <label class="form-label">Meta Description</label>
                                        <input type="text" id='' name="meta_description" value="{{ $seo->meta_description }}" class="form-control">
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
@endsection
