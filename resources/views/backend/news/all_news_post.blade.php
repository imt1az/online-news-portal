@extends('admin.admin_dashboard')
@section('admin')

@php
    $activeNews = App\Models\NewsPost::where('status',1)->get();
    $breakingNews = App\Models\NewsPost::where('breaking_news',1)->get();
    $topSlider = App\Models\NewsPost::where('top_slider',1)->get();
    $first_section_three = App\Models\NewsPost::where('first_section_three',1)->get();
    $first_section_nine = App\Models\NewsPost::where('first_section_nine',1)->get();
@endphp
    <div class="content ">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12 mb-3">
                    <div class="page-title-box ">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <a href="{{ route('add.news.post') }}" class="btn btn-blue waves-effect waves-light">Add News
                                    Post</a>
                            </ol>
                        </div>
                       
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-md-4 col-xl-2">
                    <div class="widget-rounded-circle card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-primary border-primary border shadow">
                                        <i class="far fa-newspaper avatar-title text-white font-22"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ count($allNews) }} </span></h3>
                                        <p class="text-muted mb-1 text-truncate">Total News</p>
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->
    
                <div class="col-md-4 col-xl-2">
                    <div class="widget-rounded-circle card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-success border-success border shadow">
                                        <i class="dripicons-thumbs-up font-22 avatar-title text-white"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ count($activeNews) }}</span></h3>
                                        <p class="text-muted mb-1 text-truncate">Active News</p>
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->
    
                <div class="col-md-4 col-xl-2">
                    <div class="widget-rounded-circle card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-danger border-info border shadow">
                                        <i class="fas fa-binoculars font-22 avatar-title text-white"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ count($topSlider) }}</span></h3>
                                        <p class="text-muted mb-1 text-truncate">Top Slider</p>
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->
    
                <div class="col-md-4 col-xl-2">
                    <div class="widget-rounded-circle card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-danger border-info border shadow">
                                        <i class="fas fa-bolt font-22 avatar-title text-white"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ count($breakingNews) }}</span></h3>
                                        <p class="text-muted mb-1 text-truncate">Breaking News</p>
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->
                <div class="col-md-4 col-xl-2">
                    <div class="widget-rounded-circle card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-info border-info border shadow">
                                        <i class="fas fa-coffee font-22 avatar-title text-white"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ count($first_section_three) }}</span></h3>
                                        <p class="text-muted mb-1 text-truncate">Section 3</p>
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->
                <div class="col-md-4 col-xl-2">
                    <div class="widget-rounded-circle card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded-circle bg-primary border-info border shadow">
                                        <i class="fas fa-hand-point-right font-22 avatar-title text-white"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ count($first_section_three) }}</span></h3>
                                        <p class="text-muted mb-1 text-truncate">Section 9</p>
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div>
                    </div> <!-- end widget-rounded-circle-->
                </div> <!-- end col-->
            
            </div>
            <!-- end row-->

            <div class="row">
                <div class="col-12">
                    <div class="card overflow-auto w-100">
                        <div class="card-body">


                            <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>Sl</th>
                                        <th>Image </th>
                                        <th>Title </th>
                                        <th>Category </th>
                                        <th>Sub Category</th>
                                        <th>User </th>
                                        <th>Date </th>
                                        <th>Status </th>
                                        <th>Action </th>
                                    </tr>
                                </thead>


                                <tbody class="">
                                    @foreach ($allNews as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td><img src="{{ asset($item->image) }} " style="width: :50px; height:50px;">
                                            </td>
                                            <td>{{ Str::limit($item->news_title,60) }}</td>
                                            <td>{{ $item['category']['category_name'] }}</td>
                                            @if ($item->subcategory_id == Null)
                                               <td> </td>
                                            @else
                                                <td>{{ $item['subcategory']['subcategory_name'] }}</td>
                                            
                                         
                                                
                                            @endif
                                            
                                            <td>{{ $item['user']['name'] }}</td>
                                            <td>{{ $item->post_date  }}</td>


                                            <td>
                                                @if ($item->status == 1)
                                                    <span class="badge badge-pill bg-success">Active</span>
                                                @else
                                                    <span class="badge badge-pill bg-danger">InActive</span>
                                                @endif
                                            </td>




                                            <td>
                                                <a href="{{ route('edit.newspost',$item->id) }}"
                                                    class="btn btn-primary rounded-pill waves-effect waves-light">Edit</a>

                                                <a href="{{ route('delete.newspost',$item->id) }}"
                                                    class="btn btn-danger rounded-pill waves-effect waves-light"
                                                    id="delete">Delete</a>


                                                @if ($item->status == 1)
                                                    <a href="{{ route('inactive.news.post',$item->id) }}"
                                                        class="btn btn-primary rounded-pill waves-effect waves-light"
                                                        title="Inactive"><i class="fas fa-thumbs-up"></i></a>
                                                @else
                                                    <a href="{{ route('active.news.post',$item->id) }}"
                                                        class="btn btn-primary rounded-pill waves-effect waves-light"
                                                        title="Active"><i class="fas fa-thumbs-down"></i></i></a>
                                                @endif

                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>

                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
            <!-- end row-->



        </div> <!-- container -->

    </div> <!-- content -->
@endsection
