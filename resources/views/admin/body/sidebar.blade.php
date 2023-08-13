<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!-- User box -->


        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">

                <li class="menu-title">Navigation</li>


                <li>
                    <a href="{{ route('admin.dashboard') }}">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span> Dashboard </span>
                    </a>
                </li>

                @php
                    $id = Auth::user()->id;
                    $userId = App\Models\User::find($id);
                    $status = $userId->status;
                    
                @endphp
                @if ($status == 'active')
                    
             

                <li class="menu-title mt-2">Menu</li>



                <li>
                    <a href="#sidebarEcommerce" data-bs-toggle="collapse">
                        <i class="mdi mdi-cart-outline"></i>
                        <span> Category </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarEcommerce">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.category') }}">All Category</a>
                            </li>
                            <li>
                                <a href="{{ route('add.category') }}">Add Category</a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarEcommerce" data-bs-toggle="collapse">
                        <i class="mdi mdi-cart-outline"></i>
                        <span>SubCategory</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarEcommerce">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.subcategory') }}">All SubCategory</a>
                            </li>
                            <li>
                                <a href="{{ route('add.subcategory') }}">Add SubCategory</a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#newspost" data-bs-toggle="collapse">
                        <i class="mdi mdi-account-multiple-outline"></i>
                        <span>News Post Settings</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="newspost">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.news.post') }}">All News Post</a>
                            </li>
                            <li>
                                <a href="{{ route('add.news.post') }}">Add News Post</a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarEmail" data-bs-toggle="collapse">
                        <i class="mdi mdi-email-multiple-outline"></i>
                        <span> Banner Post </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarEmail">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.banner.post') }}">All Banner</a>
                            </li>
                            <li>
                                <a href="email-read.html">Add Banner</a>
                            </li>

                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#sidebarExpages" data-bs-toggle="collapse">
                        <i class="mdi mdi-text-box-multiple-outline"></i>
                        <span>Photo Gallery Setting</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarExpages">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.photo.gallery') }}">Photo Gallery</a>
                            </li>
                            <li>
                                <a href="{{ route('add.photo.gallery') }}">Add Photo</a>
                            </li>

                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#sidebarExpages" data-bs-toggle="collapse">
                        <i class="mdi mdi-text-box-multiple-outline"></i>
                        <span>Video Gallery Setting</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarExpages">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.video.gallery') }}">Video Gallery</a>
                            </li>
                            <li>
                                <a href="{{ route('add.photo.gallery') }}">Add Video</a>
                            </li>

                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#sidebarExpages" data-bs-toggle="collapse">
                        <i class="mdi mdi-text-box-multiple-outline"></i>
                        <span>Live Tv Setting</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarExpages">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('update.live.tv') }}">Update Live Tv</a>
                            </li>


                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#sidebarExpages" data-bs-toggle="collapse">
                        <i class="mdi mdi-text-box-multiple-outline"></i>
                        <span>Review</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarExpages">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.review') }}">All Review</a>
                            </li>


                        </ul>
                    </div>
                </li>
                <li>
                    <a href="#seo" data-bs-toggle="collapse">
                        <i class="mdi mdi-text-box-multiple-outline"></i>
                        <span>SEO</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="seo">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('seo.setting') }}">Seo Settings</a>
                            </li>


                        </ul>
                    </div>
                </li>











                <li class="menu-title mt-2">Custom</li>

                <li>
                    <a href="#sidebarAuth" data-bs-toggle="collapse">
                        <i class="mdi mdi-account-circle-outline"></i>
                        <span>Admin Settings</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarAuth">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.admin') }}">All Admin</a>
                            </li>
                            <li>
                                <a href="auth-login-2.html">Add Admin</a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarExpages" data-bs-toggle="collapse">
                        <i class="mdi mdi-text-box-multiple-outline"></i>
                        <span> Role And Permission </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarExpages">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.permission') }}">All Permission</a>
                            </li>
                            <li>
                                <a href="{{ route('all.role') }}">All Role</a>
                            </li>
                            <li>
                                <a href="{{ route('add.roles.permission') }}">Roles in Permission</a>
                            </li>
                            <li>
                                <a href="{{ route('all.roles.permission') }}">All Roles in Permission</a>
                            </li>

                        </ul>
                    </div>
                </li>



                <li class="menu-title mt-2">Components</li>







                <li>
                    <a href="#sidebarIcons" data-bs-toggle="collapse">
                        <i class="mdi mdi-bullseye"></i>
                        <span> Icons </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarIcons">
                        <ul class="nav-second-level">
                            <li>
                                <a href="icons-material-symbols.html">Material Symbols Icons</a>
                            </li>
                            <li>
                                <a href="icons-two-tone.html">Two Tone Icons</a>
                            </li>
                            <li>
                                <a href="icons-feather.html">Feather Icons</a>
                            </li>

                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarForms" data-bs-toggle="collapse">
                        <i class="mdi mdi-bookmark-multiple-outline"></i>
                        <span> Forms </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarForms">
                        <ul class="nav-second-level">
                            <li>
                                <a href="forms-elements.html">General Elements</a>
                            </li>
                            <li>
                                <a href="forms-advanced.html">Advanced</a>
                            </li>
                            <li>
                                <a href="forms-validation.html">Validation</a>
                            </li>

                        </ul>
                    </div>
                </li>

                @else
                    
                @endif
            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
