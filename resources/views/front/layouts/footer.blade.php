

<div class="footer_wrapper">

    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-12">
                <div class="footer_about_content">
                    <div class="footer_img_logo">
                        <a href="#"><img src="{{env('PUBLIC_PATH')}}/{{$config_data['footer_logo']}}" class="img-responsive" alt="logo" /></a>
                    </div>
                    <div class="footer_abotus_content">
                        <p>{{str_limit($config_data['footer_description'], 150)}}</p>
                    </div>
                    <div class="footer_aboutus_link">
                        <a href="{{url('about_us')}}">Read More...</a>
                    </div>

                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12">

                <div class="wrapper_second_blog footer_heading">
                    <h4>latest news</h4>

                  @php
                    $collect_blog = collect($blog)->take(2);
                  @endphp
                  @foreach($collect_blog as $key => $value)
                    <div class="blog_wrapper_common blog_wrapper{{$key+1}}">
                        <div class="blog_image">
                            <img src="{{env('PUBLIC_PATH')}}/{{$value['image']}}" class="img-responsive" alt="blog-img2_img" />
                        </div>
                        <div class="blog_text">
                            <h5><a href="#">{{$value['title']}}</a></h5>
                            <div class="blog_date">{{$value['date']}}</div>
                        </div>
                    </div>
                  @endforeach
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12">
                <div class="wrapper_second_useful footer_heading">
                    <h4>gallery</h4>
                    <div class="footer_gallary">
                        <div class="row">
                            <ul>
                                @php
                                    $collect_image = collect($gallery_image)->where('type',1)->take(6);
                                @endphp
                                @foreach($collect_image as $value)
                                <li><img src="{{env('PUBLIC_PATH')}}/{{$value['value']}}" alt="img" class="img-responsive">
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-12">
                <div class="wrapper_second_contact footer_heading">
                    <h4>contact us</h4>

                    <ul>
                        <li><i class="fas fa-map-marker-alt"></i><span>{{$config_data['address']}}</span>
                        </li>
                        <li><i class="fas fa-globe"></i><a href="#">{{$config_data['website']}}</a>

                        </li>
                        <li><i class="fa fa-phone"></i><span>{{$config_data['phone']}}</span>

                        </li>
                        <li><i class="fa fa-envelope"></i><a href="#">{{$config_data['email']}}</a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>

</div>
<div class="footer_bottom_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-12 col-sm-12">
                <div class="footer_copyright">
                    <p>{!! $config_data['copyright'] !!}</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-12 col-sm-12">
                <div class="footer_icon_link">
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

