@extends('admin.layouts.master')
@section('style')

@endsection
@section('content')
  <div id="Vue_component_wrapper">
    <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
          <div class="header">
            <div class="row">
              <div class="col-md-6 text-left">
                <h2 class="card-inside-title">Booking List</h2>
              </div>
              <div class="col-md-6 text-right">
{{--                <button style="float: right;" class="btn btn-info add_button" data-toggle="modal" data-target="#myModal">Booking List</button>--}}
              </div>
            </div>
          </div>
          <div class="body">
            <div class="table-responsive">
              <table  class="table table-bordered table-striped table-hover js-basic-example dataTable">
              <thead>
              <tr>
                <th>#</th>
                <th>NAME</th>
                <th>E-mail</th>
                <th>Date</th>
                <th>Time</th>
                <th>Number of People</th>
                <th>ACTIVE</th>
              </tr>
              </thead>
              <tbody>
              @foreach($data as $key => $value)
                <tr>
                  <td>{{$key+1}}</td>
                  <td>{{$value->name}}</td>
                  <td>{{$value->email}}</td>
                  <td>{{$value->date}}</td>
                  <td>{{$value->time}}</td>
                  <td>{{$value->number_of_people}}</td>
                  <td>
                    <a href="{{route('admin.booking.view',$value->booking_id)}}">
                      <button class="btn btn-default">
                        <i class="material-icons">remove_red_eye</i>
                      </button>
                    </a>
                    <a href="{{route('admin.booking.edit',$value->booking_id)}}">
                      <button class="btn btn-info">
                        <i class="material-icons">edit</i>
                      </button>
                    </a>
                    <a onclick="return confirm('Are you sure?')" href="{{route('admin.booking.delete',$value->booking_id)}}">
                      <button class="btn btn-danger">
                        <i class="material-icons">delete_forever</i>
                      </button>
                    </a>
                  </td>
                </tr>
              @endforeach
              </tbody>
            </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('script')
@endsection
