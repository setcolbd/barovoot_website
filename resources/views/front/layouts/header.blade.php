{{--<div class="jb_preloader">--}}
{{--    <div class="spinner_wrap">--}}
{{--        <div class="spinner"></div>--}}
{{--    </div>--}}
{{--</div>--}}
<!-- Top Scroll Start --><a href="javascript:" id="return-to-top"><i class="flaticon-up-arrow"></i></a>
<nav class="cd-dropdown  d-block d-sm-block d-md-block d-lg-none d-xl-none">
    <h2><a href="index.html"><img style="height: 46px;" src="{{env('PUBLIC_PATH')}}/{{$config_data['logo']}}" alt="img"></a></h2>
    <a href="#0" class="cd-close">Close</a>
    <ul class="cd-dropdown-content">
        @php
            $menu = collect($pages)->where('menu_position',1)->where('parent',null);
        @endphp
        @foreach($menu as $key => $value)
            @php
                $sub_menu = collect($pages)->where('parent',$value->pages_id);
            @endphp
            @if(count($sub_menu) > 0)
                <li class="has-children">
                    <a href="{{url($value->url)}}">{{$value->title}}</a>
                    <ul class="cd-secondary-dropdown icon_menu is-hidden">
                        @foreach($sub_menu as $sub_menu_value)
                            <li class="go-back">
                                <a href="{{url($sub_menu_value->url)}}">{{$sub_menu_value->title}} </a>
                            </li>
                         @endforeach
                    </ul>
                </li>
            @else
                <li><a href="{{url($value->url)}}">{{$value->title}}</a></li>
            @endif
        @endforeach
         @php
            $menu = collect($pages)->where('menu_position',2)->where('parent',null);
        @endphp
        @foreach($menu as $key => $value)
            @php
                $sub_menu = collect($pages)->where('parent',$value->pages_id);
            @endphp
            @if(count($sub_menu) > 0)
                <li class="has-children">
                    <a href="{{url($value->url)}}">{{$value->title}}</a>
                    <ul class="cd-secondary-dropdown icon_menu is-hidden">
                        @foreach($sub_menu as $sub_menu_value)
                            <li class="go-back">
                                <a href="{{url($sub_menu_value->url)}}">{{$sub_menu_value->title}} </a>
                            </li>
                         @endforeach
                    </ul>
                </li>
            @else
                <li><a href="{{url($value->url)}}">{{$value->title}}</a></li>
            @endif
        @endforeach
    </ul>
    <!-- .cd-dropdown-content -->
</nav>
<div class="topbar dm_cover">
    <div class="container">
        <div class="row">
            <div class="top_header_add">
                <ul>
                    <li class="d-none d-sm-none d-md-none d-lg-block d-xl-block"><a href="#">{{$config_data['any_question']}}</a></li>
                    <li><a href="#"><i class="flaticon-close-envelope"></i> {{$config_data['email']}} </a></li>
                    <li class="d-none d-sm-none d-md-block d-lg-block d-xl-block"><i class="flaticon-telephone"></i> {{$config_data['phone']}} </li>
                </ul>
            </div>

            <!-- Social Icon -->
            <div class="social_links_wrapper">

                <div class="social_links">
                    <ul>
                        @foreach($social as $data)
                            <li><a href="{{$data->link}}"><i class="fab {{$data->icon}}"></i></a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="top_header_login">

                    <a href="{{url('/admin')}}"> <i class="flaticon-login"></i>Login </a>/ Register

                </div>
            </div>
        </div>
    </div>
</div>
<div class="cp_navi_main_wrapper dm_cover">
    <div class="container">
        <header class="mobail_menu d-block d-sm-block d-md-block d-lg-none d-xl-none">
            <div class="row">
                <div class="col-md-6">
                    <div class="cp_logo_wrapper">
                        <a href="index.html">
                            <img style="height: 46px;" src="{{env('PUBLIC_PATH')}}/{{$config_data['logo']}}" alt="logo">
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="cd-dropdown-wrapper">
                        <a class="house_toggle" href="#0">
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 31.177 31.177" style="enable-background:new 0 0 31.177 31.177;" xml:space="preserve" width="25px" height="25px">
                                    <g>
                                        <g>
                                            <path class="menubar" d="M30.23,1.775H0.946c-0.489,0-0.887-0.398-0.887-0.888S0.457,0,0.946,0H30.23    c0.49,0,0.888,0.398,0.888,0.888S30.72,1.775,30.23,1.775z" fill="#004165" />
                                        </g>
                                        <g>
                                            <path class="menubar" d="M30.23,9.126H12.069c-0.49,0-0.888-0.398-0.888-0.888c0-0.49,0.398-0.888,0.888-0.888H30.23    c0.49,0,0.888,0.397,0.888,0.888C31.118,8.729,30.72,9.126,30.23,9.126z" fill="#004165" />
                                        </g>
                                        <g>
                                            <path class="menubar" d="M30.23,16.477H0.946c-0.489,0-0.887-0.398-0.887-0.888c0-0.49,0.398-0.888,0.887-0.888H30.23    c0.49,0,0.888,0.397,0.888,0.888C31.118,16.079,30.72,16.477,30.23,16.477z" fill="#004165" />
                                        </g>
                                        <g>
                                            <path class="menubar" d="M30.23,23.826H12.069c-0.49,0-0.888-0.396-0.888-0.887c0-0.49,0.398-0.888,0.888-0.888H30.23    c0.49,0,0.888,0.397,0.888,0.888C31.118,23.43,30.72,23.826,30.23,23.826z" fill="#004165" />
                                        </g>
                                        <g>
                                            <path class="menubar" d="M30.23,31.177H0.946c-0.489,0-0.887-0.396-0.887-0.887c0-0.49,0.398-0.888,0.887-0.888H30.23    c0.49,0,0.888,0.398,0.888,0.888C31.118,30.78,30.72,31.177,30.23,31.177z" fill="#004165" />
                                        </g>
                                    </g>
                                </svg>
                        </a>
                        <!-- .cd-dropdown -->

                    </div>
                </div>
            </div>
        </header>
        <div class="jb_navigation_wrapper">
            <div class="mainmenu d-xl-block d-lg-block d-md-none d-sm-none d-none">
                <ul class="main_nav_ul">


                    @php
                        $menu = collect($pages)->where('menu_position',1)->where('parent',null);

                    @endphp
                    @foreach($menu as $key => $value)
                    <li class="has-mega gc_main_navigation"><a href="{{url($value->url)}}" class="gc_main_navigation ">{{$value->title}}</a>
                        @if($value->is_menu == 0)
                        @php
                            $sub_menu = collect($pages)->where('parent',$value->pages_id);
                        @endphp
                        @if(count($sub_menu) > 0)
                        <ul class="navi_2_dropdown">
                            @foreach($sub_menu as $sub_menu_value)
                            <li class="parent">
                                <a href="{{url($sub_menu_value->url)}}"><i class="fas fa-square"></i> {{$sub_menu_value->title}} </a>
                            </li>
                            @endforeach
                        </ul>
                        @endif
                        @endif
                    </li>
                    @endforeach


                    <li class="logo_desing_wrapper">
                        <a href="#"><img style="width: 100%;" src="{{env('PUBLIC_PATH')}}/{{$config_data['logo']}}" alt="img"></a>
                    </li>


                    @php
                        $menu = collect($pages)->where('menu_position',2)->where('parent',null);
                    @endphp
                    @foreach($menu as $key => $value)
                        <li class="has-mega gc_main_navigation"><a href="{{url($value->url)}}" class="gc_main_navigation @if($key == 0) active_class @endif">{{$value->title}}</a>
                            @if($value->is_menu == 1)
                                @php
                                    $sub_menu = collect($pages)->where('parent',$value->pages_id);
                                @endphp
                                @if(count($sub_menu) > 0)
                                <ul class="navi_2_dropdown">
                                    @foreach($sub_menu as $sub_menu_value)
                                        <li class="parent">
                                            <a href="{{$sub_menu_value->url}}"><i class="fas fa-square"></i> {{$sub_menu_value->title}} </a>
                                        </li>
                                    @endforeach
                                </ul>
                                @endif
                            @endif
                        </li>
                    @endforeach

                </ul>
            </div>

        </div>
    </div>
</div>