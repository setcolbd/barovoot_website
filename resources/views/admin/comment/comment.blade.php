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
                <th>COMMENT</th>
                <th>ACTION</th>
              </tr>
              </thead>
              <tbody>
              @foreach($data as $key => $value)
                <tr>
                  <td>{{$key+1}}</td>
                  <td>{{$value->name}}</td>
                  <td>{{$value->email}}</td>
                  <td>{{$value->comment}}</td>
                  <td>
                    <a onclick="return confirm('Are you sure?')" href="{{route('admin.comments.delete',$value->comments_id)}}">
                      <button class="btn btn-danger">
                        <i class="material-icons">delete_forever</i>
                      </button>
                    </a>
                    <a href="{{route('admin.comments.view',$value->comments_id)}}">
                      <button class="btn btn-default">
                        <i class="material-icons">remove_red_eye</i>
                      </button>
                    </a>
                    @if($value->status == 1)
                      <a href="{{route('admin.comments.status',$value->comments_id)}}">
                        <button class="btn btn-success">
                          <i class="material-icons">autorenew</i>
                        </button>
                      </a>
                    @endif
                    @if($value->status == 0)
                      <a href="{{route('admin.comments.status',$value->comments_id)}}">
                        <button class="btn btn-warning">
                          <i class="material-icons">autorenew</i>
                        </button>
                      </a>
                    @endif
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
