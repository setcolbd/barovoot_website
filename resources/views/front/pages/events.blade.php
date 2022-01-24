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

            <h1> our events</h1>
          </div>
          <div class="col-lg-12 col-md-12 col-12 col-sm-12">
            <div class="sub_title_section">
              <ul class="sub_title">
                <li> <a href="#"> Home  &nbsp; / &nbsp;</a> </li>
                <li>events</li>
              </ul>
            </div>
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
            <h2>{{$config_head['event']}}</h2>
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

            <p>{{$config_data['event']}}</p>
          </div>
        </div>
        @foreach($event as $key => $value)
        <div class="col-lg-3 col-md-4 col-sm-12">
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
        </div>
        @endforeach
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