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

            <input type="hidden" name="booking_id" value="{{$data->booking_id}}">
            <div class="body table-responsive">

              <table class="table">
                <tr>
                  <th>Name</th>
                  <td>{{$data->name}}</td>
                </tr>
                <tr>
                  <th>Email</th>
                  <td>{{$data->email}}</td>
                </tr>
                <tr>
                  <th>Date</th>
                  <td>{{$data->date}}</td>
                </tr>
                <tr>
                  <th>Time</th>
                  <td>{{$data->time}}</td>
                </tr>
                <tr>
                  <th>Number OF People</th>
                  <td>{{$data->number_of_people}}</td>
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
@endsection
