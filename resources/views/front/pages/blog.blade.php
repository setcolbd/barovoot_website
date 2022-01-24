@extends('front.layouts.master')
@section('style')

@endsection
@section('content')
  <div class="cp_navi_main_wrapper dm_cover">
    <div class="container">
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
  <div class="blog_category_wrapper dm_cover">

    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-12">

          <div class="blog_category_select dm_cover">
{{--            <div class="blog_category_shorting">--}}
{{--              <ul>--}}
{{--                <li>--}}
{{--                  <select>--}}
{{--                    <option>latest post</option>--}}
{{--                    <option>blog post 1</option>--}}
{{--                    <option>blog post 2</option>--}}
{{--                    <option>blog post 3</option>--}}
{{--                  </select>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                  <select>--}}
{{--                    <option>category</option>--}}
{{--                    <option>news</option>--}}
{{--                    <option>news</option>--}}
{{--                    <option>news</option>--}}
{{--                  </select>--}}
{{--                </li>--}}
{{--              </ul>--}}

{{--            </div>--}}
            <div class="showpro">
              @php
                $total = $blog_data->total();
                $to = $blog_data->currentPage() * 10;
                $from = $to -9;
              @endphp
              <p>Showing <span>{{$from.'-'.$to}}</span> of {{$total}} Results</p>
            </div>
          </div>
        </div>
        @foreach($blog as $value)
        <div class="col-lg-4 col-md-12 col-sm-12">
          <div class="blog_indx_box_wrapper blog_category_box">
            <div class="blog_indx_img_wrapper">
              <img style="height: 325px;" src="{{env('PUBLIC_PATH')}}/{{$value->image}}" alt="blog_img">

            </div>
            <div class="blog_indx_cont_wrapper">
              <p><i class="far fa-calendar-alt"></i> {{$value->date}} </p>
              <h5><a href="blog/{{$value->blog_id}}">{{$value->title}}</a></h5>
              <p>{!! str_limit($value->description, 150) !!}</p>

            </div>
            <div class="blog_indx_cont_bottom">
              <div class="blog_indx_cont_bottom_left">
                <p><i class="fa fa-user"></i> &nbsp;<a href="#">john due</a></p>
              </div>
              <div class="blog_indx_cont_bottom_right">
                <p><i class="fas fa-comment-alt"></i>&nbsp;<a href="#">04 Comm.</a></p>
              </div>
            </div>
          </div>
        </div>
        @endforeach
        <div class="col-lg-12 col-md-12">
          <div class="blog_pagination_section dm_cover">
            {{ $blog_data->onEachSide(3)->links() }}
          </div>
        </div>

      </div>
    </div>
  </div>
@endsection
@section('script')
{{--  <script>--}}
{{--    new Vue({--}}
{{--      el: '#Booking',--}}
{{--      data: {--}}
{{--        FormData : {--}}
{{--          name : '', email : '', date : '', time : '', number_of_people : '',--}}
{{--        },--}}
{{--        errors : new Errors(),--}}
{{--      },--}}
{{--      methods: {--}}
{{--        AddBooking: function () {--}}
{{--          const _this = this;--}}
{{--          const URL = 'admin/booking/add';--}}
{{--          $.ajax({--}}
{{--            url: URL,--}}
{{--            type: "post",--}}
{{--            data : {--}}
{{--              data : _this.FormData,--}}
{{--              _token: "{{ csrf_token() }}",--}}
{{--            },--}}
{{--            success: function (response) {--}}
{{--              console.log(response);--}}
{{--              if (response.status == 200){--}}
{{--                _this.resetForm();--}}
{{--                Toster('success', 'Booking Submited');--}}
{{--              }--}}
{{--              else {--}}
{{--                _this.errors.record(response.error);--}}
{{--              }--}}
{{--            },--}}
{{--          });--}}
{{--        },--}}
{{--        resetForm() {--}}
{{--          var _this = this--}}
{{--          var form = _this.FormData;--}}
{{--          Object.keys(form).forEach(function (key, index) {--}}
{{--            form[key] = '';--}}
{{--          });--}}
{{--        },--}}
{{--      },--}}
{{--    });--}}

{{--    new Vue({--}}
{{--      el: '#feedbackModal',--}}
{{--      data: {--}}
{{--        FeedbackData : {--}}
{{--          customer_name : '', description : '', image : '',--}}
{{--        },--}}
{{--        errors : new Errors(),--}}
{{--      },--}}
{{--      methods: {--}}
{{--        AddCustomerFeedback: function () {--}}
{{--          const _this = this;--}}
{{--          const URL = 'admin/customer_feedback/add';--}}
{{--          $.ajax({--}}
{{--            url: URL,--}}
{{--            type: "post",--}}
{{--            data : {--}}
{{--              data : _this.FeedbackData,--}}
{{--              _token: "{{ csrf_token() }}",--}}
{{--            },--}}
{{--            success: function (response) {--}}
{{--              if (response.status == 200){--}}
{{--                _this.resetForm();--}}
{{--                $('#feedbackModal').modal('hide');--}}
{{--                Toster('success', 'FeedBack Submited');--}}
{{--              }--}}
{{--              else {--}}
{{--                _this.errors.record(response.error);--}}
{{--              }--}}
{{--            },--}}
{{--          });--}}
{{--        },--}}
{{--        ImageGet:function(event)--}}
{{--        {--}}
{{--          let file=event.target.files[0];--}}
{{--          let reader=new FileReader();--}}
{{--          reader.onload=event =>{--}}
{{--            this.FeedbackData.image = event.target.result;--}}
{{--          }--}}
{{--          reader.readAsDataURL(file)--}}
{{--        },--}}
{{--        resetForm() {--}}
{{--          var _this = this--}}
{{--          var form = _this.FeedbackData;--}}
{{--          Object.keys(form).forEach(function (key, index) {--}}
{{--            form[key] = '';--}}
{{--          });--}}
{{--        },--}}
{{--      },--}}
{{--    });--}}
{{--  </script>--}}

@endsection