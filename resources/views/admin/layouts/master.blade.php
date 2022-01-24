<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>{{$title}}</title>
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">
    <script src="{{env('PUBLIC_PATH')}}/admin_resources/js/vue.js"></script>
    <link href="{{env('PUBLIC_PATH')}}/admin_resources/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="{{env('PUBLIC_PATH')}}/admin_resources/css/themes/all-themes.css" rel="stylesheet">
    <link href="{{env('PUBLIC_PATH')}}/admin_resources/plugins/node-waves/waves.css" rel="stylesheet">
    <link href="{{env('PUBLIC_PATH')}}/admin_resources/plugins/animate-css/animate.css" rel="stylesheet">

    <link href="{{env('PUBLIC_PATH')}}/admin_resources/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="{{env('PUBLIC_PATH')}}/admin_resources/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

    <link href="{{env('PUBLIC_PATH')}}/admin_resources/css/custom_style.css" rel="stylesheet">
    @yield('style')

</head>

<body class="theme-red" style="background: url({{env('PUBLIC_PATH')}}/{{$config_data['dashboard_background']}}); background-attachment: fixed;    background-repeat: no-repeat; background-size: cover;">
<!-- Top Bar -->
@include('admin.layouts.top_menu')
<!-- #Top Bar -->
<!-- Left Bar -->
@include('admin.layouts.main_menu')
<!-- #Left Bar -->
<section class="content">
    <div class="container-fluid main_content_wrapper">
        @yield('content')
    </div>
    <div class="col-md-12 footercopywriter" style="margin-left: 10px">
        <div class="col-md-6 text-left mobile_text_center">Copyright @2020  </div>
        <div class="col-md-6 text-right mobile_text_center">Design & Developed by <a href="http://tmss-ict.com/" target="_blank">TMSS ICT</a></div>
    </div>
</section>

<script>
  var baseURL = '{{url('/')}}';
  var prefix = '{{isset($prefix) ? $prefix : ''}}';
  var lang = '{{isset($lang) ? $lang : ''}}';
</script>

<script src="{{env('PUBLIC_PATH')}}/admin_resources/plugins/jquery/jquery.js"></script>
<script src="{{env('PUBLIC_PATH')}}/admin_resources/plugins/bootstrap/js/bootstrap.js"></script>
<script src="{{env('PUBLIC_PATH')}}/admin_resources/plugins/node-waves/waves.js"></script>
<script src="{{env('PUBLIC_PATH')}}/admin_resources/plugins/jquery-datatable/jquery.dataTables.js"></script>
<script src="{{env('PUBLIC_PATH')}}/admin_resources/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
<script src="{{env('PUBLIC_PATH')}}/admin_resources/plugins/tinymce/js/tinymce/tinymce.min.js"></script>
<script src="{{env('PUBLIC_PATH')}}/admin_resources/js/admin.js"></script>

<script src="{{env('PUBLIC_PATH')}}/admin_resources/js/pages/tables/jquery-datatable.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
<script src="{{env('PUBLIC_PATH')}}/admin_resources/js/script.js"></script>
<script src="{{env('PUBLIC_PATH')}}/admin_resources/js/vue.js"></script>
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBkhV6fgkekcHunAcF-AQWmzdbmWnZLQ7g&callback=initMap">
</script>
{!! Toastr::message() !!}
<script>
    tinyMCE.init({
        selector: 'textarea#description',
        plugins: ["advlist autolink lists link image charmap print preview hr anchor pagebreak", "searchreplace wordcount visualblocks visualchars code fullscreen", "insertdatetime media nonbreaking save table contextmenu directionality", "emoticons template paste textcolor colorpicker textpattern code directionality"],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | code",
        menubar: false,
        statusbar: false,
        toolbar_items_size : 'small',
    });
</script>
@yield('script')
</body>
</html>
