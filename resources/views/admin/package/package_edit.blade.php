@extends('admin.layouts.master')
@section('style')

@endsection
@section('content')


  <div id="Vue_component_wrapper">
    <div class="block-header">
      <h2>PACKAGE LIST</h2>
      <button style="float: right; margin-top: -20px;" class="btn btn-info" data-toggle="modal" data-target="#myModal">Add PACKAGE</button>
    </div>


    <!-- Basic Table -->
    <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
          <div class="header">
            <h2 class="card-inside-title">Edit Package</h2>
          </div>
          <form  method="post" action="{{route('admin.package.update')}}" enctype="multipart/form-data">
            {{@csrf_field()}}
            <input type="hidden" name="package_id" value="{{$data->package_id}}">
            <div class="body table-responsive">

              <div class="form-group form-group-lg">
                <div class="form-line">
                  <input type="text" class="form-control" value="{{$data->name}}" name="name" placeholder="Name" />
                </div>
                <span>{{$errors->first('name')}}</span>
              </div>

              <div class="form-group form-group-lg">
                <div class="form-line">
                  <textarea rows="4" class="form-control no-resize" name="description" placeholder="Please type what you want...">{{$data->description}}</textarea>
                </div>
                <span>{{$errors->first('description')}}</span>
              </div>
              @php
                $icons = Config::has('fontawesome_icon') ? Config::get('fontawesome_icon') : [];
              @endphp
              <div class="form-group form-group-lg">
                <div class="form-line">
                  <select class="form-control show-tick" name="image" >
                    <option>Select Icon</option>
                    @foreach($icons as $class => $icon)
                      <option {{isset($data) && $data->image == $class ? 'Selected' : ''}} value="{{$class}}">{!! $icon !!} {{$class}}</option>
                    @endforeach
                  </select>
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
@endsection
