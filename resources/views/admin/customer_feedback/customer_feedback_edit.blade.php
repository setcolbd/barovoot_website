@extends('admin.layouts.master')
@section('style')

@endsection
@section('content')


  <div id="Vue_component_wrapper">
    <div class="block-header">
      <h2>CUSTOMER FEEDBACK LIST</h2>
    </div>


    <!-- Basic Table -->
    <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
          <div class="header">
            <h2 class="card-inside-title">Edit CUSTOMER FEEDBACK</h2>
          </div>
          <form  method="post" action="{{route('admin.customer_feedback.update')}}" enctype="multipart/form-data">
            {{@csrf_field()}}
            <input type="hidden" name="blog_id" value="{{$data->customer_feedback_id}}">
            <div class="body table-responsive">

              <div class="form-group form-group-lg">
                <div class="form-line">
                  <input type="text" class="form-control" value="{{$data->customer_name}}" name="customer_name" placeholder="Title" />
                </div>
                <span>{{$errors->first('customer_name')}}</span>
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
