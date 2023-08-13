@extends('frontend.home_dashboard')


@section('home')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    @php
        $banner = App\Models\Banner::find(1);
    @endphp

    <div class="main-section" style="overflow: hidden;">

        <section class="single-page">


            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8">

                        <div class="single-add">
                        </div>

                        <div class="single-cat-info">
                            <div class="single-home">
                                <i class="la la-home"> </i><a href=" "> HOME </a>
                            </div>
                            <div class="single-cats">
                                <i class="la la-bars"></i> <a href=" "
                                    rel="category tag">{{ $news['category']['category_name'] }}</a> ,
                                @if ($news->subcategory_id == null)
                                    <a href="" rel="category tag"> </a>
                                @else
                                    <a href="" rel="category tag">{{ $news['subcategory']['subcategory_name'] }}</a>
                                @endif

                            </div>
                        </div>
                        <h5 class="single-page-subTitle">
                            {{ $news->news_title }}</h5>

                        <div class="row g-2">

                            <div class="col-lg-11 col-md-10">

                                <div class="viwe-count">
                                    <ul>
                                        <li><i class="la la-clock-o"></i> Updated

                                            {{ $news->created_at->format('M d Y') }}
                                        </li>
                                        <li> / <i class="la la-eye"></i>
                                            {{ $news->view_count }}
                                            Read
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @php
                            $multiImg = App\Models\MultiImg::where('news_id', $news->id)
                                ->orderBy('id', 'ASC')
                                ->get();
                        @endphp
                        <div class="homeGallery owl-carousel owl-loaded owl-drag">






                            <div class="owl-stage-outer">
                                <div class="owl-stage"
                                    style="transform: translate3d(-4764px, 0px, 0px); transition: all 1s ease 0s; width: 5558px;">


                                    @foreach ($multiImg as $item)
                                        <div class="owl-item active" style="width: 790px; margin-right: 10px;">
                                            <div class="item">
                                                <div class="photo">
                                                    <a class="themeGallery" href="{{ asset($item->photo_name) }}">
                                                        <img src="{{ asset($item->photo_name) }}" alt="PHOTO"></a>
                                                    <h3 class="photoCaption">
                                                        <a href=" ">{{ $news->news_title }}</a>
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>




                            <div class="owl-nav"><button type="button" role="presentation" class="owl-prev"><i
                                        class="las la-angle-left"></i></button><button type="button" role="presentation"
                                    class="owl-next disabled"><i class="las la-angle-right"></i></button></div>
                            <div class="owl-dots disabled"></div>
                        </div>

                        <div class="single-page-add2">
                            <div class="themesBazar_widget">
                                <div class="textwidget">
                                    <p><img loading="lazy" class="aligncenter size-full wp-image-74"
                                            src="assets/images/biggapon-1.gif" alt="" width="100%" height="auto">
                                    </p>
                                </div>
                            </div>
                        </div>
                        <button id="inc">A+</button>
                        <button id="dec">A-</button>

                        <news-font>
                            <div class="single-details">
                                <div class="row">
                                    {{-- <div class="col-4">
                                        <div class="siteber-add">
                                            <div class="themesBazar_widget">
                                                <div class="textwidget">
                                                    <p> <img width="400" height="400"
                                                            style="width: 300px; height:200px"
                                                            src="{{ asset($banner->home_category_one) }}"
                                                            class="attachment-post-thumbnail size-post-thumbnail wp-post-image"
                                                            alt="" loading="lazy">
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="col-12">
                                        {!! $news->news_details !!}
                                    </div>
                                    <div class="siteber-add">
                                        <div class="themesBazar_widget">
                                            <div class="textwidget">
                                                <p> <img width="400" height="400" style="width: 300px; height:200px"
                                                        src="{{ asset($banner->home_category_one) }}"
                                                        class="attachment-post-thumbnail size-post-thumbnail wp-post-image"
                                                        alt="" loading="lazy">
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        {!! $news->news_details2 !!}
                                    </div>
                                    <div class="siteber-add">
                                        <div class="themesBazar_widget">
                                            <div class="textwidget">
                                                <p> <img width="400" height="400" style="width: 300px; height:200px"
                                                        src="{{ asset($banner->home_three) }}"
                                                        class="attachment-post-thumbnail size-post-thumbnail wp-post-image"
                                                        alt="" loading="lazy">
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        {!! $news->news_details3 !!}
                                    </div>

                                </div>

                            </div>
                        </news-font>
                        <div class="single-details">
                            <div class="row">
                                <p> <img width="400" height="400" style="width: 100%; height:200px"
                                        src="{{ asset($banner->home_one) }}"
                                        class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt=""
                                        loading="lazy">
                                </p>
                            </div>
                        </div>
                        <div class="singlePage2-tag">
                            <span> Tags : </span>
                            <a href=" " rel="tag">{{ $news->tags }}</a>
                        </div>

                        <div class="single-add">
                            <div class="themesBazar_widget">
                                <div class="textwidget">
                                    <p><img loading="lazy" class="aligncenter size-full wp-image-74"
                                            src="assets/images/biggapon-1.gif" alt="" width="100%"
                                            height="auto">
                                    </p>
                                </div>
                            </div>
                        </div>

                        <h3 class="single-social-title">
                            Share News </h3>
                        <div class="single-page-social">
                            <a href="https://www.facebook.com/sharer/sharer.php?u=http://127.0.0.1:8000/news/details/{{ $news->id }}/{{ $news->news_title_slug }}" name="facebook-btn" target="_blank" title="Facebook"><i class="lab la-facebook-f"></i></a>
                            <a id="twitter-btn"  target="_blank"><i  class="lab la-twitter"></i></a>
                            <a href=" " name="linkedin-btn"
                                target="_blank"><i class="lab la-linkedin-in"></i></a>
                                <a href=" "
                                target="_blank"><i class="lab la-digg"></i></a>
                                <a href=" " name="linkedin-btn" target="_blank"><i
                                    class="lab la-pinterest-p"></i></a>
                                    <a onclick="printFunction()" target="_blank"><i
                                    class="las la-print"></i>
                                <script>
                                    function printFunction() {
                                        window.print();
                                    }
                                </script>
                            </a>
                        </div>

                        @php
                            $review = App\Models\Review::where('news_id', $news->id)
                                ->latest()
                                ->limit(10)
                                ->get();
                        @endphp
                        @foreach ($review as $item)
                            <div class="author2">

                                <div class="author-content2">
                                    <h6 class="author-caption2">
                                        <span> COMMENTS </span>
                                    </h6>
                                    <div class="author-image2">
                                        <img alt="" src="{{ url('upload/no_image.jpg') }}"
                                            class="avatar avatar-96 photo" height="96" width="96" loading="lazy">
                                    </div>
                                    <div class="authorContent">
                                        <p>{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</p>
                                        <div class="author-details">{{ $item->comment }}</div>
                                    </div>

                                </div>


                            </div>
                        @endforeach
                        <hr>

                        <form action="{{ route('store.review') }}" method="post" class="wpcf7-form init"
                            enctype="multipart/form-data" novalidate="novalidate" data-status="init">
                            @csrf
                            <input type="hidden" name="id" value="{{ $news->id }}">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @elseif(session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif
                            <div style="display: none;">

                            </div>
                            <div class="main_section">
                                {{-- <div class="row">
                                    <div class="col-md-12 col-sm-12">
                                        <div class="contact-title ">
                                            Subject *
                                        </div>
                                        <div class="contact-form">
                                            <span class="wpcf7-form-control-wrap sub_title"><input type="text"
                                                    name="sub_title" value="" size="40"
                                                    class="wpcf7-form-control wpcf7-text" aria-invalid="false"
                                                    placeholder="News Sub Title"></span>
                                        </div>
                                    </div>
                                </div> --}}



                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="contact-title">
                                            Comments *
                                        </div>
                                        <div class="contact-form">
                                            <span class="wpcf7-form-control-wrap news_details">
                                                <textarea cols="10" rows="2" name="commnet"
                                                    class="wpcf7-form-control wpcf7-textarea wpcf7-validates-as-required" aria-required="true" aria-invalid="false"
                                                    placeholder="News Details...."></textarea>
                                            </span>
                                        </div>
                                    </div>
                                </div>



                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="contact-btn">
                                        <input type="submit" value="Submit Comments"
                                            class="wpcf7-form-control has-spinner wpcf7-submit"><span
                                            class="wpcf7-spinner"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="wpcf7-response-output" aria-hidden="true"></div>
                        </form>




                        <div class="single_relatedCat">
                            <a href=" ">Related News </a>
                        </div>
                        <div class="row">

                            @foreach ($relatedNews as $item)
                                <div class="themesBazar-3 themesBazar-m2">
                                    <div class="related-wrpp">
                                        <div class="related-image">
                                            <a href=" "><img class="lazyload" src="{{ asset($item->image) }}"></a>
                                        </div>
                                        <h4 class="related-title">
                                            <a href=" ">{{ $item->news_title }}</a>
                                        </h4>
                                        <div class="related-meta">
                                            <a href=" "><i class="la la-tags"> </i>
                                                {{ $item->created_at->format('M d Y') }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach








                        </div>
                    </div>



                    <div class="col-lg-4 col-md-4">
                        <div class="sitebar-fixd" style="position: sticky; top: 0;">
                            <div class="siteber-add">
                                <div class="themesBazar_widget">
                                    <div class="textwidget">
                                        <p> <img width="400" height="400" style="width: 300px; height:200px"
                                                src="{{ asset($banner->news_details_one) }}"
                                                class="attachment-post-thumbnail size-post-thumbnail wp-post-image"
                                                alt="" loading="lazy">
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="singlePopular">
                                <ul class="nav nav-pills" id="singlePopular-tab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <div class="nav-link active" data-bs-toggle="pill"
                                            data-bs-target="#archiveTab_recent" role="tab"
                                            aria-controls="archiveRecent" aria-selected="true"> LATEST </div>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <div class="nav-link" data-bs-toggle="pill" data-bs-target="#archiveTab_popular"
                                            role="tab" aria-controls="archivePopulars" aria-selected="false"> POPULAR
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content" id="pills-tabContentarchive">
                                <div class="tab-pane fade active show" id="archiveTab_recent" role="tabpanel"
                                    aria-labelledby="archiveRecent">

                                    <div class="archiveTab-sibearNews">


                                        @foreach ($newNewsPost as $key => $item)
                                            <div class="archive-tabWrpp archiveTab-border">
                                                <div class="archiveTab-image ">
                                                    <a
                                                        href="{{ url('news/details/' . $item->id . '/' . $item->news_title_slug) }}"><img
                                                            class="lazyload" src="{{ asset($item->image) }}"></a>
                                                </div>

                                                <h4 class="archiveTab_hadding"><a
                                                        href="{{ url('news/details/' . $item->id . '/' . $item->news_title_slug) }}">{{ $item->news_title }}
                                                    </a>
                                                </h4>
                                                {{-- <div class="archive-conut">
                                            {{ $key + 1 }}
                                        </div> --}}

                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                                <div class="tab-pane fade" id="archiveTab_popular" role="tabpanel"
                                    aria-labelledby="archivePopulars">
                                    <div class="archiveTab-sibearNews">

                                        @foreach ($newsPopular as $key => $item)
                                            <div class="archive-tabWrpp archiveTab-border">
                                                <div class="archiveTab-image ">
                                                    <a
                                                        href="{{ url('news/details/' . $item->id . '/' . $item->news_title_slug) }}"><img
                                                            class="lazyload" src="{{ asset($item->image) }}"></a>
                                                </div>

                                                <h4 class="archiveTab_hadding"><a
                                                        href="{{ url('news/details/' . $item->id . '/' . $item->news_title_slug) }}">{{ $item->news_title }}
                                                    </a>
                                                </h4>
                                                {{-- <div class="archive-conut">
                                            {{ $key + 1 }}
                                        </div> --}}

                                            </div>
                                        @endforeach





                                    </div>
                                </div>
                            </div>
                            <div class="siteber-add2">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script type="text/javascript">
        var size = 16;

        function setFontSize(s) {
            size = s;
            $('news-font').css('font-size', '' + size + 'px');
        }

        function increaseFontSize() {
            setFontSize(size + 5);
        }

        function decreaseFontSize() {
            if (size > 5) {
                setFontSize(size - 5);
            }
        }
        $('#inc').click(increaseFontSize);
        $('#dec').click(decreaseFontSize);
        setFontSize(size);
    </script>


<link rel="stylesheet" href="{{ asset('frontend/assets/share_buttons/jquery.floating-social-share.min.css') }}">



<script src="{{ asset('frontend/assets/share_buttons/jquery.floating-social-share.min.js') }}"></script>
<script>
    let post = encodeURI(document.location.href);
    console.log(post)
    document.getElementById('twitter-btn').setAttribute("href",`https://mail.google.com/mail/?view=cm&su={{$news->news_title}}&body-${post}`)
    $("body").floatingSocialShare({
        buttons:[
            "facebook","linkedin"
        ],
        text:"share with: ",
        
       
    })
</script>

@endsection

