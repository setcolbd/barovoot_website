@extends('admin.layouts.master')
@section('style')

@endsection
@section('content')


  <div id="Vue_component_wrapper">
    <div class="block-header">
      <h2>PAGE LIST</h2>
{{--      <button style="float: right; margin-top: -20px;" class="btn btn-info" data-toggle="modal" data-target="#myModal">Add PACKAGE</button>--}}
    </div>


    <!-- Basic Table -->
    <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
          <div class="header">
            <h2 class="card-inside-title">Edit PAGE</h2>
          </div>
          <form  method="post" action="{{route('admin.pages.update')}}" enctype="multipart/form-data">
            {{@csrf_field()}}
            <input type="hidden" name="pages_id" value="{{$data->pages_id}}">
            <div class="body table-responsive">

              <div class="form-group form-group-lg">
                <div class="form-line">
                  <input type="text" class="form-control" value="{{$data->title}}" name="title" placeholder="Name" />
                </div>
                <span>{{$errors->first('title')}}</span>
              </div>

              <div class="form-group form-group-lg" style="display: none">
                <div class="form-line">
                  <input type="text" class="form-control" value="{{$data->url}}" name="url" placeholder="URL" />
                </div>
                <span>{{$errors->first('url')}}</span>
              </div>

              <div class="form-group form-group-lg">
                <div class="form-line">
                  <textarea id="description" rows="4" class="form-control no-resize" name="description" placeholder="Please type what you want...">{{$data->description}}</textarea>
                </div>
                <span>{{$errors->first('description')}}</span>
              </div>

              <div class="form-group form-group-lg">
                <div class="form-line">
                  <select class="form-control" name="is_menu">
                    <option value="">Is Menu</option>
                    <option value="1" @if($data->is_menu==1) selected="selected" @endif>Yes</option>
                    <option value="0" @if($data->is_menu==0) selected="selected" @endif>No</option>
                  </select>
                </div>
                <span>{{$errors->first('is_menu')}}</span>
              </div>

              <div class="form-group form-group-lg">
                <div class="form-line">
                  <select class="form-control"  name="menu_position">
                    <option>Select</option>
                    <option @if($data->menu_position == 1) selected="selected" @endif value="1">Left Side</option>
                    <option @if($data->menu_position == 2) selected="selected" @endif value="2">Right Side</option>
                  </select>
                </div>
                <span>{{$errors->first('menu_position')}}</span>
              </div>

              <div class="form-group form-group-lg">
                <div class="form-line">
                  <select class="form-control" name="parent">
                    <option value="">--select--</option>
                    @foreach($menu_data as $value)
                      <option value="{{$value->pages_id}}" @if($data->parent == $value->pages_id) selected="selected" @endif>{{$value->title}}</option>
                    @endforeach
                  </select>
                </div>
                <span>{{$errors->first('parent')}}</span>
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
