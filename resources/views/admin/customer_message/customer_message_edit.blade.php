@extends('admin.layouts.master')
@section('style')

@endsection
@section('content')


  <div id="Vue_component_wrapper">
    <div class="block-header">
      <h2>MESSAGE LIST</h2>
{{--      <button style="float: right; margin-top: -20px;" class="btn btn-info" data-toggle="modal" data-target="#myModal">ADD MESSAGE</button>--}}
    </div>


    <!-- Basic Table -->
    <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
          <div class="header">
            <h2 class="card-inside-title">Edit MESSAGE</h2>
          </div>
          <form  method="post" action="{{route('admin.customer_message.update')}}">
            {{@csrf_field()}}
            <input type="hidden" name="customer_message_id" value="{{$data->customer_message_id}}">
            <div class="body table-responsive">

              <div class="form-group form-group-lg">
                <div class="form-line">
                  <input type="text" class="form-control" value="{{$data->name}}"  name="name" placeholder="Name" />
                </div>
                <span>{{$errors->first('name')}}</span>
              </div>

              <div class="form-group form-group-lg">
                <div class="form-line">
                  <input type="text" class="form-control" value="{{$data->email}}"  name="email" placeholder="Email" />
                </div>
                <span>{{$errors->first('email')}}</span>
              </div>

              <div class="form-group form-group-lg">
                <div class="form-line">
                  <input type="text" class="form-control" value="{{$data->phone}}"  name="phone" placeholder="Phone" />
                </div>
                <span>{{$errors->first('phone')}}</span>
              </div>

              <div class="form-group form-group-lg">
                <div class="form-line">
                  <input type="text" class="form-control" value="{{$data->subject}}"  name="subject" placeholder="Subject" />
                </div>
                <span>{{$errors->first('subject')}}</span>
              </div>

              <div class="form-group form-group-lg">
                <div class="form-line">
                  <textarea rows="4" class="form-control no-resize" name="message" placeholder="Please type what you want...">{{$data->message}}</textarea>
                </div>
                <span>{{$errors->first('message')}}</span>
              </div>
              <button class="btn btn-success">Submit</button>
            </div>

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
