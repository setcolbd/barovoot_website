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

            <div class="body table-responsive">

              <table class="table">
                <tr>
                  <th>Name</th>
                  <td>{{$data->customer_name}}</td>
                </tr>
                <tr>
                  <th>Email</th>
                  <td>{{$data->email}}</td>
                </tr>
                <tr>
                  <th>Phone</th>
                  <td>{{$data->phone}}</td>
                </tr>
                <tr>
                  <th>Subject</th>
                  <td>{{$data->subject}}</td>
                </tr>
                <tr>
                  <th>Message</th>
                  <td>{{$data->message}}</td>
                </tr>
              </table>
s
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
