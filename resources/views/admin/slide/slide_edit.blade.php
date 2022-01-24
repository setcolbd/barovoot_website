@extends('admin.layouts.master')
@section('style')

@endsection
@section('content')


  <div id="Vue_component_wrapper">
    <div class="block-header">
      <h2>SLIDE LIST</h2>
{{--      <button style="float: right; margin-top: -20px;" class="btn btn-info" data-toggle="modal" data-target="#myModal">Add Social</button>--}}
    </div>


    <!-- Basic Table -->
    <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
          <div class="header">
            <h2 class="card-inside-title">Add Slide</h2>
          </div>
          <form  method="post" action="{{route('admin.slide.update')}}" enctype="multipart/form-data">
          {{@csrf_field()}}
          <!-- Modal body -->
            <div class="modal-body">

              <div class="form-group form-group-lg">
                <div class="form-line">
                  <input type="text" class="form-control" value="{{$data->title}}"  name="title" placeholder="Title" />
                  <input type="hidden" name="slides_id" value="{{$data->slides_id}}">
                </div>
                <span>{{$errors->first('title')}}</span>
              </div>

              <div class="form-group form-group-lg">
                <div class="form-line">
                  <input type="description" class="form-control" value="{{$data->description}}"  name="description" placeholder="Description" />
                </div>
                <span>{{$errors->first('description')}}</span>
              </div>

              <div class="form-group form-group-lg">
                <div>
                  <img style="width: 130px;" src="{{env('PUBLIC_PATH')}}/{{$data->image}}">
                </div>
                <div class="form-line">
                  <input type="file" class="form-control"  name="image"/>
                  <input type="hidden" value="{{$data->image}}" name="image">
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
