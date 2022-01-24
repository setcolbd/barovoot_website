@extends('front.layouts.master')
@section('style')

@endsection
@section('content')
    <div class="slider-area dm_cover" style="background: url({{env('PUBLIC_PATH')}}/{{$config_data['slider_background']}}) 50% 0 repeat-y; min-height: 950px;
        background-position: center;
        background-size: cover;
        background-repeat: no-repeat;
        position: relative;
        margin-top: -152px;">
        <div class="main_slider_overly"></div>
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="false">
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <div class="carousel-captions caption-1">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1  col-md-12 col-sm-12 col-12">
                                    <div class="content">
                                        <h2 data-animation="animated zoomInDown">{{$slider[0]->title}}</h2>
                                        <div data-animation="animated fadeIn" class="slider_border"></div>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @foreach($slider as $key => $value)
                    @if($key != 0)
                <div class="carousel-item">
                    <div class=" carousel-captions caption-2">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-10 offset-xl-1 col-lg-10 offset-lg-1  col-md-12 col-sm-12 col-12">
                                    <div class="content">
                                        <h2 data-animation="animated zoomInDown">{{$value->title}}</h2>
                                        <div data-animation="animated" class="slider_border"></div>
                                        <div class="clear"></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @endforeach
                <ol class="carousel-indicators">
                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"><span class="number"></span></li>
                    <li data-target="#carousel-example-generic" data-slide-to="1" class=""><span class="number"></span></li>
                    <li data-target="#carousel-example-generic" data-slide-to="2" class=""><span class="number"></span></li>
                </ol>
                <div class="carousel-nevigation">
                    <a class="prev" href="#carousel-example-generic" role="button" data-slide="prev">
                        <i class="flaticon-long-arrow-pointing-to-left"></i>
                        <span>PR<br>EV</span>
                    </a>
                    <a class="next" href="#carousel-example-generic" role="button" data-slide="next">
                        <span>NE<br>XT</span>
                        <i class="flaticon-arrow"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="category_wrapper dm_cover">
        <div class="muzieknootjes">
            <div class="noot-1">
                &#9835; &#9833;
            </div>
            <div class="noot-2">
                &#9833;
            </div>
            <div class="noot-3">
                &#9839; &#9834;
            </div>
            <div class="noot-4">
                &#9834;
            </div>
            <div class="noot-5">
                &#9835;
            </div>
        </div>
        <div class="container">
            <div class="row">
                @foreach($event as $key => $value)
                <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                    <div class="category_content_wrapper">
                        <div class="category_wrapper_overlay">
                            <h3 class="party_prcie">$ {{$value->amount}} </h3>
                            <figure>
                                <img src="{{env('PUBLIC_PATH')}}/{{$value->image}}" alt="img">
                            </figure>
                            <div class="category_btm_wrap">
                                <p> {{$value->date}} </p>
                                <h4><a href="{{url('event_details/'.$value->events_id)}}">{{$value->title}}</a></h4>
                                <p>{{$value->location}}</p>

                            </div>
                            <div class="category_hover_box">
                                <ul>
                                    @foreach($social as $data)
                                    <li><a href="{{$data->link}}"><i class="fab {{$data->icon}}"></i></a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                    @if($key == 2)
                        @break
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <div class="dm_about_wrapper float_left" style="height: 600px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-6 col-sm-12 col-12 about_responsive_padder">

                    <div class="dm_heading_wrapper">

                        <h2>about barovoot limited</h2>
                        <div class="bars">
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

                    </div>
                    <div class="dm_about_text_wrapper dm_cover">
                        <p>{!! $config_data['about'] !!}}</p>

                      <div class="hs_btn_wrapper dm_cover">
                        <ul>

                          <li> <a href="{{url('/about_us')}}">read more</a></li>
                        </ul>
                      </div>
                    </div>

                </div>

                <div class="col-md-12 col-lg-6 col-sm-12">
                    <div class="abt_right_img_wrapper">
                        <img style="width: 90%; float: right;" src="{{env('PUBLIC_PATH')}}/{{$config_data['about_image_background']}}" alt="About" class="img-responsive">
                        <div class="sw_disc_img_btm">
                          <img src="{{env('PUBLIC_PATH')}}/{{$config_data['about_image']}}" alt="About" class="img-responsive">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="club_video_wrapper dm_cover" style="background-image: url({{env('PUBLIC_PATH')}}/{{$config_data['video_background']}});">
        <div class="club_video_overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12">
                    <div class="dmx_heading_wraper">
                        <img src="{{env('PUBLIC_PATH')}}/front_resources/images/head1.png" alt="img">
                        <h2>{!!$config_head['video']!!}</h2>
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

                        <p>{!!$config_data['video']!!}</p>
                    </div>
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

                <div class="col-lg-8 col-md-12 col-sm-12">
                    <div class="video_player_wrapper">
                        @if(isset($gallery_video[0]))
                        <img style="max-width: 100%; border-radius: 15px;" src="https://img.youtube.com/vi/{{$gallery_video[0]['value']}}/maxresdefault.jpg" alt="img" class="img-responsive">

                        <ul>
                            <li>
                                <a class="test-popup-link button" data-toggle="modal" data-target="#myModal" onclick="ActivePlayer('{{$gallery_video[0]['value']}}', 'video_player_div')" rel='external'  title='title'><img src="{{env('PUBLIC_PATH')}}/front_resources/images/play.png" class="img-responsive" alt="img" ></a>
                            </li>
                        </ul>
                        @endif
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="row">
                        <div class="col-lg-12 col-md-6">
                            <div class="video_player_wrapper video_margin_wrapper">
                                @if(isset($gallery_video[1]))
                                <img style="max-width: 100%; border-radius: 15px;" src="https://img.youtube.com/vi/{{$gallery_video[1]['value']}}/maxresdefault.jpg" alt="img" class="img-responsive">
                                <ul>
                                    <li>
                                        <a class="test-popup-link button" data-toggle="modal" data-target="#myModal" onclick="ActivePlayer('{{$gallery_video[2]['value']}}', 'video_player_div')" rel='external' title='title'><img src="{{env('PUBLIC_PATH')}}/front_resources/images/play.png" class="img-responsive" alt="img"></a>
                                    </li>
                                </ul>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-12 col-md-6 col-sm-12">
                            <div class="video_player_wrapper">
                                @if(isset($gallery_video[2]))
                                <img style="max-width: 100%; border-radius: 15px;" src="https://img.youtube.com/vi/{{$gallery_video[2]['value']}}/maxresdefault.jpg" alt="img" class="img-responsive">
                                <ul>
                                    <li>
                                        <a class="test-popup-link button" data-toggle="modal" data-target="#myModal" onclick="ActivePlayer('{{$gallery_video[2]['value']}}', 'video_player_div')" rel='external' title='title'><img src="{{env('PUBLIC_PATH')}}/front_resources/images/play.png" class="img-responsive" alt="img"></a>
                                    </li>
                                </ul>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="audi_track_wrapper dm_cover">

        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12">
                    <div class="dmx_heading_wraper">
                        <img src="{{env('PUBLIC_PATH')}}/front_resources/images/head2.png" alt="img">
                        <h2>{!!$config_head['audio']!!}</h2>
                        <div class="bars bars2 bar_track">
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

                        <p>{!!$config_data['audio']!!}</p>
                    </div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <div class="column add-bottom">
                        <div id="mainwrap">
                            <div id="nowPlay">
                                <span id="npAction">Paused...</span><span id="npTitle"></span>
                            </div>
                            <div id="audiowrap">
                                <div id="audio0">
                                    <audio id="audio1" preload controls>Your browser does not support HTML5 Audio! 😢</audio>
                                </div>
                                <div id="tracks">
                                    <a id="btnPrev">&larr;</a><a id="btnNext">&rarr;</a>
                                </div>
                            </div>
                            <div id="plwrap">
                                <ul id="plList"></ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="upcoming_wrapper dm_cover displaynone" style="background-image: url({{env('PUBLIC_PATH')}}/{{$config_data['event_background']}});">
        <div class="club_video_overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12">
                    <div class="dmx_heading_wraper">
                        <img src="{{env('PUBLIC_PATH')}}/front_resources/images/head3.png" alt="img">
                        <h2>{!!$config_head['event']!!}</h2>
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

                        <p>{!!$config_data['event']!!}</p>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="upcoming_event_slider">
                        <div class="owl-carousel owl-theme">
                            @foreach($event as $key => $value)
                            @if($key > 2)

                            <div class="item">
                                <div class="category_content_wrapper upcoming_event_content_box">
                                    <div class="category_wrapper_overlay">
                                        <h3 class="party_prcie"> $ {{$value->amount}} </h3>
                                        <figure>
                                            <img src="{{env('PUBLIC_PATH')}}/{{$value->image}}" alt="img">
                                        </figure>
                                        <div class="category_btm_wrap">
                                            <p> {{$value->date}} </p>
                                            <h4><a href="{{url('event_details/'.$value->events_id)}}">{{$value->title}}</a></h4>
                                            <p>{{$value->location}}</p>

                                        </div>
                                        <div class="category_hover_box">
                                            <ul>
                                                @foreach($social as $data)
                                                    <li><a href="{{$data->link}}"><i class="fab {{$data->icon}}"></i></a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                            </div>
                                @if($key == 9)
                                    @break
                                @endif
                            @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="hs_btn_wrapper event_btn dm_cover">
                        <ul>

                            <li> <a href="{{url('events')}}"> more events</a></li>
                        </ul>
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
                        <img src="{{env('PUBLIC_PATH')}}/front_resources/images/head4.png" alt="img">
                        <h2>{{$config_head['gallery']}}</h2>
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

                        <p>{!!$config_data['audio']!!}</p>
                    </div>
                </div>
            </div>
        </div>
        <ul class="protfoli_filter">
            <li class="active" data-filter="*"><a href="#"> all</a></li>
            <li data-filter=".dribbble"><a href="#">images</a></li>
            <li data-filter=".behance"><a href="#">videos</a></li>
        </ul>
        <div class="row portfoli_inner pi_3">

            @foreach($gallery_image as $key => $value)
            <!-- Items -->
            @if($value['type'] == 1)
            <div class="p-0 portfolio_boxes_width dribbble #">
                <div class="portfolio_item">
                    <img style="height: 245px;" src="{{env('PUBLIC_PATH')}}/{{$value['value']}}" alt="">
                    <div class="portfolio_hover">

                        <div class="zoom_popup">
                            <a class="img-link" href="{{env('PUBLIC_PATH')}}/{{$value['value']}}"> <i class="flaticon-add-button"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            @elseif($value['type'] == 2)
                <div class="p-0 portfolio_boxes_width behance #">
                  <div class="portfolio_item">
                    <img style="height: 245px;" src="https://img.youtube.com/vi/{{$value['value']}}/maxresdefault.jpg" alt="">
                    <div class="portfolio_hover">

                      <div class="zoom_popup">

                        <a class="test-popup-link button" data-toggle="modal" data-target="#myModal" onclick="ActivePlayer('{{$value['value']}}', 'video_player_div')" rel='external'  title='title'><img src="{{env('PUBLIC_PATH')}}/front_resources/images/play.png" class="img-responsive" alt="img" ></a>

                      </div>
                    </div>
                  </div>
                </div>

            @endif
            @if($key == 9)
              @break
            @endif
            @endforeach

        </div>
    </div>
    <div class="feedback_wrapper dm_cover" style="background-image: url({{env('PUBLIC_PATH')}}/{{$config_data['feedback_background']}});">
        <div class="club_video_overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12">
                    <div class="dmx_heading_wraper">
                        <img src="{{env('PUBLIC_PATH')}}/front_resources/images/head5.png" alt="img">
                        <h2>{{$config_head['customer_feedback']}}</h2>
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
                        <p>{!!$config_data['customer_feedback']!!}</p>

                    </div>
                </div>
                <div class="col-lg-9 offset-lg-1 col-md-12 col-sm-12">
                    <div class="tc_twtfd_wrapper dm_cover">


                        <div class="owl-carousel">
                            @foreach($customer_feedback as $value)
                            <div class="owl-item">
                                <div class="feedback_content_wraper dm_cover">
                                    <div class="news_main_img_wrapper">

                                        <img src="{{env('PUBLIC_PATH')}}/{{$value->image}}" alt="img">
                                    </div>

                                    <div class="news_btm_cntnt">
                                        <i class="flaticon-quote-left"></i>
                                        <p>{{$value->description}}</p>
                                        <div class="news_avatar_wraper"><a href="#">{{$value->customer_name}}</a>
{{--                                          <span>(Club Member)</span>--}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>

                  <div class="hs_btn_wrapper event_btn dm_cover">
                    <ul>
                      <li> <a href="#" data-toggle="modal" data-target="#feedbackModal">Create FeedBack</a></li>
                    </ul>
                  </div>
                </div>
              <!-- Modal -->
              <div id="feedbackModal" class="modal fade" role="dialog" >
                <div class="modal-dialog">

                  <form @submit.prevent="AddCustomerFeedback($event)">
                  <!-- Modal content-->
                  <div class="modal-content" style="background: #000; border: 3px solid #ef5e5e;">
{{--                    <div class="modal-header">--}}
{{--                      <button type="button" class="close" data-dismiss="modal">&times;</button>--}}
{{--                      <h4 class="modal-title">Modal Header</h4>--}}
{{--                    </div>--}}
                    <div class="modal-body">
                      <div class="col-lg-12 col-md-12">
                        <div class="form-pos form_field">
                          <div class="form-group i-name">
                            <input type="text" class="form-control require" name="customer_name" v-model="FeedbackData.customer_name" placeholder="Your Name*">
                          </div>
                          <span class="text-danger" v-text="errors.get('customer_name')"></span>
                        </div>
                      </div>
                      <div class="col-lg-12 col-md-12">
                        <div class="form-pos form_field">
                          <div class="form-group i-name">
                            <input type="email" class="form-control require" name="email" v-model="FeedbackData.email" placeholder="Your Email*">
                          </div>
                          <span class="text-danger" v-text="errors.get('customer_name')"></span>
                        </div>
                      </div>
                      <div class="col-lg-12 col-md-12">
                        <div class="form-pos form_field">
                          <div class="form-group i-name">
                            <textarea type="text" class="form-control require" name="description" v-model="FeedbackData.description" placeholder="Write Something about us...*"></textarea>

                          </div>
                          <span class="text-danger" v-text="errors.get('description')"></span>
                        </div>
                      </div>
                      <div class="col-lg-12 col-md-12">
                        <div class="form-pos form_field">
                          <div class="form-group i-name">
                              <input type="file" class="form-control require" name="image" @change="ImageGet($event)">
                          </div>
                          <span class="text-danger" v-text="errors.get('image')"></span>
                        </div>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-success" style="float: right;">Submit</button>
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                  </form>

                </div>
              </div>
            </div>
        </div>
    </div>
    <div class="partner_item_wrapper dm_cover">

        <div class="container">
            <div class="row">

                <div class="col-md-12">
                    <div class="partner_item_slider">
                        <div class="owl-carousel owl-theme">
                            @foreach($package as $value)
                            <div class="item">
                                <div class="partner_wrapper_content">
                                    <i class="fab {{$value->image}}"></i>
                                    <p><a href="#">{{$value->name}}</a></p>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="blog_wrapper dm_cover" style="background-image: url({{env('PUBLIC_PATH')}}/{{$config_data['blog_background']}});">
        <div class="club_video_overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12">
                    <div class="dmx_heading_wraper">
                        <img src="{{env('PUBLIC_PATH')}}/front_resources/images/head6.png" alt="img">
                        <h2>{{$config_head['blog']}}</h2>
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

                        <p>{!!$config_data['audio']!!}</p>
                    </div>
                </div>
                <div class="blog_slider_wrapper">
                    <div class="owl-carousel owl-theme">
                        @foreach($blog as $value)
                        <div class="item">
                            <div class="blog_indx_box_wrapper">
                                <div class="blog_indx_img_wrapper">
                                    <img style="height: 325px;" src="{{env('PUBLIC_PATH')}}/{{$value->image}}" alt="blog_img">

                                </div>
                                <div class="blog_indx_cont_wrapper">
                                    <p><i class="far fa-calendar-alt"></i> {{$value->date}} </p>
                                    <h5><a href="#">{{$value->title}}</a></h5>
                                    <p>{!! str_limit($value->description, 150) !!}</p>

                                </div>
                                <div class="blog_indx_cont_bottom">
                                    <div class="blog_indx_cont_bottom_left">
                                        <p><i class="fa fa-user"></i> &nbsp;<a href="#">{{$value->author_name}}</a></p>
                                    </div>
                                    <div class="blog_indx_cont_bottom_right">
{{--                                        <p><i class="fas fa-comment-alt"></i>&nbsp;<a href="#">04 Comm.</a></p>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                            @if($key == 4)
                                @break
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="booking_table_wrapper dm_cover displaynone">

        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12">
                    <div class="dmx_heading_wraper">
                        <img src="{{env('PUBLIC_PATH')}}/front_resources/images/head7.png" alt="img">
                        <h2>{{$config_head['booking']}}</h2>
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

                        <p>{!!$config_data['booking']!!}</p>
                    </div>
                </div>
                <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12 col-12" id="Booking">
                    <div class="booking_form_field">
                        <form  @submit.prevent="AddBooking($event)">
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="form-pos form_field">
                                        <div class="form-group i-name">
                                            <input type="text" class="form-control require" name="first_name" v-model="FormData.name" placeholder="Your Name*">
                                            <i class="fas fa-user"></i>
                                        </div>
                                      <span class="text-danger" v-text="errors.get('name')"></span>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6">
                                    <div class="form-e form_field">
                                        <div class="form-group i-email">
                                            <label class="sr-only">Email </label>
                                            <input type="email" class="form-control require" name="email" v-model="FormData.email" placeholder="You Email *" data-valid="email" data-error="Email should be valid.">
                                            <i class="fas fa-envelope"></i>
                                        </div>
                                      <span class="text-danger" v-text="errors.get('email')"></span>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-6">
                                    <div class="form-s form_field">
                                        <div class="form-group i-subject">

                                            <input type="date" v-model="FormData.date" class="form-control" name="date" placeholder="date">
                                            <i class="far fa-calendar"></i>
                                        </div>
                                        <span class="text-danger" v-text="errors.get('date')"></span>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-6">
                                    <div class="form-s form_field">
                                        <div class="form-group i-subject">

                                            <input type="time" v-model="FormData.time" class="form-control" name="time" placeholder="time">
                                            <i class="far fa-clock"></i>
                                        </div>
                                      <span class="text-danger" v-text="errors.get('time')"></span>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-m form_field">
                                        <div class="form-group i-name">

                                            <input type="text" class="form-control" name="contact_no" v-model="FormData.number_of_people" placeholder="Number Of People">
                                            <i class="fas fa-user-edit"></i>
                                        </div>
                                      <span class="text-danger" v-text="errors.get('number_of_people')"></span>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="tb_es_btn_div">
                                        <div class="response"></div>
                                        <div class="tb_es_btn_wrapper">
                                            <button type="submit">book now</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="map_wrapper">
        <div id="map"></div>
    </div>
    <div class="news_letter_wrapper dm_cover displaynone" id="subscriber">
        <div class="club_video_overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12">
                    <div class="dmx_heading_wraper">
                        <img src="{{env('PUBLIC_PATH')}}/front_resources/images/head8.png" alt="img">
                        <h2>Get Weekly Newsletters</h2>
                        <div class="bars bars2 bar_track2">
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

                    </div>
                </div>
                <div class="col-md-12 col-lg-12">
                    <div class="domex_news_field">
                        <h3 id="success_subscribe"></h3>
                        <form @submit.prevent="AddSubscriber">
                            <div class="domex_newsletter_field">
                                <input type="text" v-model="FormData.email" placeholder="Enter Your Email">
                                <button type="submit">subscribe</button>
                            </div>
                        </form>
                        <span class="text-danger" v-text="errors.get('email')"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
  <script>
    new Vue({
      el: '#Booking',
      data: {
        FormData : {
          name : '', email : '', date : '', time : '', number_of_people : '',
        },
        errors : new Errors(),
      },
      methods: {
        AddBooking: function () {
          const _this = this;
          const URL = 'admin/booking/add';
          $.ajax({
            url: URL,
            type: "post",
            data : {
              data : _this.FormData,
              _token: "{{ csrf_token() }}",
            },
            success: function (response) {
              console.log(response);
              if (parseInt(response.status) === 200){
                _this.resetForm();

              }
              else {
                _this.errors.record(response.error);
              }
            },
          });
        },
        resetForm() {
          var _this = this
          var form = _this.FormData;
          Object.keys(form).forEach(function (key, index) {
            form[key] = '';
          });
        },
      },
    });

    new Vue({
      el: '#feedbackModal',
      data: {
        FeedbackData : {
          customer_name : '', email : '', description : '', image : '',
        },
        errors : new Errors(),
      },
      methods: {
        AddCustomerFeedback: function () {
          const _this = this;
          const URL = 'admin/customer_feedback/add';
          $.ajax({
            url: URL,
            type: "post",
            data : {
              data : _this.FeedbackData,
              _token: "{{ csrf_token() }}",
            },
            success: function (response) {
              if (response.status == 200){
                _this.resetForm();
                $('#feedbackModal').modal('hide');
                Toster('success', 'FeedBack Submited');
              }
              else {
                _this.errors.record(response.error);
              }
            },
          });
        },
        ImageGet:function(event)
        {
          let file=event.target.files[0];
          let reader=new FileReader();
          reader.onload=event =>{
            this.FeedbackData.image = event.target.result;
          }
          reader.readAsDataURL(file)
        },
        resetForm() {
          var _this = this
          var form = _this.FeedbackData;
          Object.keys(form).forEach(function (key, index) {
            form[key] = '';
          });
        },
      },
    });

  </script>

@endsection
