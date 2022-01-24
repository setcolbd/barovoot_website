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
              <img src="{{env('PUBLIC_PATH')}}/{{$blog_data->image}}" alt="blog_img">

            </div>
            <div class="blog_indx_cont_wrapper">
              <p><i class="far fa-calendar-alt"></i>{{$blog_data->date}}</p>
              <h5><a href="#">{{$blog_data->title}}</a></h5>
              <p>{!! $blog_data->description !!}</p>

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

            <div class="blog_indx_cont_bottom">
              <div class="blog_indx_cont_bottom_left">
                <p><i class="fa fa-user"></i> &nbsp;<a href="#">{{$blog_data->author_name}}</a></p>
              </div>
              <div class="blog_indx_cont_bottom_right">
                <p><i class="fas fa-comment-alt"></i>&nbsp;<a href="#"><span v-text="Comments.length"></span> Comm.</a></p>
              </div>
            </div>
          </div>

          <div class="comments_wrapper dm_cover">
            <div class="dm_heading_wrapper">

              <h2 v-text="'comments ('+Comments.length+')'"></h2>
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
            <div class="row" v-for="data_value in Comments">

              <div class="col-lg-12 col-md-12 col-12 col-sm-12">
                <div class="comments_Box">
                  <div class="text_wrapper">
                    <div class="author_detail">
                      <span class="author_name"> <span v-text="data_value.name"></span> <i class="fa fa-circle"></i> </span>
                      <span class="publish_date"> <span v-text="data_value.created_at"></span> <a href="#"></a> </span>
                    </div>
                    <div class="author_content">
                      <p v-text="data_value.comment"></p>
                    </div>
                  </div>
                </div>
              </div>

{{--              <div class="col-lg-12 col-md-12 col-12 col-sm-12" v-if="data_value.reply.length > 0" v-for="reply_value in data_value.reply">--}}
{{--                <div class="comments_Box">--}}
{{--                  <div class="row">--}}
{{--                    <div class="col-lg-11 col-md-12 col-12 col-sm-12 offset-lg-1">--}}
{{--                      <div class="text_wrapper">--}}
{{--                        <div class="author_detail">--}}
{{--                          <span class="author_name"> Steffa Ferello  <i class="fa fa-circle"></i> </span>--}}
{{--                          <span class="publish_date"> July 4, 2019 - <a href="#">Reply</a> </span>--}}
{{--                        </div>--}}
{{--                        <div class="author_content">--}}
{{--                          <p v-text="reply_value.reply"></p>--}}
{{--                        </div>--}}
{{--                      </div>--}}
{{--                    </div>--}}
{{--                  </div>--}}
{{--                </div>--}}
{{--              </div>--}}

            </div>
          </div>
          <div class="comments_wrapper booking_table_wrapper blog_comment_wrapper dm_cover">
            <div class="dm_heading_wrapper">

              <h2>leave a comment</h2>
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
            <div class="booking_form_field">
              <form @submit.prevent="AddComment()">
                <div class="row">
                  <div class="col-lg-6 col-md-6">
                    <div class="form-pos form_field">
                      <div class="form-group i-name">
                        <input type="text" class="form-control require" v-model="FormData.name" name="first_name" placeholder="Your Name*">
                        <i class="fas fa-user"></i>
                      </div>
                      <span class="text-danger" v-text="errors.get('name')"></span>
                    </div>
                  </div>

                  <div class="col-lg-6 col-md-6">
                    <div class="form-e form_field">
                      <div class="form-group i-email">

                        <input type="email" v-model="FormData.email" class="form-control require" name="email" placeholder="You Email *" data-valid="email" data-error="Email should be valid.">
                        <i class="fas fa-envelope"></i>
                      </div>
                      <span class="text-danger" v-text="errors.get('email')"></span>
                    </div>
                  </div>
                  <div class="col-lg-12 col-md-12">
                    <div class="form-e form_field">
                      <div class="form-group i-email">
                        <textarea class="form-control require" name="comment" rows="4" id="messageTen" placeholder=" Message" v-model="FormData.comment"></textarea>
                        <i class="fas fa-comment"></i>
                      </div>
                      <span class="text-danger" v-text="errors.get('comment')"></span>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="tb_es_btn_div">
                      <div class="response"></div>
                      <div class="tb_es_btn_wrapper blog_cmnt_btn">
                        <button type="submit" class="">submit now !</button>
                      </div>
                    </div>
                  </div>
                </div>
              </form>
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
  <script>
    new Vue({
      el: '#Comment',
      data: {
        FormData : {
           blog_id : '{{$blog_data->blog_id}}', name : '', email : '', comment : '',
        },
        Comments : [],
        errors : new Errors(),
      },
      methods: {
        AddComment: function () {
          const _this = this;
          const URL = baseURL+'/admin/comment/add';
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
                _this.Comments.push(response.data);
                _this.resetForm();
                Toster('success', 'Booking Submited');
              }
              else {
                _this.errors.record(response.error);
              }
            },
          });
        },
        getComment: function () {
          const _this = this;
          const URL = baseURL+'/admin/comment/list/'+_this.FormData.blog_id;
          $.ajax({
            url: URL,
            type: "post",
            data : {
              _token: "{{ csrf_token() }}",
            },
            success: function (response) {
              _this.Comments = response;
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
      mounted() {
        this.getComment();
      }
    });
  </script>

@endsection