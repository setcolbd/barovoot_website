<section>
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info" style="background: url({{env('PUBLIC_PATH')}}/admin_resources/images/user-img-background.jpg) no-repeat no-repeat;">
            <div class="image">
                <img style="height: 50px" src="{{env('PUBLIC_PATH')}}/admin_resources/images/user.png">
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{Auth::user()->name}}</div>
                <div class="email">{{Auth::user()->email}}</div>
                <div class="btn-group user-helper-dropdown">
                    <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                    <ul class="dropdown-menu pull-right">
                        <li>
                            <a href="{{route('admin.profile.update')}}" class="dropdown-item"><i class="fa fa-user"></i>Your Profile</a>
                        </li>
                        <li role="separator" class="divider"></li>
                        <li><a href="{{route('admin.password.update')}}"><i class="fa fa-key"></i>Reset Password</a></li>
                        <li role="separator" class="divider"></li>
                        <li role="separator" class="divider"></li>
                        <li>
                            <a class="dropdown-item" href="{{route('admin.logout')}}"><i class="fa fa-sign-out"></i>Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="menu">
            <ul class="list">
                <li>
                    <a href="{{route('admin.home')}}" >
                        <i class="material-icons"><i class="fa fa-home"></i></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.pages')}}">
                        <i class="material-icons"><i class="fa fa-sign-out"></i></i>
                        <span>Pages</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.events')}}">
                        <i class="material-icons"><i class="fa fa-calendar"></i></i>
                        <span>Events</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.package')}}">
                        <i class="material-icons"><i class="fa fa-bell"></i></i>
                        <span>Package</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.slide')}}">
                        <i class="material-icons"><i class="fa fa-sign-out"></i></i>
                        <span>Slides</span>

                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                        <i class="material-icons">assignment</i>
                        <span>Gallery</span>
                    </a>
                    <ul class="ml-menu" style="display: none;">
                        <li>
                            <a href="{{route('admin.album')}}" class=" waves-effect waves-block">Album</a>
                        </li>
                        <li>
                            <a href="{{route('admin.gallery')}}" class=" waves-effect waves-block">Gallery</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{route('admin.offer')}}">
                        <i class="material-icons"><i class="fa fa-clock-o"></i></i>
                        <span>Offer</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.booking')}}">
                        <i class="material-icons"><i class="fa fa-expand"></i></i>
                        <span>Booking List</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.social')}}">
                        <i class="material-icons"><i class="fa fa-comment"></i></i>
                        <span>Social</span>

                    </a>
                </li>
                <li>
                    <a href="{{route('admin.map')}}" >
                        <i class="material-icons"><i class="fa fa-home"></i></i>
                        <span>Map</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:void(0);" class="menu-toggle waves-effect waves-block">
                        <i class="material-icons">assignment</i>
                        <span>Configuration</span>
                    </a>
                    <ul class="ml-menu" style="display: none;">
                        <li>
                            <a href="{{route('admin.configuration')}}" class=" waves-effect waves-block">Add Configuration</a>
                        </li>
                        <li>
                            <a href="{{route('admin.configuration.list')}}" class=" waves-effect waves-block">Configuration List</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="{{route('admin.blog')}}">
                        <i class="material-icons"><i class="fa fa-sign-out"></i></i>
                        <span>Blog</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.customer_feedback')}}">
                        <i class="material-icons"><i class="fa fa-comment-o"></i></i>
                        <span>Customer Feedback</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.customer_message')}}">
                        <i class="material-icons"><i class="fa fa-comment"></i></i>
                        <span>Customer Message</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.subscriber')}}">
                        <i class="material-icons"><i class="fa fa-male"></i></i>
                        <span>Subscriber</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.logout')}}">
                        <i class="material-icons"><i class="fa fa-sign-out"></i></i>
                        <span>SignOut</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
    {{--<div class="legal">
        <div class="copyright">
            &copy; 2018 - 2019. BY - <a target="_blank" href="http://3dvi.com">Women Tech</a>.
        </div>
    </div>--}}
    <!-- #Footer -->
    </aside>
</section>
