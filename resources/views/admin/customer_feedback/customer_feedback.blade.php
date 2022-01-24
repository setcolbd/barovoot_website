@extends('admin.layouts.master')
@section('style')

@endsection
@section('content')


  <div id="Vue_component_wrapper">
    <div class="block-header">
      <h2>Customer Feedback LIST</h2>
    </div>
    <!-- Basic Table -->
    <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
          <div class="header">
            <h2 class="card-inside-title">Customer Feedback List</h2>
          </div>
          <div class="body">
            <div class="table-responsive">
              <table  class="table table-bordered table-striped table-hover js-basic-example dataTable">
              <thead>
              <tr>
                <th>#</th>
                <th>Name</th>
                <th>EMAIL</th>
                <th>DESCRIPTION</th>
                <th>IMAGE</th>
                <th>ACTION</th>
              </tr>
              </thead>
              <tbody>
              @foreach($data as $key => $value)
                <tr>
                  <td>{{$key+1}}</td>
                  <td>{{$value->customer_name}}</td>
                  <td>{{$value->email}}</td>
                  <td>{{str_limit($value->description, 50)}}</td>
                  <td><img style="width: 40px;" src="{{env('PUBLIC_PATH')}}/{{$value->image}}"></td>
                  <td>
                    <a href="{{route('admin.customer_feedback.view',$value->customer_feedback_id)}}">
                      <button class="btn btn-default">
                        <i class="material-icons">remove_red_eye</i>
                      </button>
                    </a>
                    <a href="{{route('admin.customer_feedback.edit',$value->customer_feedback_id)}}">
                      <button class="btn btn-info">
                        <i class="material-icons">edit</i>
                      </button>
                    </a>
                    @if($value->status == 1)
                    <a href="{{route('admin.customer_feedback.status',$value->customer_feedback_id)}}">
                      <button class="btn btn-success">
                        <i class="material-icons">autorenew</i>
                      </button>
                    </a>
                    @endif
                    @if($value->status == 0)
                    <a href="{{route('admin.customer_feedback.status',$value->customer_feedback_id)}}">
                      <button class="btn btn-warning">
                        <i class="material-icons">autorenew</i>
                      </button>
                    </a>
                    @endif
                    <a onclick="return confirm('Are you sure?')" href="{{route('admin.customer_feedback.delete',$value->customer_feedback_id)}}">
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

    <!-- The Modal -->


  </div>

@endsection
@section('script')
@endsection
