@extends('admin.layouts.master')
@section('style')

@endsection
@section('content')


  <div id="Vue_component_wrapper">



    <!-- Basic Table -->
    <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
          <div class="header">
            <h2 class="card-inside-title">Edit Booking</h2>
{{--            <button style="float: right; margin-top: -20px;" class="btn btn-info" data-toggle="modal" data-target="#myModal">Add Social</button>--}}
          </div>
          <form  method="post" action="{{route('admin.booking.update')}}" enctype="multipart/form-data">
            {{@csrf_field()}}
            <input type="hidden" name="booking_id" value="{{$data->booking_id}}">
            <div class="body table-responsive">

              <div class="form-group form-group-lg">
                <div class="form-line">
                  <input type="text" class="form-control" value="{{$data->name}}"  name="name" placeholder="Name" />
                </div>
                <span>{{$errors->first('name')}}</span>
              </div>


              <div class="form-group form-group-lg">
                <div class="form-line">
                  <input type="email" class="form-control" value="{{$data->email}}"  name="email" placeholder="Email" />
                </div>
                <span>{{$errors->first('email')}}</span>
              </div>

              <div class="form-group form-group-lg">
                <div class="form-line">
                  <input type="date" class="form-control" value="{{$data->date}}" name="date"/>
                </div>
                <span>{{$errors->first('date')}}</span>
              </div>

              <div class="form-group form-group-lg">
                <div class="form-line">
                  <input type="time" class="form-control" value="{{$data->time}}" name="time"/>
                </div>
                <span>{{$errors->first('time')}}</span>
              </div>

              <div class="form-group form-group-lg">
                <div class="form-line">
                  <input type="number" class="form-control" value="{{$data->number_of_people}}" name="number_of_people"/>
                </div>
                <span>{{$errors->first('number_of_people')}}</span>
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
