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
            <li data-filter=".dribbble"><a href="#">images</a></li>
{{--            <li data-filter=".behance"><a href="#">videos</a></li>--}}

          </ul>
        </div>
        <div class="col-md-12 col-lg-12">
          <div class="row portfoli_inner pi_3">
{{--          @php dd($gallery_image) @endphp--}}
          @if(isset($gallery_image) && count($gallery_image) >0 )
          @foreach($gallery_image as $key => $value1)
            <!-- Items -->
              <div class="p-0 portfolio_boxes_width dribbble #">
                <div class="portfolio_item">
                  <img src="{{env('PUBLIC_PATH')}}/{{isset($value1['value'])? $value1['value'] : ''}}" alt="">
                  <div class="portfolio_hover">

                    <div class="zoom_popup">
                      <a class="img-link" href="{{env('PUBLIC_PATH')}}/{{isset($value1['value'])? $value1['value'] : ''}}"> <i
                                class="flaticon-add-button"></i>
                      </a>
                    </div>
                  </div>
                </div>
              </div>
            @endforeach
              @endif

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