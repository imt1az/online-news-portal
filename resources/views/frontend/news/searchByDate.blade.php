@extends('frontend.home_dashboard')


@section('home')
<div class="archive-page1">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="archive-topAdd">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <div class="rachive-info-cats">
                    <a href=" "><i class="las la-home"></i> </a> <i class="las la-chevron-right"></i> Search By
                    Date {{ $formatDate }}
                </div>

                <div class="row">
                    
                    @foreach ($news as $item)
                    <div class="archive1-custom-col-3">
                        <div class="archive-item-wrpp2">
                            <div class="archive-shadow arch_margin">
                                <div class="archive1_image2">
                                    <a href="{{ url('news/details/' . $item->id . '/' . $item->news_title_slug) }}"><img class="lazyload" src="{{ asset($item->image) }}"></a>
                                    <div class="archive1-meta">
                                        <a href=" "><i class="la la-tags"> </i>
                                            {{ $formatDate }}
                                        </a>
                                    </div>
                                </div>
                                <div class="archive1-padding">
                                    <div class="archive1-title2"><a href="{{ url('news/details/' . $item->id . '/' . $item->news_title_slug) }}">{{ $item->news_title }}
                                        </a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    
                    







                </div>
                <div class="archive1-margin">
                    <div class="archive-content">
                        <div class="row">
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12">
                        <span aria-current="page" class="page-numbers current">1</span>
                        <a class="page-numbers" href=" ">2</a>
                        <a class="next page-numbers" href=" ">Next »</a>
                    </div>
                </div>

                <br><br>

                <div class="row">
                    <div class="col-lg-12 col-md-12"></div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="sitebar-fixd" style="position: sticky; top: 0;">
                    <div class="siteber-add">
                        <div class="themesBazar_widget">
                            <div class="textwidget">
                                <p> <img width="700" height="400"
                                        src="{{ asset('frontend/assets/images/water.jpg') }}"
                                        class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt=""
                                        loading="lazy">
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="singlePopular">
                        <ul class="nav nav-pills" id="singlePopular-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <div class="nav-link active" data-bs-toggle="pill" data-bs-target="#archiveTab_recent"
                                    role="tab" aria-controls="archiveRecent" aria-selected="true"> LATEST </div>
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
</div>
@endsection
