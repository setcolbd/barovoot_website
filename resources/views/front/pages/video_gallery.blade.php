@extends('front.layouts.master')
@section('style')

@endsection
@section('content')
  <div class="cp_navi_main_wrapper dm_cover">
    <div class="container">

      <!-- mobile menu area start -->
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

            <h1> our gallery</h1>
          </div>
          <div class="col-lg-12 col-md-12 col-12 col-sm-12">
            <div class="sub_title_section">
              <ul class="sub_title">
                <li> <a href="#"> Home  &nbsp; / &nbsp;</a> </li>
                <li>gallery</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="gallery_wrapper portfolio_grid dm_cover">
    <div class="container">
      <div class="row">
        <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12">
          <div class="dmx_heading_wraper">
            <img src="{{env('PUBLIC_PATH')}}/front_resources/images/head4.png " alt="img">
            <h2>{!!$config_head['gallerypagecontent']!!}</h2>
            <div class="bars bars2">
              <div class="bar"></div>
              <div class="bar"></div>
              <div class="bar"></div>
              <div class="bar"></div>
              <div class="bar"></div>
              <div class="bar"></div>
              <div class="bar"></div>
              <div class="bar"></div>
              <div class="bar"></div>
              <div class="bar"></div>
            </div>

            <p>{!!$config_data['gallerypagecontent']!!}</p>
          </div>
        </div>
        <div class="col-md-12 col-lg-12">
          <ul class="protfoli_filter">
            {{--            <li class="active" data-filter="*"><a href="#"> all</a></li>--}}
            <li data-filter=".dribbble"><a href="#">Videos</a></li>
            {{--            <li data-filter=".behance"><a href="#">videos</a></li>--}}

          </ul>
        </div>


        <div id="myModal" class="modal fade" role="dialog">
          <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content" style="width: 150%; margin-left: -90px;margin-top: 20%;     border: 4px solid #dc3545;">
              <div id="video_player_div">

              </div>
              <div class="modal-footer" style="background: #000">
                <button type="button" id="pause" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>
            </div>

          </div>
        </div>


        <div class="col-md-12 col-lg-12">
          <div class="row portfoli_inner pi_3">
            @foreach($gallery_video as $key => $value)
              <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="video_player_wrapper">
                    <img style="max-width: 100%;" src="https://img.youtube.com/vi/{{$value->value}}/maxresdefault.jpg" alt="img" class="img-responsive">

                    <ul>
                      <li>
                        <a class="test-popup-link button" data-toggle="modal" data-target="#myModal" onclick="ActivePlayer('{{$value->value}}', 'video_player_div')" rel='external'  title='title'><img src="{{env('PUBLIC_PATH')}}/front_resources/images/play.png" class="img-responsive" alt="img" ></a>
                      </li>
                    </ul>
                </div>
              </div>
            @endforeach

          </div>
        </div>
        {{--        <div class="col-md-12 col-sm-12">--}}
        {{--          <div class="hs_btn_wrapper gallery_btn dm_cover">--}}
        {{--            <ul>--}}

        {{--              <li> <a href="#"> load more</a></li>--}}
        {{--            </ul>--}}
        {{--          </div>--}}
        {{--        </div>--}}
      </div>
    </div>
  </div>
@endsection
@section('script')


@endsection