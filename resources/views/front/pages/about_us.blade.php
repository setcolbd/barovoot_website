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

            <h1>About Us</h1>
          </div>
          <div class="col-lg-12 col-md-12 col-12 col-sm-12">
            <div class="sub_title_section">
              <ul class="sub_title">
                <li> <a href="#"> Home  &nbsp; / &nbsp;</a> </li>
                <li>About Us</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="dm_about_wrapper float_left" style="height: 600px;">
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-6 col-sm-12 col-12 about_responsive_padder">

          <div class="dm_heading_wrapper">

            <h2>about our club</h2>
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
            <p>{{$config_data['about']}}</p>
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
  <div class="offer_wrapper dm_cover" style="background-image: url({{env('PUBLIC_PATH')}}/{{$config_data['offer_background']}});">
    <div class="club_video_overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12">
          <div class="dmx_heading_wraper">
            <img src="{{env('PUBLIC_PATH')}}/front_resources/images/head9.png" alt="img">
            <h2>{{$config_data['offer_title']}}</h2>
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

            <p>{{$config_data['offer_description']}}</p>
          </div>
        </div>
        @foreach($offer as $key => $value)
        <div class="col-lg-6 col-md-12 col-sm-12">
          <div class="offer_content_wrapper dm_cover">
            <div class="offer_left_content_wrapper dm_cover">
              <div class="offer_set_img">
                <img src="{{env('PUBLIC_PATH')}}/{{$value->image  }}" alt="img" class="img-responsive">
              </div>
              <div class="offer_right_content_box">
                <h1><a href="#">{{$value->title}}</a></h1>
                <p>{{$value->description}}</p>
              </div>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
  <div class="feedback_wrapper dm_cover">
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
            <p>{{$config_data['customer_feedback']}}</p>

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
  <div class="night_club_wrapper portfolio_grid  dm_cover" style="background-image: url({{env('PUBLIC_PATH')}}/{{$config_data['video_background']}});">
    <div class="club_video_overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12">
          <div class="dmx_heading_wraper">
            <img src="{{env('PUBLIC_PATH')}}/front_resources/images/head10.png" alt="img">
            <h2>{{$config_head['gallery']}}</h2>
            <div class="bars bars2 bar5">
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

            <p>{{$config_data['gallery']}}</p>
          </div>
        </div>
      </div>
    </div>

    <div class="night_club_slider pi_3">
      <div class="owl-carousel owl-theme">
        @foreach($gallery_image as $key => $value)
          @if($value['type'] == 1)
          <div class="item">
            <div class="portfolio_item">
              <img src="{{env('PUBLIC_PATH')}}/{{$value['value']}}" alt="">
              <div class="portfolio_hover">

                <div class="zoom_popup">
                  <a class="img-link" href="{{env('PUBLIC_PATH')}}/{{$value['value']}}"> <i class="flaticon-add-button"></i>
                  </a>
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

  </div>
  <div class="booking_table_wrapper dm_cover">

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

            <p>{{$config_data['booking']}}</p>
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
              if (response.status == 200){
                _this.resetForm();
                Toster('success', 'Booking Submited');
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
          customer_name : '', description : '', image : '',
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