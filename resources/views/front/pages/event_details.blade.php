@extends('front.layouts.master')
@section('style')

@endsection
@section('content')
  <div class="cp_navi_main_wrapper dm_cover">
    <div class="container">

      <!-- mobile menu area start -->
      <header class="mobail_menu d-block d-sm-block d-md-block d-lg-none d-xl-none">

        <div class="row">
          <div class="col-md-6">
            <div class="cp_logo_wrapper">
              <a href="index.html">
                <img src="images/logo1.png" alt="logo">
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
    </div>
  </div>
  <!-- top header wrapper start -->
  <div class="page_title_section" style="    float: left;
      width: 100%;
      padding-top: 211px;
      padding-bottom: 76px;
      background: url({{env('PUBLIC_PATH')}}/{{$config_data['slider_background']}});
      position: relative;
      overflow: hidden;
      -webkit-background-size: cover;
      background-size: cover;
      background-position: 50% 50%;
      text-align: center;
      background-repeat: no-repeat;
      margin-top: -152px;">
    <div class="page_title_overlay"></div>
    <div class="page_header">
      <div class="container">
        <div class="row">

          <div class="col-lg-12 col-md-12 col-12 col-sm-12">

            <h1> our BLOG</h1>
          </div>
          <div class="col-lg-12 col-md-12 col-12 col-sm-12">
            <div class="sub_title_section">
              <ul class="sub_title">
                <li> <a href="#"> Home  &nbsp; / &nbsp;</a> </li>
                <li>Blog</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <div class="blog_categories_2 dm_cover">
    <div class="container">
      <div class="row">
        <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12 col-xs-12" id="Comment">
          <div class="blog_indx_box_wrapper blog_category_box blog_categories_content">
            <div class="blog_indx_img_wrapper">
              <img src="{{env('PUBLIC_PATH')}}/{{$data->image}}" alt="blog_img">

            </div>
            <div class="blog_indx_cont_wrapper">
              <p style="    margin-bottom: -15px;"><i class="far fa-calendar-alt"></i>{{$data->date}}</p>
              <p style="    margin-bottom: -15px;"><i class="fas fa-dollar-sign"></i>{!! $data->amount !!}</p>
              <p><i class="fas fa-map-marker-alt"></i>{!! $data->location !!}</p>
              <h5><a href="#">{{$data->title}}</a></h5>
              <p>{!! $data->description !!}</p>

            </div>

            <div class="blog_single_contnt dm_cover">
              <div class="tb_btm_link_right">
                <ul>
                  <li> <i class="fas fa-share-alt"></i> Share :</li>
                  @foreach($social as $value)
                    <li><a href="{{$value->link}}"><i class="fab {{$value->icon}}"></i></a></li>
                  @endforeach
                </ul>
              </div>
            </div>
          </div>

        </div>

        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12 right_sidebar">


          <div class="sidebar_widget dm_cover">
            <div class="widget_heading">
              <h2>latest post</h2>

            </div>

            @foreach($latest_blog as $key => $value)
              <div class="blog_wrapper22 dm_cover">
                <div class="blog_image">
                  <img style="width: 80%;" src="{{env('PUBLIC_PATH')}}/{{$value->image}}" class="img-responsive" alt="blog_img1" />
                </div>
                <div class="blog_text">
                  <h5><a href="blog/{{$value->blog_id}}">{{$value->title}}</a></h5>
                  <div class="blog_date">{{$value->date}}</div>
                </div>
              </div>
            @endforeach

          </div>


          <div class="sidebar_widget dm_cover">
            <div class="widget_heading">
              <h2>Photos</h2>
            </div>
            <ul class="instagram_images" style="display: inline-flex;">
              @foreach($gallery_image as $value)
                <li>
                  <div class="instagram_wrapper">
                    <div class="instagram_img_wrapper">
                      <img style="width: 100%" src="{{env('PUBLIC_PATH')}}/{{$value->value}}" class="img-responsive" alt="gallery_img">
                      <div class="instagram_img_overlay">
                        <div class="instagram_img_overlay_icon">
                          <i class="fa fa-search" aria-hidden="true"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </li>
              @endforeach
            </ul>
          </div>

        </div>

      </div>
    </div>
  </div>
@endsection
@section('script')
@endsection