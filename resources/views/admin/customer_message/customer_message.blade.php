@extends('admin.layouts.master')
@section('style')

@endsection
@section('content')

  <div id="Vue_component_wrapper">

    <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
          <div class="header">
            <h2 class="card-inside-title"> Message List</h2>
          </div>
          <div class="body">
            <div class="table-responsive">
              <table  class="table table-bordered table-striped table-hover js-basic-example dataTable">
              <thead>
              <tr>
                <th>#</th>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>PHONE</th>
                <th>SUBJECT</th>
                <th>MESSAGE</th>
                <th>ACTION</th>
              </tr>
              </thead>
              <tbody>
              @foreach($data as $key => $value)
                <tr>
                  <td>{{$key+1}}</td>
                  <td>{{$value->name}}</td>
                  <td>{{$value->email}}</td>
                  <td>{{$value->phone}}</td>
                  <td>{{$value->subject}}</td>
                  <td>{{$value->message}}</td>
                  <td>
                    <a href="{{route('admin.customer_message.view',$value->customer_message_id)}}">
                      <button class="btn btn-default">
                        <i class="material-icons">remove_red_eye</i>
                      </button>
                    </a>
                    <a href="{{route('admin.customer_message.edit',$value->customer_message_id)}}">
                      <button class="btn btn-info">
                        <i class="material-icons">edit</i>
                      </button>
                    </a>
                    <a onclick="return confirm('Are you sure?')" href="{{route('admin.customer_message.delete',$value->customer_message_id)}}">
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
