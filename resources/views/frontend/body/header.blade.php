<header class="themesbazar_header">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4">
                <div class="date">
                    <i class="fa-regular fa-calendar"></i>
                    {{ bangla_date(time(), 'en') }} || {{ bangla_date(time()) }}
                </div>
            </div>
            <div class="col-lg-4 col-md-4">
                <form class="header-search" action=" " method="post">
                    <input type="text" alue="" name="s" placeholder=" Search Here " required="">
                    <button type="submit" value="Search"> <i class="las la-search"></i> </button>
                </form>
            </div>
            <div class="col-lg-4 col-md-4">
                <div class="header-social">
                    <ul>
                        <li> <a href="https://www.facebook.com/" target="_blank" title="facebook"><i
                                    class="lab la-facebook-f"></i> </a> </li>
                        <li><a href="https://twitter.com/" target="_blank" title="twitter"><i class="lab la-twitter">
                                </i> </a></li>
                        <li><a href="{{ route('admin.login') }}"><b> Login </b></a> </li>
                        <li> <a href=""> <b>Register</b> </a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <section class="logo-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="logo">
                        <a href="http://127.0.0.1:8000/" title="NewsFlash">
                            <img src="{{ asset('frontend/assets/images/logo.png') }}" alt="NewsFlash" title="NewsFlash">
                        </a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8">
                    <div class="banner">
                        <a href=" " target="_blank">

                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

</header>


<div class="menu_section sticky" id="myHeader">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="mobileLogo">
                    <a href=" " title="NewsFlash">
                        <img src="{{ asset('frontend/assets/images/logo.png') }}" alt="Logo" title="Logo">
                    </a>
                </div>
                <div class="stellarnav dark desktop"><a href="https://newssitedesign.com/newsflash/#"
                        class="menu-toggle full"><span class="bars"><span></span><span></span><span></span></span>
                    </a>

                    @php
                        $categories = App\Models\Category::orderBy('id')
                            ->limit(9)
                            ->get();
                    @endphp

                    <ul id="menu-main-menu" class="menu">
                        <li id="menu-item-89"
                            class="menu-item menu-item-type-custom menu-item-object-custom current-menu-item current_page_item menu-item-home menu-item-89">
                            <a href="http://127.0.0.1:8000/" aria-current="page"> <i class="fa-solid fa-house-user"></i>
                                প্রচ্ছদ</a>
                        </li>


                        @foreach ($categories as $item)

                        @php
                            $subcategories = App\Models\SubCategory::where('category_id',$item->id)->orderBy('id')->get();
                        @endphp
                            <li id="menu-item-291"
                                class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-has-children menu-item-291 has-sub">
                                <a class="f-22" href=" ">{{ $item->category_name }}</a>
                                <ul class="sub-menu">
                                    @foreach ($subcategories as $sub)
                                    <li id="menu-item-294"
                                    class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-294">
                                    <a href=" ">{{ $sub->subcategory_name }}</a>
                                </li>
                                    @endforeach
                                    
                                  

                                </ul>
                                <a class="dd-toggle" href=" "><span class="icon-plus"></span></a>
                            </li>
                        @endforeach


                        {{-- <li id="menu-item-277"
                            class="menu-item menu-item-type-taxonomy menu-item-object-category menu-item-277"><a
                                href=" ">Archive</a>
                        </li> --}}


                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
