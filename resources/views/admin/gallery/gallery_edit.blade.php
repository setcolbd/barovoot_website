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
            <h2 class="card-inside-title">Edit Package</h2>
          </div>
          <form  method="post" action="{{route('admin.gallery.update')}}" enctype="multipart/form-data">
            {{@csrf_field()}}
            <input type="hidden" name="gallery_id" value="{{$data->gallery_id}}">
            <div class="body table-responsive">

              <div class="form-group form-group-lg">
                <div class="form-line">
                  <select class="form-control" name="type" value="{{$data->type}}" v-model="formElement.type">
                    <option value="1"
                            @if($data->type == 1) selected="selected" @endif>Photo
                    </option>
                    <option value="2"
                            @if($data->type == 2) selected="selected" @endif>Video
                    </option>
                  </select>
                </div>
                <span>{{$errors->first('type')}}</span>
              </div>

              <div class="form-group form-group-lg" v-if="formElement.type == '1'">
                <div class="form-line">
                  <select class="form-control" name="album_id">
                    <option value="">Select Album</option>
                    @php
                      $album_collect_photo = collect($album)->where('type',1);
                    @endphp
                    @foreach($album_collect_photo as $album_value)
                      <option value="{{$album_value->album_id}}"
                              @if($data->album_id == $album_value->album_id) selected="selected" @endif>{{$album_value->name}}</option>
                    @endforeach
                  </select>
                </div>
                <span>{{$errors->first('type')}}</span>
              </div>

              <div class="form-group form-group-lg"  v-if="formElement.type == '2'">
                <div class="form-line">
                  <select class="form-control" name="album_id">
                    <option value="">Select Album</option>
                    @php
                      $album_collect_video = collect($album)->where('type',2);
                    @endphp
                    @foreach($album_collect_video as $album_value)
                      <option value="{{$album_value->album_id}}"
                              @if($data->album_id == $album_value->album_id) selected="selected" @endif>{{$album_value->name}}</option>
                    @endforeach
                  </select>
                </div>
                <span>{{$errors->first('album_id')}}</span>
              </div>

              <div class="form-group form-group-lg">
                <div class="form-line">
                  <input type="text" class="form-control" value="{{$data->title}}" name="title" placeholder="Title" />
                </div>
                <span>{{$errors->first('title')}}</span>
              </div>

              <div class="form-group form-group-lg" v-if="formElement.type == '1'">
                <div class="form-line">
                  <input type="file" class="form-control"  name="value"/>
                  <input type="hidden" name="value" value="{{$data->value}}">
                </div>
                <span>{{$errors->first('value')}}</span>
              </div>

              <div class="form-group form-group-lg" v-if="formElement.type == '2'">
                <div class="form-line">
                  <input type="text" class="form-control" value="{{$data->value}}" name="value" placeholder="Video Link"/>
                </div>
                <span>{{$errors->first('value')}}</span>
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
      el: '#Vue_component_wrapper',
      data: {
        formElement: {
          type: '{{isset($data) ? $data->type : ''}}',
        },
      },
    });

  </script>
@endsection
