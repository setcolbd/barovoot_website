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

            <h1>Contact Us</h1>
          </div>
          <div class="col-lg-12 col-md-12 col-12 col-sm-12">
            <div class="sub_title_section">
              <ul class="sub_title">
                <li> <a href="#"> Home  &nbsp; / &nbsp;</a> </li>
                <li>Contact Us</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- contact  wrapper start-->
  <div class="contact_wrapper dm_cover">
    <div class="container">
      <div class="row">
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">

          <div class="pricing_wrapper_box contct_info_center dm_cover">
            <div class="pricing_wrapper_images dm_cover">
              <div class="price_tag">
                <p><i class="flaticon-placeholder"></i></p>
              </div>
            </div>
            <div class="pricing_tab_content dm_cover">

              <p>{{$config_data['address']}}</p>
            </div>

          </div>

        </div>
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">

          <div class="pricing_wrapper_box contct_info_center dm_cover">
            <div class="pricing_wrapper_images dm_cover">

              <div class="price_tag">
                <p><i class="flaticon-telephone"></i></p>
              </div>
            </div>
            <div class="pricing_tab_content dm_cover">

              <p>{{$config_data['phone']}}</p>
            </div>

          </div>

        </div>
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">

          <div class="pricing_wrapper_box contct_info_center dm_cover">
            <div class="pricing_wrapper_images dm_cover">

              <div class="price_tag">
                <p><i class="flaticon-close-envelope"></i></p>
              </div>
            </div>
            <div class="pricing_tab_content dm_cover">

              <p>{{$config_data['email']}}</p>
            </div>

          </div>

        </div>
      </div>
    </div>
  </div>
  <div class="map_wrapper">
    <div id="map"></div>
  </div>
  <div class="booking_table_wrapper contact_top_wrapper dm_cover">

    <div class="container">
      <div class="row">
        <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12">
          <div class="dmx_heading_wraper">
            <img src="{{env('PUBLIC_PATH')}}/front_resources/images/head7.png" alt="img">
            <h2>get in touch</h2>
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

            <p>Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis
              <br> bibendum auctor, nisi elit consequat.</p>
          </div>
        </div>
        <div class="col-lg-10 offset-lg-1 col-md-12 col-sm-12 col-12" id="contact_us">
          <div class="booking_form_field contact_us_field_wrapper">
            <form  @submit.prevent="AddContactUs($event)">
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
                      <label class="sr-only">Email </label>
                      <input type="email" v-model="FormData.email" class="form-control require" name="email" placeholder="You Email *" data-valid="email" data-error="Email should be valid.">
                      <i class="fas fa-envelope"></i>
                    </div>
                    <span class="text-danger" v-text="errors.get('email')"></span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-m form_field">
                    <div class="form-group i-name">
                      <input type="text" class="form-control" v-model="FormData.phone" name="contact_no" placeholder="phone no.">
                      <i class="fas fa-phone"></i>
                    </div>
                    <span class="text-danger" v-text="errors.get('phone')"></span>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-m form_field">
                    <div class="form-group i-name">
                      <input type="text" class="form-control" v-model="FormData.subject" name="subject" placeholder="subject">
                      <i class="fas fa-info-circle"></i>
                    </div>
                    <span class="text-danger" v-text="errors.get('subject')"></span>
                  </div>
                </div>
                <div class="col-lg-12 col-md-12">
                  <div class="form-e form_field">
                    <div class="form-group i-email">
                      <textarea class="form-control require" v-model="FormData.message" name="message" rows="4" id="messageTen" placeholder=" Message"></textarea>
                      <i class="fas fa-comment"></i>
                    </div>
                    <span class="text-danger" v-text="errors.get('message')"></span>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="tb_es_btn_div">
                    <div class="response"></div>
                    <div class="tb_es_btn_wrapper">
                      <button type="submit" class="">send message</button>
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
@endsection
@section('script')
  <script>
    new Vue({
      el: '#contact_us',
      data: {
        FormData : {
          name : '', email : '', phone : '', subject : '', message : '',
        },
        errors : new Errors(),
      },
      methods: {
        AddContactUs: function () {
          const _this = this;
          const URL = baseURL+'admin/customer_message/add';
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
                Toster('success', 'Message Submited');
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

  </script>

@endsection