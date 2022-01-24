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
            {{@csrf_field()}}
            <input type="hidden" name="events_id" value="{{$data->events_id}}">
            <div class="body table-responsive">

              <div class="form-group form-group-lg">
                <div class="form-line">
                  <input type="text" class="form-control" value="{{$data->title}}"  name="title" placeholder="Name" />
                </div>
                <span>{{$errors->first('title')}}</span>
              </div>


              <div class="form-group form-group-lg">
                <div class="form-line">
                  <input type="text" class="form-control" value="{{$data->location}}"  name="location" placeholder="Location" />
                </div>
                <span>{{$errors->first('location')}}</span>
              </div>

              <div class="form-group form-group-lg">
                <div class="form-line">
                  <input type="number" class="form-control" value="{{$data->amount}}"  name="amount" placeholder="Budget"/>
                </div>
                <span>{{$errors->first('amount')}}</span>
              </div>

              <div class="form-group form-group-lg">
                <div class="form-line">
                  <textarea rows="4" id="description" class="form-control no-resize" name="description" placeholder="Please type what you want...">{{$data->description}}</textarea>
                </div>
                <span>{{$errors->first('description')}}</span>
              </div>

              <div class="form-group form-group-lg">
                <div class="form-line">
                  <input type="date" class="form-control" value="{{$data->date}}" name="date"/>
                </div>
                <span>{{$errors->first('date')}}</span>
              </div>

              <div class="form-group form-group-lg">
                <div>
                  <img style="width: 130px;" src="{{env('PUBLIC_PATH')}}/{{$data->image}}">
                </div>
                <div class="form-line">
                  <input type="file" class="form-control"  name="image"/>
                  <input class="hidden" name="image" value="{{$data->image}}">
                </div>
                <span>{{$errors->first('image')}}</span>
              </div>

              <button class="btn btn-success">Submit</button>
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
