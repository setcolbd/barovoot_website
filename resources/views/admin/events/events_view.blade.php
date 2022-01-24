@extends('admin.layouts.master')
@section('style')

@endsection
@section('content')


  <div id="Vue_component_wrapper">



    <!-- Basic Table -->
    <div class="row clearfix" id="Event">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
          <div class="header">
            <h2 class="card-inside-title">Edit Events</h2>
{{--            <button style="float: right; margin-top: -20px;" class="btn btn-info" data-toggle="modal" data-target="#myModal">Add Social</button>--}}
          </div>
          <form  method="post" action="{{route('admin.events.update')}}" enctype="multipart/form-data">
            <div class="body table-responsive">

              <table class="table">
                <tr>
                  <th>Title</th>
                  <td>{{$data->title}}</td>
                </tr>
                <tr>
                  <th>Location</th>
                  <td>{{$data->location}}</td>
                </tr>
                <tr>
                  <th>Budget</th>
                  <td>{{$data->amount}}</td>
                </tr>
                <tr>
                  <th>Description</th>
                  <td>{!! $data->description !!}</td>
                </tr>
                <tr>
                  <th>Date</th>
                  <td>{{$data->date}}</td>
                </tr>
                <tr>
                  <th>Image</th>
                  <td><input class="hidden" name="image" value="{{$data->image}}"></td>
                </tr>
              </table>

            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- #END# Basic Table -->

  </div>

@endsection
@section('script')
  <script>
    new Vue({
      el: '#Event',
      data: {
        FormData : {
          description : '',
        },
        errors : new Errors(),

        plugins: ["advlist autolink lists link image charmap print preview hr anchor pagebreak", "searchreplace wordcount visualblocks visualchars code fullscreen", "insertdatetime media nonbreaking save table contextmenu directionality", "emoticons template paste textcolor colorpicker textpattern code directionality"],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media | code",

      },
      methods:{
        RunEditor: function () {
          const _this = this;
          tinyMCE.init({
            selector: 'textarea#description',
            plugins: _this.plugins,
            toolbar: _this.toolbar,
            menubar: false,
            statusbar: false,
            setup: function (editor) {
              editor.on('Change', function (e) {
                _this.FormData.description = editor.getContent();
              })
            }
          });
        },
      },
      mounted(){
        this.RunEditor();
      }
    });
  </script>
@endsection
