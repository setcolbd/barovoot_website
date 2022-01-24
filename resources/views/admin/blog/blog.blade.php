@extends('admin.layouts.master')
@section('style')

@endsection
@section('content')


  <div id="Vue_component_wrapper">
    <div class="block-header">
      <h2>BLOG LIST</h2>
    </div>
    <!-- Basic Table -->
    <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
          <div class="header">
            <h2 class="card-inside-title">Add BLOG</h2>
            <button style="float: right; margin-top: -20px;" class="btn btn-info" data-toggle="modal" data-target="#myModal">Add Blog</button>
          </div>
            <div class="body">
              <div class="table-responsive">
              <table  class="table table-bordered table-striped table-hover js-basic-example dataTable">
                <thead>
                <tr>
                  <th>#</th>
                  <th>TITLE</th>
                  <th>DESCRIPTION</th>
                  <th>DATE</th>
                  <th>IMAGE</th>
                  <th>ACTION</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $key => $value)
                  <tr>
                    <td>{{$key+1}}</td>
                    <td>{{$value->title}}</td>
                    <td>{!! str_limit($value->description,40) !!}</td>
                    <td>{{$value->date}}</td>
                    <td><img style="width: 40px;" src="{{env('PUBLIC_PATH')}}/{{$value->image}}"></td>
                    <td style="display: inline-flex">
                      <a href="{{route('admin.blog.view',$value->blog_id)}}">
                        <button class="btn btn-default">
                          <i class="material-icons">remove_red_eye</i>
                        </button>
                      </a>
                      <a href="{{route('admin.blog.edit',$value->blog_id)}}">
                        <button class="btn btn-info">
                          <i class="material-icons">edit</i>
                        </button>
                      </a>
                      <a href="{{route('admin.comments',$value->blog_id)}}">
                        <button class="btn btn-primary">
                          <i class="material-icons">comment</i>
                        </button>
                      </a>
                      <a onclick="return confirm('Are you sure?')" href="{{route('admin.blog.delete',$value->blog_id)}}">
                        <button class="btn btn-danger">
                          <i class="material-icons">delete_forever</i>
                        </button>
                      </a>
                    </td>
                  </tr>
                @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- The Modal -->
    <div class="modal" id="myModal">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Add Blog</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <form  method="post" action="{{route('admin.blog.add')}}" enctype="multipart/form-data">
          {{@csrf_field()}}
          <!-- Modal body -->
            <div class="modal-body" id="Blog">


              <div class="form-group form-group-lg">
                <div class="form-line">
                  <input type="text" class="form-control"  name="title" placeholder="Title" />
                </div>
                <span>{{$errors->first('title')}}</span>
              </div>

              <div class="form-group form-group-lg">
                <div class="form-line">
                  <textarea rows="4" id="description" class="form-control no-resize" name="description" placeholder="Please type what you want..." v-model="FormData.description"></textarea>
                </div>
                <span>{{$errors->first('description')}}</span>
              </div>

              <div class="form-group form-group-lg">
                <div class="form-line">
                  <input type="date" class="form-control"  name="date"/>
                </div>
                <span>{{$errors->first('date')}}</span>
              </div>

              <div class="form-group form-group-lg">
                <div class="form-line">
                  <input type="file" class="form-control"  name="image"/>
                </div>
                <span>{{$errors->first('image')}}</span>
              </div>

              <button class="btn btn-success">Submit</button>
            </div>

          </form>
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>

        </div>
      </div>
    </div>

  </div>

@endsection
@section('script')
  <script>
    new Vue({
      el: '#Blog',
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
