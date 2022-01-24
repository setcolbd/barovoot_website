@extends('admin.layouts.master')
@section('style')

@endsection
@section('content')


  <div id="Vue_component_wrapper">
    <div class="block-header">
      <h2>ALBUM LIST</h2>
{{--      <button style="float: right; margin-top: -20px;" class="btn btn-info" data-toggle="modal" data-target="#myModal">ADD ALBUM</button>--}}
    </div>


    <!-- Basic Table -->
    <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
          <div class="header">
            <h2 class="card-inside-title">Edit Album</h2>
          </div>
          <form  method="post" action="{{route('admin.album.update')}}" enctype="multipart/form-data">
            {{@csrf_field()}}
            <input type="hidden" name="album_id" value="{{$data->album_id}}">
            <div class="body table-responsive">

              <div class="form-group form-group-lg">
                <div class="form-line">
                  <input type="text" class="form-control" value="{{$data->name}}"  name="name" placeholder="Name" />
                </div>
                <span>{{$errors->first('name')}}</span>
              </div>

              <div class="form-group form-group-lg">
                <div class="form-line">
                  <textarea rows="4" class="form-control no-resize" name="description" placeholder="Please type what you want...">{{$data->description}}</textarea>
                </div>
                <span>{{$errors->first('description')}}</span>
              </div>

              <div class="form-group form-group-lg">
                <div class="form-line">
                  <select class="form-control" name="type" value="{{$data->type}}">
                    <option value="1"
                            @if($data->type == 1) selected="selected" @endif>Photo
                    </option>
                    <option value="2"
                            @if($data->type == 2) selected="selected" @endif>Video
                    </option>
                    <option value="3"
                            @if($data->type == 3) selected="selected" @endif>Audio
                    </option>
                  </select>
                </div>
                <span>{{$errors->first('type')}}</span>
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
@endsection
