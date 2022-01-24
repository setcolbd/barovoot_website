<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="zxx">
<!--[endif]-->
<head>
    <meta charset="utf-8" />
    <title>{{$title}}</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta name="description" content="Domex, Night Club, Bar, DJ Night" />
    <meta name="keywords" content="Domex, Night Club, Bar, DJ Night" />
    <meta name="author" content="" />
    <meta name="MobileOptimized" content="320" />
    <!--Template style -->
    <link rel="stylesheet" type="text/css" href="{{env('PUBLIC_PATH')}}/front_resources/css/animate.css" />
    <link rel="stylesheet" type="text/css" href="{{env('PUBLIC_PATH')}}/front_resources/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="{{env('PUBLIC_PATH')}}/front_resources/css/fonts.css" />
    <link rel="stylesheet" type="text/css" href="{{env('PUBLIC_PATH')}}/front_resources/css/flaticon.css" />
    <link rel="stylesheet" type="text/css" href="{{env('PUBLIC_PATH')}}/front_resources/css/font-awesome.css" />
    <link rel="stylesheet" type="text/css" href="{{env('PUBLIC_PATH')}}/front_resources/css/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="{{env('PUBLIC_PATH')}}/front_resources/css/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="{{env('PUBLIC_PATH')}}/front_resources/css/magnific-popup.css">
    <link rel="stylesheet" type="text/css" href="{{env('PUBLIC_PATH')}}/front_resources/css/player.css">
    <link rel="stylesheet" type="text/css" href="{{env('PUBLIC_PATH')}}/front_resources/css/reset.css" />
    <link rel="stylesheet" type="text/css" href="{{env('PUBLIC_PATH')}}/front_resources/css/style.css" />
    <link rel="stylesheet" type="text/css" href="{{env('PUBLIC_PATH')}}/front_resources/css/custom_style.css" />
    <link rel="stylesheet" type="text/css" href="{{env('PUBLIC_PATH')}}/front_resources/css/responsive.css" />
    <!--favicon-->
    <link rel="shortcut icon" type="image/png" href="{{env('PUBLIC_PATH')}}/front_resources/images/favicon.png" />
    @yield('style')
</head>

<body>
@include('front.layouts.header')
<h1></h1>
@yield('content')
@include('front.layouts.footer')
<script src="{{env('PUBLIC_PATH')}}/front_resources/js/jquery-3.3.1.min.js"></script>
<script src="{{env('PUBLIC_PATH')}}/front_resources/js/bootstrap.min.js"></script>


<script>
    var baseURL = '{{url('/')}}';
    var prefix = '{{isset($prefix) ? $prefix : ''}}';
    var lang = '{{isset($lang) ? $lang : ''}}';
    var public_path = '{{env('PUBLIC_PATH')}}/';
    $.ajaxSetup({data : {_token: '{{csrf_token()}}'},});
</script>

<script src="{{env('PUBLIC_PATH')}}/front_resources/js/modernizr.js"></script>
<script src="{{env('PUBLIC_PATH')}}/front_resources/js/jquery.menu-aim.js"></script>
<script src="{{env('PUBLIC_PATH')}}/front_resources/js/imagesloaded.pkgd.min.js"></script>
<script src="{{env('PUBLIC_PATH')}}/front_resources/js/jquery.magnific-popup.js"></script>
<script src="{{env('PUBLIC_PATH')}}/front_resources/js/jquery.countTo.js"></script>
<script src="{{env('PUBLIC_PATH')}}/front_resources/js/jquery.inview.min.js"></script>
<script src="{{env('PUBLIC_PATH')}}/front_resources/js/isotope.pkgd.min.js"></script>
<script src="{{env('PUBLIC_PATH')}}/front_resources/js/owl.carousel.js"></script>
<script src="{{env('PUBLIC_PATH')}}/front_resources/js/jquery.downCount.js"></script>
<script src="{{env('PUBLIC_PATH')}}/front_resources/js/player.js"></script>
<script src="{{env('PUBLIC_PATH')}}/front_resources/js/music.js"></script>
<script src="https://www.youtube.com/iframe_api"></script>
{{--<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>--}}
<script src="{{env('PUBLIC_PATH')}}/front_resources/js/youtube_player.js"></script>
<script src="{{env('PUBLIC_PATH')}}/front_resources/js/custom.js"></script>
<!-- custom js-->
<script src="http://maps.google.com/maps/api/js?key=AIzaSyDOogBL2cC0dSezucKzQGWxMIMmclqWNts&amp;sensor=false"></script>

<script>
    var infowindow = null;
    $(document).ready(function() {
        initialize();
    });

    var latitude = '{{$config_data['latitude']}}';
    var longitude = '{{$config_data['longitude']}}';
    var address = '{{$config_data['address']}}';
    function initialize() {

        var centerMap = new google.maps.LatLng(latitude, longitude);

        var myOptions = {
            zoom: 18,
            center: centerMap,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            styles: [{
                elementType: 'geometry',
                stylers: [{
                    color: '#1b1b1b'
                }]
            }, {
                elementType: 'labels.text.stroke',
                stylers: [{
                    color: '#1b1b1b'
                }]
            }, {
                elementType: 'labels.text.fill',
                stylers: [{
                    color: '#746855'
                }]
            }, {
                featureType: 'administrative.locality',
                elementType: 'labels.text.fill',
                stylers: [{
                    color: '#d59563'
                }]
            }]
        }

        var map = new google.maps.Map(document.getElementById("map"), myOptions);

        setMarkers(map, sites);
        infowindow = new google.maps.InfoWindow({
            content: "loading..."
        });

        var bikeLayer = new google.maps.BicyclingLayer();
        bikeLayer.setMap(map);

    }

    var sites = [
        [address, latitude, longitude, 5, address],
    ];

    function setMarkers(map, markers) {

        for (var i = 0; i < markers.length; i++) {
            var sites = markers[i];
            var siteLatLng = new google.maps.LatLng(sites[1], sites[2]);
            var marker = new google.maps.Marker({
                position: siteLatLng,
                map: map,
                title: sites[0],
                zIndex: sites[3],
                html: sites[4]
            });

            var contentString = "Some content";

            google.maps.event.addListener(marker, "click", function() {
                infowindow.setContent(this.html);
                infowindow.open(map, this);
            });
        }
    }

    $(document).ready(function() {
        var owl = $('.tc_twtfd_wrapper .owl-carousel');
        owl.owlCarousel({
            loop: true,
            autoplay:false,
            items:1,
            smartSpeed: 1200,
            responsiveClass: true,
            navText : ['<i class="flaticon-up-arrow"></i>','<i class="flaticon-download-arrow"></i>'],
            autoplayHoverPause: true,
            animateOut: 'slideOutUp',
            animateIn: 'slideInUp',
            autoplayTimeout: 5000,
            autoplayHoverPause: false,
        });

    });

</script>
<script src="{{env('PUBLIC_PATH')}}/admin_resources/js/script.js"></script>
<script src="{{env('PUBLIC_PATH')}}/admin_resources/js/vue.js"></script>

<script>
    new Vue({
        el: '#subscriber',
        data: {
            FormData : {
                email : '',
            },
            errors : new Errors(),
        },
        methods: {
            AddSubscriber: function () {
                const _this = this;
                const URL = baseURL+'/admin/subscriber/add';
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
                            $('#success_subscribe').text('Success');
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
<script>
    var path = window.location;
    var target = $('ul li a[href$="' + path + '"]');
    target.parent().addClass("active");

    jQuery(function($) {
      var child_path = window.location.href;
      $('ul a').each(function() {
        if (this.href === child_path) {
          $(this).addClass('active');
          $(this).parent().parent().parent().addClass('active');
        }
      });
    });

</script>
@yield('script')
</body>
</html>