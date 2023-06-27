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

                                <li class="breadcrumb-item active">Edit News Post</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Edit News Post</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <!-- Form row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <form id="myForm" method="post" action="{{ route('update.news.post') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $news->id }}">

                                <div class="row">
                                    <div class="form-group col-md-6 mb-3">
                                        <label for="inputEmail4" class="form-label">Category Name</label>

                                        <select name="category_id" id="heard" class="form-select parsley-success"
                                            required="" data-parsley-id="21">
                                            <option value="">Choose..</option>
                                            @foreach ($categories as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $item->id == $news->category_id ? 'selected' : '' }}>
                                                    {{ $item->category_name }}</option>
                                            @endforeach
                                        </select>
                                        <ul class="parsley-errors-list" id="parsley-id-21" aria-hidden="true"></ul>
                                        {{-- <select name="category_id" class="form-select" id="example-select" required="">
                                            <option>Select Category</option>
                                            @foreach ($categories as $item)
                                                <option value="{{ $item->id }}" >{{ $item->category_name }}</option>
                                            @endforeach


                                        </select> --}}
                                    </div>

                                    <div class="form-group col-md-6 mb-3">
                                        <label for="" class="form-label"> SubCategory </label>
                                        <select name="subcategory_id" class="form-select" id="">
                                            @if ($news->subcategory_id == Null)
                                            @else
                                                <option></option>
                                                @foreach ($subcategories as $item)
                                                    <option value="{{ $item->id }}"
                                                        {{ $item->id == $news->subcategory_id ? 'selected' : '' }}>
                                                        {{ $item->subcategory_name }}</option>
                                                @endforeach
                                            @endif




                                        </select>
                                    </div>

                                    <div class="form-group col-md-6 mb-3">
                                        <label for="" class="form-label">Select Writter</label>
                                        <select name="user_id" class="form-select" id="">
                                            <option>Select Writter</option>
                                            @foreach ($adminUser as $item)
                                                <option value="{{ $item->id }}"
                                                    {{ $item->id == $news->user_id ? 'selected' : '' }}>{{ $item->name }}
                                                </option>
                                            @endforeach


                                        </select>
                                    </div>

                                    <div class="form-group col-md-6 mb-3">
                                        <label for="inputEmail4" class="form-label">News Title </label>
                                        <input type="text" value="{{ $news->news_title }}" name="news_title"
                                            class="form-control" id="inputEmail4">
                                    </div>
                                    {{-- Image --}}
                                    <div class="form-group col-md-6 mb-3">
                                        <label class="form-label">Choose Image</label>
                                        <input type="file" id='image' name="image" class="form-control">
                                    </div>

                                    <div class="form-group col-md-6 mb-3">
                                        <label for="example-fileinput" class="form-label"></label>
                                        <img id='showImage' src="{{ asset($news->image) }}"
                                            class="rounded-circle avatar-lg img-thumbnail" alt="profile-image">
                                    </div>
                                    {{-- End Image --}}

                                    <div class="col-lg-6 mb-3">
                                        <div>
                                            <label class="form-label">News Tags</label>
                                            <label for="inputEmail4" class="form-label">Tags </label>
                                            <input type="text" name="tags" class="selectize-close-btn"
                                                value="{{ $news->tags }}">

                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 mb-3">

                                        <div class="controls">
                                            <label for="inputEmail4" class="form-label">Multi Image</label>
                                            <input type="file"  name="multi_img[]" class="form-control"
                                                multiple="" id="multiImg">

                                            @error('multi_img')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <div class="row mb-3" id="preview_img"></div>
                                        </div>
                                    </div>

                                    <div class="form-group col-md-6 col-md-12 mb-3">
                                        <label for="inputEmail4" class="form-label">News Details</label>
                                        <textarea name="news_details">{!! $news->news_details !!}</textarea>
                                    </div>


                                </div>

                                <div class="row">
                                    <div class="form-group col-md-6 mb-3">
                                        <div class="form-check mb-2 form-check-primary">
                                            <input class="form-check-input" type="checkbox" name="breaking_news"
                                                value="1" {{ $news->breaking_news == 1 ? 'checked' : '' }}
                                                id="customckeck1">
                                            <label class="form-check-label" for="customckeck1">Breaking News</label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <div class="form-check mb-2 form-check-primary">
                                            <input class="form-check-input" type="checkbox"
                                                {{ $news->top_slider == 1 ? 'checked' : '' }} name="top_slider"
                                                value="1" id="customckeck2">
                                            <label class="form-check-label" for="customckeck2">Top Slider</label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <div class="form-check mb-2 form-check-success">
                                            <input class="form-check-input rounded-circle" type="checkbox"
                                                {{ $news->first_section_three == 1 ? 'checked' : '' }}
                                                name="first_section_three" value="1" id="customckeck3">
                                            <label class="form-check-label" for="customckeck3">First Section Three</label>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-6 mb-3">
                                        <div class="form-check mb-2 form-check-success">
                                            <input class="form-check-input rounded-circle" type="checkbox"
                                                name="first_section_nine"
                                                {{ $news->first_section_nine == 1 ? 'checked' : '' }} value="1"
                                                id="customckeck4">
                                            <label class="form-check-label" for="customckeck4">First Section Nine</label>
                                        </div>
                                    </div>
                                </div>



                                <button type="submit" class="btn btn-primary waves-effect waves-light">Save
                                    Changes</button>

                            </form>

                           {{--Multi Image Portion Started--}}

        <section class="content mt-5">
            <div class="row">
                <div class="col-md-12">

                    <div class="box box-outline-info">
                        <div class="box-header" style="border-radius: 5px">
                            <h4 class="box-title"><strong>Multi Image Update</strong></h4>
                        </div>
                        <form method="post" action="{{route('update-multi-image')}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row row-sm">
                                @foreach($multiImgs as $img)
                                    <div class="col-md-3">
                                        <div class="card">
                                            <img src="{{asset($img->photo_name)}}" class="card-img-top"
                                                 style="height: 280px; width: 280px; margin-left: 10px; margin: auto">
                                            <div class="card-body">
                                                <h5 class="card-title">
                                                    <a href="{{route('news.multiImg.delete',$img->id)}}"
                                                       class="btn btn-sm btn-danger" id="delete"
                                                       title="Delete Data"><i class="fa fa-trash"></i></a>
                                                </h5>
                                                <p class="card-text">
                                                <div class="form-group">
                                                    <label class="form-control-label">Change Image <span
                                                            class="text-danger">*</span></label>
                                                    <input class="form-control" type="file"
                                                           name="multi_img[{{$img->id}}]">
                                                </div>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-primary mb-5" value="Update Image"
                                       style="margin-left: 16px;">
                            </div>
                            <br><br>
                        </form>
                    </div>
                </div>
            </div>
        </section>


        {{--Multi Image Portion Ended--}}

                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div> <!-- end col -->
            </div>
            <!-- end row -->



        </div> <!-- container -->

    </div> <!-- content -->

    <script type="text/javascript">
        $(document).ready(function() {
            $('#myForm').validate({
                rules: {
                    category_id: {
                        required: true,
                    },
                    news_title: {
                        required: true,
                    },

                    news_details: {
                        required: true,
                    }


                },
                messages: {
                    category_id: {
                        required: 'Please Select Categorie',
                    },
                    news_title: {
                        required: 'Please Enter News Title',
                    },

                    news_details: {
                        required: 'Please Enter News Details',
                    },


                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                },
            });
        });
    </script>

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
    <option value="{{ $item->id }}">{{ $item->category_name }}</option>
    <script type="text/javascript">
        $(document).ready(function() {
            $('select[name="category_id"]').on('change', function() {
                var category_id = $(this).val();
                if (category_id) {
                    $.ajax({
                        url: "{{ url('/subcategory/ajax') }}/" + category_id,
                        type: 'GET',
                        dataType: "json",
                        success: function(data) {
                            $('select[name="subcategory_id"]').html('');
                            var d = $('select[name="subcategory_id"]').empty();
                            $.each(data, function(key, value) {
                                $('select[name="subcategory_id"]').append(
                                    '<option value="' + value.id + '">' + value
                                    .subcategory_name + '</option>')
                            })

                        }
                    })
                } else {
                    alert('danger');
                }
            })
        })
    </script>
@endsection
