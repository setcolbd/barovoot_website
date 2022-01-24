@extends('admin.layouts.master')
@section('style')

@endsection
@section('content')


  <div id="Vue_component_wrapper">
    <div class="block-header">
      <h2>OFFER LIST</h2>
      {{--      <button style="float: right; margin-top: -20px;" class="btn btn-info" data-toggle="modal" data-target="#myModal">Add PACKAGE</button>--}}
    </div>


    <!-- Basic Table -->
    <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
          <div class="header">
            <h2 class="card-inside-title">EDIT OFFER</h2>
          </div>
          <form  method="post" action="{{route('admin.offer.update')}}" enctype="multipart/form-data">
            {{@csrf_field()}}
            <input type="hidden" name="offer_id" value="{{$data->offer_id}}">
            <div class="body table-responsive">

              <div class="form-group form-group-lg">
                <div class="form-line">
                  <input type="text" class="form-control" value="{{$data->title}}" name="title" placeholder="Name" />
                </div>
                <span>{{$errors->first('title')}}</span>
              </div>

              <div class="form-group form-group-lg">
                <div class="form-line">
                  <textarea rows="4" class="form-control no-resize" name="description" placeholder="Please type what you want...">{{$data->description}}</textarea>
                </div>
                <span>{{$errors->first('description')}}</span>
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
@endsection
