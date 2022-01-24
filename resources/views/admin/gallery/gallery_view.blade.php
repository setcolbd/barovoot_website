@extends('admin.layouts.master')
@section('style')

@endsection
@section('content')


  <div id="Vue_component_wrapper">
    <div class="block-header">
      <h2>GALLERY</h2>
{{--      <button style="float: right; margin-top: -20px;" class="btn btn-info" data-toggle="modal" data-target="#myModal">EDIT GALLERY</button>--}}
    </div>


    <!-- Basic Table -->
    <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
          <div class="header">
            <h2 class="card-inside-title">View Gallery</h2>
          </div>
          <form  method="post" action="" enctype="multipart/form-data">


            <div class="body table-responsive">


              <table class="table">
                <tr>
                  <th>Type</th>
                  @if($data->type == 1)
                    <td>Image</td>
                  @elseif($data->type == 2)
                    <td>Video</td>
                  @else
                    <td>Audio</td>
                  @endif
                </tr>
                <tr>
                  <th>Album</th>
                  <td>{{$data->name}}</td>
                </tr>
                <tr>
                  <th>Title</th>
                  <td>{{$data->title}}</td>
                </tr>
                <tr>
                  <th>File</th>
                  <td>
                  @if($data->type == 1)
                    <td><img style="width: 50px;" src="{{env('PUBLIC_PATH')}}/{{$data->value}}"></td>
                  @elseif($data->type == 2)
                    <td>{{$data->value}}</td>
                  @else
                    <td>{{$data->value}}</td>
                    @endif
                    </td>
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
      el: '#Vue_component_wrapper',
      data: {
        formElement: {
          type: '{{isset($data) ? $data->type : ''}}',
        },
      },
    });

  </script>
@endsection
