@extends('frontend.home_dashboard')


@section('home')
    <div class="main-section" style="overflow: hidden;">
        @php
        
            $sp = App\Models\NewsPost::where('status',1)->where('special',1)->limit(1)->get();
     
      
    @endphp
       

        <div class="container">
            <div class="row mb-3">
                <div class="col-lg-12 col-md-12">
                    @foreach ($sp as $item)
                        @if ($item->special == 1)
                        <div class="item">
                            <div class="photo">
                                <a class="themeGallery" href="{{ $item->image }}">
                                    <img src="{{ $item->image }}" alt="PHOTO"></a>
                                    <div style="">
                                        <h3 class="photoCaption" style="">
                                            <a href="{{ url('news/details/' . $item->id . '/' . $item->news_title_slug) }}">{{ $item->news_title }}</a>
                                        </h3>
                                    </div>
                              
                            </div>
                        </div>
                            @elseif($item->special == 0)
                           
                        @endif
                    @endforeach
                    
            
                  
           
                  
                </div>
            </div>
        </div>

        <section class="themesBazar_section_one">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-8">
                        <div class="row">
                            <div class="col-lg-7 col-md-7">
                                <div class="themesbazar_led_active owl-carousel owl-loaded owl-drag">


                                    @php
                                        $sliders = App\Models\NewsPost::where('status', 1)
                                            ->where('top_slider', 1)
                                            ->limit(5)
                                            ->get();
                                    @endphp
                                    <div class="owl-stage-outer">
                                        <div class="owl-stage"
                                            style="transform: translate3d(-1578px, 0px, 0px); transition: all 1s ease 0s; width: 3684px;">
                                            @foreach ($sliders as $item)
                                                <div class="owl-item active" style="width: 506.25px;  margin-right: 20px;">
                                                    <div class="secOne_newsContent">
                                                        <div class="sec-one-image">
                                                            <a
                                                                href="{{ url('news/details/' . $item->id . '/' . $item->news_title_slug) }}"><img
                                                                    class="lazyload" src="{{ asset($item->image) }}"></a>

                                                            <h1 class="sec-one-title">
                                                                <a
                                                                    href="{{ url('news/details/' . $item->id . '/' . $item->news_title_slug) }}">{{ $item->news_title }}</a>
                                                            </h1>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach


                                        </div>
                                    </div>
                                    <div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><i
                                                class="fa-solid fa-angle-left"></i></button>
                                        <button type="button" role="presentation" class="owl-next"><i
                                                class="fa-solid fa-angle-right"></i></button>
                                    </div>
                                    <div class="owl-dots"><button role="button"
                                            class="owl-dot"><span></span></button><button role="button"
                                            class="owl-dot active"><span></span></button><button role="button"
                                            class="owl-dot"><span></span></button></div>
                                </div>


                            </div>
                            <div class="col-lg-5 col-md-5">
                                @php
                                    $sectionThree = App\Models\NewsPost::where('status', 1)
                                        ->where('first_section_three', 1)
                                        ->limit(3)
                                        ->get();
                                @endphp

                                @foreach ($sectionThree as $item)
                                    <div class="secOne-smallItem">
                                        <div class="secOne-smallImg">
                                            <a href="{{ url('news/details/' . $item->id . '/' . $item->news_title_slug) }}"><img
                                                    class="lazyload" src="{{ asset($item->image) }}"></a>
                                            <h5 class="secOne_smallTitle" style="padding: 1.5px">
                                                <a
                                                    href="{{ url('news/details/' . $item->id . '/' . $item->news_title_slug) }}">{{ $item->news_title }}</a>
                                            </h5>
                                        </div>
                                    </div>
                                @endforeach




                            </div>
                        </div>
                        <div class="sec-one-item2">
                            <div class="row">
                                @php
                                    $sectionNine = App\Models\NewsPost::where('status', 1)
                                        ->where('first_section_nine', 1)
                                        ->orderBy('id', 'DESC')
                                        ->limit(9)
                                        ->get();
                                    
                                @endphp

                                @foreach ($sectionNine as $item)
                                    <div class="themesBazar-3 themesBazar-m2">
                                        <div class="sec-one-wrpp2">
                                            <div class="secOne-news">
                                                <div class="secOne-image2">
                                                    <a
                                                        href="{{ url('news/details/' . $item->id . '/' . $item->news_title_slug) }}"><img
                                                            class="lazyload" src="{{ asset($item->image) }}"></a>
                                                </div>
                                                <h4 class="secOne-title2">
                                                    <a
                                                        href="{{ url('news/details/' . $item->id . '/' . $item->news_title_slug) }}">{{ $item->news_title }}</a>
                                                </h4>
                                            </div>
                                            <div class="cat-meta">
                                                <a href=" "> <i class="lar la-newspaper"></i>
                                                    {{ $item->created_at->format('M d Y') }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach



                            </div>
                        </div>
                    </div>

                    @php
                        $live = App\Models\LiveTv::find(1);
                    @endphp

                    <div class="col-lg-3 col-md-4">
                        <div class="live-item">
                            <div class="live_title">
                                <a href=" ">লাইভ টিভি </a>
                                <div class="themesBazar"></div>
                            </div>
                            <div class="popup-wrpp">
                                <div class="live_image">
                                    <img width="700" height="400" src="{{ asset($live->live_image) }}"
                                        class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt=""
                                        loading="lazy">
                                    <div data-mfp-src="#mymodal" class="live-icon modal-live"><a href=""></a> <i
                                            class="las la-play">


                                        </i>
                                    </div>
                                </div>
                                <div class="live-popup">
                                    <div id="mymodal" class="mfp-hide" role="dialog" aria-labelledby="modal-titles"
                                        aria-describedby="modal-contents">
                                        <div id="modal-contents">
                                            <div class="embed-responsive embed-responsive-16by9 embed-responsive-item">


                                                <iframe src="{{ $live->live_url }}" width="560" height="314"
                                                    style="border:none;overflow:hidden" scrolling="no" frameborder="0"
                                                    allowfullscreen="true"
                                                    allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share"
                                                    allowFullScreen="true">
                                                </iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="themesBazar_widget">
                            <h3 style="margin-top:5px"> পুরাতন খবর </h3>
                        </div>
                        <form class="wordpress-date" action="{{ route('search-by-date') }}" method="post">
                            @csrf
                            <input type="date" id="wordpress" placeholder="Select Date" autocomplete="off"
                                name="date" class="hasDatepicker">
                            <input type="submit" value="Search">
                        </form>
                        <div class="recentPopular">
                            <ul class="nav nav-pills" id="recentPopular-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <div class="nav-link active" id="recent-tab" data-bs-toggle="pill"
                                        data-bs-target="#recent" role="tab" aria-controls="recent"
                                        aria-selected="false"> নতুন </div>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <div class="nav-link" id="popular-tab" data-bs-toggle="pill"
                                        data-bs-target="#popular" role="tab" aria-controls="popular"
                                        aria-selected="false"> জনপ্রিয় </div>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane active show  fade" id="recent" role="tabpanel"
                                aria-labelledby="recent">
                                <div class="news-titletab">
                                    @foreach ($newNewsPost as $item)
                                        <div class="tab-image tab-border">
                                            <a href="{{ url('news/details/' . $item->id . '/' . $item->news_title_slug) }}"><img class="lazyload" src="{{ asset($item->image) }}"></a>
                                            {{-- <a href=" " class="tab-icon"><i class="la la-play"></i></a> --}}
                                            <h4 class="tab_hadding"><a href="{{ url('news/details/' . $item->id . '/' . $item->news_title_slug) }}">{{ $item->news_title }} </a>
                                            </h4>
                                        </div>
                                    @endforeach


                                </div>
                            </div>
                            <div class="tab-pane fade" id="popular" role="tabpanel" aria-labelledby="popular">
                                <div class="news-titletab">
                                    @foreach ($newsPopular as $item)
                                        <div class="tab-image tab-border">
                                            <a href=" "><img class="lazyload" src="{{ asset($item->image) }}"></a>
                                            <a href=" " class="tab-icon"><i class="la la-play"></i></a>
                                            <h4 class="tab_hadding"><a href=" ">{{ $item->news_title }} </a>
                                            </h4>
                                        </div>
                                    @endforeach







                                </div>
                            </div>
                        </div>
                        @php
                            $banner = App\Models\Banner::find(1);
                        @endphp
                        <div class="themesBazar_widget">
                            <h3 style="margin-top:5px">আমাদের পন্য</h3>
                        </div>
                        <div class="facebook-content">
                            <img width="700" height="400" src="{{ asset($banner->home_three) }}"
                                class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt=""
                                loading="lazy">
                        </div>
                        {{-- <div class="themesBazar_widget">
                            <h3 style="margin-top:5px">আমাদের ফেসবুক পেজ</h3>
                        </div>
                        <div class="facebook-content">
                            <div class="twitter-timeline twitter-timeline-rendered"
                                style="display: flex; width: 410px; max-width: 100%; margin-top: 0px; margin-bottom: 0px;">
                                <a href="https://www.facebook.com/starlinegroupfeni">
                                    <div class="facebook-content">
                                        <img width="700" height="400"
                                            src="{{ asset('frontend/assets/images/facebook.jpg') }}"
                                            class="attachment-post-thumbnail size-post-thumbnail wp-post-image"
                                            alt="" loading="lazy">
                                    </div>
                                </a>
                                
                            </div>
                            <script async="" src="assets/js/widgets.js" charset="utf-8"></script>
                        </div> --}}
                    </div>
                </div>
            </div>
        </section>

        @php
            $banner = App\Models\Banner::find(1);
        @endphp

        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="themesBazar_widget">
                        <div class="textwidget">
                            <p><img style="width:100%; height:150px" loading="lazy"
                                    class="aligncenter size-full wp-image-74" src="{{ asset($banner->home_one) }}"
                                    alt="" height="auto"></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="themesBazar_widget">
                        <div class="textwidget">
                            <p><img style="width:100%;height: 150px;" loading="lazy"
                                    class="aligncenter size-full wp-image-74" src="{{ asset($banner->home_two) }}"
                                    alt="" width="100%"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @php
            $news = App\Models\NewsPost::where('status', 1)
                ->orderBy('id', 'DESC')
                ->limit(12)
                ->get();
            $categories = App\Models\Category::orderBy('id', 'ASC')->get();
        @endphp

        {{-- <section class="section-two">
            <div class="container">
                <div class="secTwo-color">
                    <div class="row">
                        <div class="col-lg-12 col-md-12">
                            <div class="themesBazar_cat6">
                                <ul class="nav nav-pills" id="categori-tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <div class="nav-link active" id="categori-tab1" data-bs-toggle="pill"
                                            data-bs-target="#Info-tabs1" role="tab" aria-controls="Info-tabs1"
                                            aria-selected="true">
                                            প্রচ্ছদ
                                        </div>
                                    </li>

                                    @foreach ($categories as $category)
                                        <li class="nav-item" role="presentation">
                                            <div class="nav-link" id="categori-tab2" data-bs-toggle="pill"
                                                data-bs-target="#category{{ $category->id }}" role="tab"
                                                aria-controls="Info-tabs2" aria-selected="false">
                                                {{ $category->category_name }} </div>
                                        </li>
                                    @endforeach

                                    <span class="themeBazar6"></span>
                                </ul>
                            </div>

                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade active show" id="Info-tabs1" role="tabpanel"
                                    aria-labelledby="categori-tab1 ">
                                    <div class="row">

                                        @foreach ($news as $item)
                                            <div class="themesBazar-4 themesBazar-m2">
                                                <div class="sec-two-wrpp">
                                                    <div class="section-two-image">

                                                        <a href="{{ url('news/details/' . $item->id . '/' . $item->news_title_slug) }} "><img class="lazyload"
                                                                src="{{ asset($item->image) }}"></a>
                                                    </div>
                                                    <h5 class="sec-two-title">
                                                        <a
                                                            href="{{ url('news/details/' . $item->id . '/' . $item->news_title_slug) }} ">{{ $item->news_title }}
                                                        </a>
                                                    </h5>
                                                </div>
                                            </div>
                                        @endforeach





                                    </div>
                                </div>


                                @foreach ($categories as $category)
                                    <div class="tab-pane fade" id="category{{ $category->id }}" role="tabpanel"
                                        aria-labelledby="categori-tab2">
                                        <div class="row">

                                            @php
                                                $catwiseNews = App\Models\NewsPost::where('category_id', $category->id)
                                                    ->orderBy('id', 'DESC')
                                                    ->get();
                                            @endphp

                                            @foreach ($catwiseNews as $item)
                                                <div class="themesBazar-4 themesBazar-m2">
                                                    <div class="sec-two-wrpp">
                                                        <div class="section-two-image">
                                                            <a href=" "><img class="lazyload"
                                                                    src="{{ asset($item->image) }}"></a>
                                                        </div>
                                                        <h5 class="sec-two-title">
                                                            <a
                                                                href="{{ url('news/details/' . $item->id . '/' . $item->news_title_slug) }} ">{{ $item->news_title }}
                                                            </a>
                                                        </h5>
                                                    </div>
                                                </div>
                                            @endforeach


                                        </div>
                                    </div>
                                @endforeach




                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}

        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="themesBazar_widget">
                        <div class="textwidget">
                            <p><img loading="lazy" class="aligncenter size-full wp-image-74"
                                    src="assets/images/biggapon-1.gif" alt="" width="100%" height="auto"></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="themesBazar_widget">
                        <div class="textwidget">
                            <p><img loading="lazy" class="aligncenter size-full wp-image-74"
                                    src="assets/images/biggapon-1.gif" alt="" width="100%" height="auto"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="section-three">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8">

                        <h2 class="themesBazar_cat07"> <a href=" "> <i class="las la-align-justify"></i> {{ $skip_cat_1->category_name }}
                            </a> </h2>

                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                @foreach ($skip_news_1 as $item)
                                       @if ($loop->index <1)
                                       <div class="secThree-bg">
                                        <div class="sec-theee-image">
                                            <a href="{{ url('news/details/' . $item->id . '/' . $item->news_title_slug) }}"><img class="lazyload" src="{{ asset($item->image) }}"></a>
                                        </div>
                                        <h4 class="secThree-title">
                                            <a href="{{ url('news/details/' . $item->id . '/' . $item->news_title_slug) }}">{{ $item->news_title }} </a>
                                        </h4>
                                    </div>
                                       @endif
                               
                                @endforeach
                                
                                <div class="row">
                                    <div class="themesBazar-2 themesBazar-m2">
                                        <div class="secThree-wrpp">
                                            <div class="sec-theee-image2">
                                                <a href=" "><img class="lazyload" src="assets/images/lazy.jpg"></a>
                                            </div>
                                            <h4 class="secThree-title2">
                                                <a href=" ">College tops the best list again </a>
                                            </h4>
                                        </div>
                                    </div>
                                    <div class="themesBazar-2 themesBazar-m2">
                                        <div class="secThree-wrpp">
                                            <div class="sec-theee-image2">
                                                <a href=" "><img class="lazyload" src="assets/images/lazy.jpg"></a>
                                            </div>
                                            <h4 class="secThree-title2">
                                                <a href=" ">College tops the best list again </a>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="bg2">
                                    @foreach ($skip_news_1 as $item)
                                    @if ($loop->index > 0)
                                    <div class="secThree-smallItem">
                                        <div class="secThree-smallImg">
                                            <a href="{{ url('news/details/' . $item->id . '/' . $item->news_title_slug) }}"><img class="lazyload" src="{{ asset($item->image) }}"></a>
                                            <a href=" " class="small-icon3"></a>
                                            <h5 class="secOne_smallTitle" style="padding: 4px">
                                                <a href="{{ url('news/details/' . $item->id . '/' . $item->news_title_slug) }}">{{ $item->news_title }} </a>
                                            </h5>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                   
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">

                 

                        <div class="map-area" style="width:100%;">
                            <div style="padding:5px 35px 0px 35px;">
                                <a href="https://www.google.com/"><img class="lazyload" src="{{asset('frontend/assets/images/biscuit.jpg') }}"></a>
                                </a>
                             
                                

                            </div>
                        </div>
                    </div>
                </div>
        </section>

        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="themesBazar_widget">
                        <div class="textwidget">
                            <p><img loading="lazy" class="aligncenter size-full wp-image-74"
                                    src="assets/images/biggapon-1.gif" alt="" width="100%" height="auto"></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="themesBazar_widget">
                        <div class="textwidget">
                            <p><img loading="lazy" class="aligncenter size-full wp-image-74"
                                    src="assets/images/biggapon-1.gif" alt="" width="100%" height="auto"></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="themesBazar_widget">
                        <div class="textwidget">
                            <p><img loading="lazy" class="aligncenter size-full wp-image-74"
                                    src="assets/images/biggapon-1.gif" alt="" width="100%" height="auto"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- <section class="section-four">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">

                        <h2 class="themesBazar_cat04"> <a href=" "> <i class="las la-align-justify"></i> {{ $skip_cate_2->category_name }}
                            </a> </h2>

                        <div class="secFour-slider owl-carousel owl-loaded owl-drag">








                            <div class="owl-stage-outer">
                                <div class="owl-stage"
                                    style="transform: translate3d(-3294px, 0px, 0px); transition: all 1s ease 0s; width: 4792px;">
                                   
                                    @foreach ($skip_news_2 as $item)
                                    <div class="owl-item cloned " style="width: 289.5px; margin-right: 10px;">
                                        <div class="secFour-wrpp ">
                                            <div class="secFour-image">
                                                <a href="{{ url('news/details/' . $item->id . '/' . $item->news_title_slug) }}"><img class="lazyload" src="{{ asset($item->image) }}"></a>
                                                <h5 class="secFour-title">
                                                    <a href="{{ url('news/details/' . $item->id . '/' . $item->news_title_slug) }}">{{ $item->news_title }}</a>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    
                                    
                               
                                </div>
                            </div>
                          
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}

        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="themesBazar_widget">
                        <div class="textwidget">
                            <p><img loading="lazy" class="aligncenter size-full wp-image-74"
                                    src="assets/images/biggapon-1.gif" alt="" width="100%" height="auto">
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="themesBazar_widget">
                        <div class="textwidget">
                            <p><img loading="lazy" class="aligncenter size-full wp-image-74"
                                    src="assets/images/biggapon-1.gif" alt="" width="100%" height="auto">
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="section-five">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4">

                        <h2 class="themesBazar_cat01"> <a href=" "> {{ $skip_sub_0->subcategory_name }} </a> </h2>

                        <div class="white-bg">
                            @foreach ($sub_news_0 as $item)
                            @if ($loop->index < 1)
                            <div class="secFive-image">
                                <a href="{{ url('news/details/' . $item->id . '/' . $item->news_title_slug) }}"><img class="lazyload" src="{{ $item->image }}"></a>
                                <div class="secFive-title">
                                    <a href="{{ url('news/details/' . $item->id . '/' . $item->news_title_slug) }}">{{ $item->news_title }}</a>
                                </div>
                            </div>
                            @endif
                                
                            @endforeach
                           
                            @foreach ($sub_news_0 as $item)
                            @if ($loop->index > 0)
                            <div class="secFive-smallItem">
                                <div class="secFive-smallImg">
                                    <a href="{{ url('news/details/' . $item->id . '/' . $item->news_title_slug) }}"><img class="lazyload" src="{{ $item->image }}"></a>
                                    <h5 class="secFive_title2">
                                        <a href="{{ url('news/details/' . $item->id . '/' . $item->news_title_slug) }}">{{ $item->news_title }}</a>
                                    </h5>
                                </div>
                            </div>
                            @endif
                            @endforeach
                            
                            
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">

                        <h2 class="themesBazar_cat01"> <a href=" "> {{ $skip_sub_2->subcategory_name }} </a> </h2>

                        <div class="white-bg">
                            @foreach ($sub_news_2 as $item)
                            @if ($loop->index < 1)
                            <div class="secFive-image">
                                <a href="{{ url('news/details/' . $item->id . '/' . $item->news_title_slug) }}"><img class="lazyload" src="{{ $item->image }}"></a>
                                <div class="secFive-title">
                                    <a href="{{ url('news/details/' . $item->id . '/' . $item->news_title_slug) }}">{{ $item->news_title }}</a>
                                </div>
                            </div>
                            @endif
                                
                            @endforeach
                           
                            @foreach ($sub_news_2 as $item)
                            @if ($loop->index > 0)
                            <div class="secFive-smallItem">
                                <div class="secFive-smallImg">
                                    <a href="{{ url('news/details/' . $item->id . '/' . $item->news_title_slug) }}"><img class="lazyload" src="{{ $item->image }}"></a>
                                    <h5 class="secFive_title2">
                                        <a href="{{ url('news/details/' . $item->id . '/' . $item->news_title_slug) }}">{{ $item->news_title }}</a>
                                    </h5>
                                </div>
                            </div>
                            @endif
                            @endforeach
                            
                            
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">

                        <h2 class="themesBazar_cat01"> <a href=" "> {{ $skip_sub_4->subcategory_name }} </a> </h2>

                        <div class="white-bg">
                            @foreach ($sub_news_4 as $item)
                            @if ($loop->index < 1)
                            <div class="secFive-image">
                                <a href="{{ url('news/details/' . $item->id . '/' . $item->news_title_slug) }}"><img class="lazyload" src="{{ $item->image }}"></a>
                                <div class="secFive-title">
                                    <a href="{{ url('news/details/' . $item->id . '/' . $item->news_title_slug) }}">{{ $item->news_title }}</a>
                                </div>
                            </div>
                            @endif
                                
                            @endforeach
                           
                            @foreach ($sub_news_4 as $item)
                            @if ($loop->index > 0)
                            <div class="secFive-smallItem">
                                <div class="secFive-smallImg">
                                    <a href="{{ url('news/details/' . $item->id . '/' . $item->news_title_slug) }}"><img class="lazyload" src="{{ $item->image }}"></a>
                                    <h5 class="secFive_title2">
                                        <a href="{{ url('news/details/' . $item->id . '/' . $item->news_title_slug) }}">{{ $item->news_title }}</a>
                                    </h5>
                                </div>
                            </div>
                            @endif
                            @endforeach
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="themesBazar_widget">
                        <div class="textwidget">
                            <p><img loading="lazy" class="aligncenter size-full wp-image-74"
                                    src="assets/images/biggapon-1.gif" alt="" width="100%" height="auto">
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="themesBazar_widget">
                        <div class="textwidget">
                            <p><img loading="lazy" class="aligncenter size-full wp-image-74"
                                    src="assets/images/biggapon-1.gif" alt="" width="100%" height="auto">
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>



 <section class="section-five">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4">

                        <h2 class="themesBazar_cat01"> <a href=" "> {{ $skip_sub_5->subcategory_name }} </a> </h2>

                        <div class="white-bg">
                            @foreach ($sub_news_5 as $item)
                            @if ($loop->index < 1)
                            <div class="secFive-image">
                                <a href="{{ url('news/details/' . $item->id . '/' . $item->news_title_slug) }}"><img class="lazyload" src="{{ $item->image }}"></a>
                                <div class="secFive-title">
                                    <a href="{{ url('news/details/' . $item->id . '/' . $item->news_title_slug) }}">{{ $item->news_title }}</a>
                                </div>
                            </div>
                            @endif
                                
                            @endforeach
                           
                            @foreach ($sub_news_5 as $item)
                            @if ($loop->index > 0)
                            <div class="secFive-smallItem">
                                <div class="secFive-smallImg">
                                    <a href="{{ url('news/details/' . $item->id . '/' . $item->news_title_slug) }}"><img class="lazyload" src="{{ $item->image }}"></a>
                                    <h5 class="secFive_title2">
                                        <a href="{{ url('news/details/' . $item->id . '/' . $item->news_title_slug) }}">{{ $item->news_title }}</a>
                                    </h5>
                                </div>
                            </div>
                            @endif
                            @endforeach
                            
                            
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">

                        <h2 class="themesBazar_cat01"> <a href=" "> {{ $skip_sub_1->subcategory_name }} </a> </h2>

                        <div class="white-bg">
                            @foreach ($sub_news_1 as $item)
                            @if ($loop->index < 1)
                            <div class="secFive-image">
                                <a href="{{ url('news/details/' . $item->id . '/' . $item->news_title_slug) }}"><img class="lazyload" src="{{ $item->image }}"></a>
                                <div class="secFive-title">
                                    <a href="{{ url('news/details/' . $item->id . '/' . $item->news_title_slug) }}">{{ $item->news_title }}</a>
                                </div>
                            </div>
                            @endif
                                
                            @endforeach
                           
                            @foreach ($sub_news_1 as $item)
                            @if ($loop->index > 0)
                            <div class="secFive-smallItem">
                                <div class="secFive-smallImg">
                                    <a href="{{ url('news/details/' . $item->id . '/' . $item->news_title_slug) }}"><img class="lazyload" src="{{ $item->image }}"></a>
                                    <h5 class="secFive_title2">
                                        <a href="{{ url('news/details/' . $item->id . '/' . $item->news_title_slug) }}">{{ $item->news_title }}</a>
                                    </h5>
                                </div>
                            </div>
                            @endif
                            @endforeach
                            
                            
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">

                        <h2 class="themesBazar_cat01"> <a href=" "> {{ $skip_sub_3->subcategory_name }} </a> </h2>

                        <div class="white-bg">
                            @foreach ($sub_news_3 as $item)
                            @if ($loop->index < 1)
                            <div class="secFive-image">
                                <a href="{{ url('news/details/' . $item->id . '/' . $item->news_title_slug) }}"><img class="lazyload" src="{{ $item->image }}"></a>
                                <div class="secFive-title">
                                    <a href="{{ url('news/details/' . $item->id . '/' . $item->news_title_slug) }}">{{ $item->news_title }}</a>
                                </div>
                            </div>
                            @endif
                                
                            @endforeach
                           
                            @foreach ($sub_news_3 as $item)
                            @if ($loop->index > 0)
                            <div class="secFive-smallItem">
                                <div class="secFive-smallImg">
                                    <a href="{{ url('news/details/' . $item->id . '/' . $item->news_title_slug) }}"><img class="lazyload" src="{{ $item->image }}"></a>
                                    <h5 class="secFive_title2">
                                        <a href="{{ url('news/details/' . $item->id . '/' . $item->news_title_slug) }}">{{ $item->news_title }}</a>
                                    </h5>
                                </div>
                            </div>
                            @endif
                            @endforeach
                            
                            
                        </div>
                    </div>
                </div>
            </div>
        </section>





        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="themesBazar_widget">
                        <div class="textwidget">
                            <p><img loading="lazy" class="aligncenter size-full wp-image-74"
                                    src="assets/images/biggapon-1.gif" alt="" width="100%" height="auto">
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="themesBazar_widget">
                        <div class="textwidget">
                            <p><img loading="lazy" class="aligncenter size-full wp-image-74"
                                    src="assets/images/biggapon-1.gif" alt="" width="100%" height="auto">
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="section-seven">
            <div class="container">

                <h2 class="themesBazar_cat01"> <a href=" "> SPORTS </a> <span> <a href=" "> More <i
                                class="las la-arrow-circle-right"></i> </a></span> </h2>

                <div class="secSecven-color">
                    <div class="row">
                        <div class="col-lg-5 col-md-5">
                            <div class="black-bg">
                                <div class="secSeven-image">
                                    <a href=" "><img class="lazyload" src="assets/images/lazy.jpg"></a> <a
                                        href=" " class="video-icon6"><i class="la la-play"></i></a>
                                </div>
                                <h6 class="secSeven-title">
                                    <a href=" ">Sachin backs Arshdeep after crucial dropped catch </a>
                                </h6>
                                <div class="secSeven-details">
                                    If filmmakers recover their money from selling OTT, satellite and music rights,
                                    how much do ticket sales matter? According to Johar, ticket sales is of utmost<a
                                        href=" "> More..</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-md-7">
                            <div class="row">
                                <div class="themesBazar-2 themesBazar-m2">
                                    <div class="secSeven-wrpp ">
                                        <div class="secSeven-image2">
                                            <a href=" "><img class="lazyload" src="assets/images/lazy.jpg"></a>
                                            <h5 class="secSeven-title2">
                                                <a href=" ">How Neymar, Mbappe & Messi are finally thriving at PSG
                                                </a>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="themesBazar-2 themesBazar-m2">
                                    <div class="secSeven-wrpp ">
                                        <div class="secSeven-image2">
                                            <a href=" "><img class="lazyload" src="assets/images/lazy.jpg"></a>
                                            <h5 class="secSeven-title2">
                                                <a href=" ">How Neymar, Mbappe & Messi are finally thriving at PSG
                                                </a>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="themesBazar-2 themesBazar-m2">
                                    <div class="secSeven-wrpp ">
                                        <div class="secSeven-image2">
                                            <a href=" "><img class="lazyload" src="assets/images/lazy.jpg"></a>
                                            <h5 class="secSeven-title2">
                                                <a href=" ">How Neymar, Mbappe & Messi are finally thriving at PSG
                                                </a>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="themesBazar-2 themesBazar-m2">
                                    <div class="secSeven-wrpp ">
                                        <div class="secSeven-image2">
                                            <a href=" "><img class="lazyload" src="assets/images/lazy.jpg"></a>
                                            <h5 class="secSeven-title2">
                                                <a href=" ">How Neymar, Mbappe & Messi are finally thriving at PSG
                                                </a>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="themesBazar_widget">
                        <div class="textwidget">
                            <p><img loading="lazy" class="aligncenter size-full wp-image-74"
                                    src="assets/images/biggapon-1.gif" alt="" width="100%" height="auto">
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="themesBazar_widget">
                        <div class="textwidget">
                            <p><img loading="lazy" class="aligncenter size-full wp-image-74"
                                    src="assets/images/biggapon-1.gif" alt="" width="100%" height="auto">
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="section-five">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4">

                        <h2 class="themesBazar_cat04"> <a href=" "> <i class="las la-align-justify"></i>
                                ENTERTAINMENT </a> </h2>

                        <div class="white-bg">
                            <div class="secFive-image">
                                <a href=" "><img class="lazyload" src="assets/images/lazy.jpg"></a>
                                <div class="secFive-title">
                                    <a href=" ">Dowry case: Cricketer Al-Amin gets anticipatory bail</a>
                                </div>
                            </div>
                            <div class="secFive-smallItem">
                                <div class="secFive-smallImg">
                                    <a href=" "><img class="lazyload" src="assets/images/lazy.jpg"></a>
                                    <h5 class="secFive_title2">
                                        <a href=" ">Dowry case: Cricketer Al-Amin gets anticipatory bail</a>
                                    </h5>
                                </div>
                            </div>
                            <div class="secFive-smallItem">
                                <div class="secFive-smallImg">
                                    <a href=" "><img class="lazyload" src="assets/images/lazy.jpg"></a>
                                    <h5 class="secFive_title2">
                                        <a href=" ">Dowry case: Cricketer Al-Amin gets anticipatory bail</a>
                                    </h5>
                                </div>
                            </div>
                            <div class="secFive-smallItem">
                                <div class="secFive-smallImg">
                                    <a href=" "><img class="lazyload" src="assets/images/lazy.jpg"></a>
                                    <h5 class="secFive_title2">
                                        <a href=" ">Dowry case: Cricketer Al-Amin gets anticipatory bail</a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">

                        <h2 class="themesBazar_cat04"> <a href=" "> <i class="las la-align-justify"></i> FEATURE
                            </a> </h2>

                        <div class="white-bg">
                            <div class="secFive-image">
                                <a href=" "><img class="lazyload" src="assets/images/lazy.jpg"></a>
                                <div class="secFive-title">
                                    <a href=" ">Liverpool thrashed by Napoli in Champions League </a>
                                </div>
                            </div>
                            <div class="secFive-smallItem">
                                <div class="secFive-smallImg">
                                    <a href=" "><img class="lazyload" src="assets/images/lazy.jpg"></a>
                                    <h5 class="secFive_title2">
                                        <a href=" ">Liverpool thrashed by Napoli in Champions League </a>
                                    </h5>
                                </div>
                            </div>
                            <div class="secFive-smallItem">
                                <div class="secFive-smallImg">
                                    <a href=" "><img class="lazyload" src="assets/images/lazy.jpg"></a>
                                    <h5 class="secFive_title2">
                                        <a href=" ">Liverpool thrashed by Napoli in Champions League </a>
                                    </h5>
                                </div>
                            </div>

                            <div class="secFive-smallItem">
                                <div class="secFive-smallImg">
                                    <a href=" "><img class="lazyload" src="assets/images/lazy.jpg"></a>
                                    <h5 class="secFive_title2">
                                        <a href=" ">Liverpool thrashed by Napoli in Champions League </a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">

                        <h2 class="themesBazar_cat04"> <a href=" "> <i class="las la-align-justify"></i>
                                FACEBOOK
                                NEWS </a> </h2>

                        <div class="white-bg">
                            <div class="secFive-image">
                                <a href=" "><img class="lazyload" src="assets/images/lazy.jpg"></a>
                                <div class="secFive-title">
                                    <a href=" ">Lewandowski hits Barca hit-trick before Bayern return </a>
                                </div>
                            </div>
                            <div class="secFive-smallItem">
                                <div class="secFive-smallImg">
                                    <a href=" "><img class="lazyload" src="assets/images/lazy.jpg"></a>
                                    <h5 class="secFive_title2">
                                        <a href=" ">Lewandowski hits Barca hit-trick before Bayern return </a>
                                    </h5>
                                </div>
                            </div>
                            <div class="secFive-smallItem">
                                <div class="secFive-smallImg">
                                    <a href=" "><img class="lazyload" src="assets/images/lazy.jpg"></a>
                                    <h5 class="secFive_title2">
                                        <a href=" ">Lewandowski hits Barca hit-trick before Bayern return </a>
                                    </h5>
                                </div>
                            </div>
                            <div class="secFive-smallItem">
                                <div class="secFive-smallImg">
                                    <a href=" "><img class="lazyload" src="assets/images/lazy.jpg"></a>
                                    <h5 class="secFive_title2">
                                        <a href=" ">Lewandowski hits Barca hit-trick before Bayern return </a>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>





{{-- 
        <section class="section-ten">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8">

                        <h2 class="themesBazar_cat01"> <a href=" "> <i class="las la-camera"></i> PHOTO GALLERY
                            </a>
                        </h2>

                        <div class="homeGallery owl-carousel owl-loaded owl-drag">







                            <div class="owl-stage-outer">
                                <div class="owl-stage"
                                    style="transform: translate3d(-4764px, 0px, 0px); transition: all 1s ease 0s; width: 5558px;">

                                    @php
                                        $photoes = App\Models\PhotoGallery::latest()->get();
                                    @endphp

                                    @foreach ($photoes as $item)
                                        <div class="owl-item" style="width: 784px; margin-right: 10px;">
                                            <div class="item">
                                                <div class="photo">
                                                    <a class="themeGallery" href="{{ asset($item->photo_gallery) }}">
                                                        <img src="{{ asset($item->photo_gallery) }}" alt="PHOTO"></a>
                                                    <h3 class="photoCaption">
                                                        <a href=" ">PHOTO GALLARY 6 </a>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach


                                </div>
                            </div>
                            <div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><i
                                        class="las la-angle-left"></i></button><button type="button"
                                    role="presentation" class="owl-next disabled"><i
                                        class="las la-angle-right"></i></button></div>
                            <div class="owl-dots disabled"></div>
                        </div>
                        <div class="homeGallery1 owl-carousel owl-loaded owl-drag">







                            <div class="owl-stage-outer">
                                <div class="owl-stage"
                                    style="transition: all 1s ease 0s; width: 2515px; transform: translate3d(-463px, 0px, 0px);">
                                    @foreach ($photoes as $item)
                                        <div class="owl-item cloned" style="width: 122.333px; margin-right: 10px;">
                                            <div class="item">
                                                <div class="phtot2">
                                                    <a class="themeGallery" href="{{ asset($item->photo_gallery) }}">
                                                        <img src="{{ asset($item->photo_gallery) }}"
                                                            alt="PHOTO"></a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach


                                </div>
                            </div>
                            <div class="owl-nav disabled"><button type="button" role="presentation"
                                    class="owl-prev"><span aria-label="Previous">‹</span></button><button
                                    type="button" role="presentation" class="owl-next"><span
                                        aria-label="Next">›</span></button></div>
                            <div class="owl-dots"><button role="button"
                                    class="owl-dot active"><span></span></button><button role="button"
                                    class="owl-dot"><span></span></button><button role="button"
                                    class="owl-dot"><span></span></button><button role="button"
                                    class="owl-dot"><span></span></button><button role="button"
                                    class="owl-dot"><span></span></button><button role="button"
                                    class="owl-dot"><span></span></button><button role="button"
                                    class="owl-dot"><span></span></button></div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">

                        <h2 class="themesBazar_cat01"> <a href=" "> <i class="las la-video"></i> VIDEO GALLERY
                            </a>
                        </h2>

                        <div class="white-bg">
                            @php
                                $video = App\Models\Videogallery::latest()->get();
                            @endphp
                            @foreach ($video as $item)
                                <div class="secFive-smallItem">
                                    <div class="secFive-smallImg">
                                        <img src="{{ $item->video_image }}">
                                        <a href="{{ $item->video_url }}" class="home-video-icon popup"><i
                                                class="las la-video"></i></a>
                                        <h5 class="secFive_title2">

                                            <a href="{{ $item->video_url }}" class="popup">
                                                {{ $item->video_title }} </a>
                                        </h5>
                                    </div>
                                </div>
                            @endforeach


                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
    </div>
@endsection
