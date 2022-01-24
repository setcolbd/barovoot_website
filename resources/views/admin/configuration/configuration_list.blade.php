@extends('admin.layouts.master')
@section('style')

@endsection
@section('content')


  <div id="Vue_component_wrapper">
    <div class="block-header">
      <h2>CONFIGURATION LIST</h2>
    </div>


    <!-- Basic Table -->
    <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
          <div class="header">
            <h2 class="card-inside-title">Add Configuration</h2>
          </div>
          <div class="body">
            <div class="table-responsive">
              <table  class="table table-bordered table-striped table-hover js-basic-example dataTable">
              <thead>
              <tr>
                <th>#</th>
                <th>TYPE</th>
                <th>NAME</th>
                <th>DISPLAY NAME</th>
                <th>VALUE</th>
                <th>ACTION</th>
              </tr>
              </thead>
              <tbody>
              @foreach($data as $key => $value)
              <tr>
                <td>{{$key+1}}</td>
                <td>{{$value->type}}</td>
                <td>{{$value->name}}</td>
                <td>{{$value->display_name}}</td>
                @if($value->type == 'file')
                  <td><img style="width: 40px;" src="{{env('PUBLIC_PATH')}}/{{$value->value}}"></td>
                @else
                  <td>{{$value->value}}</td>
                @endif
                <td>
{{--                  <a onclick="return confirm('Are you sure?')" href="{{route('admin.configuration.delete',$value->configuration_id)}}">--}}
{{--                    <button class="btn btn-danger">--}}
{{--                      <i class="material-icons">delete_forever</i>--}}
{{--                    </button>--}}
{{--                  </a>--}}
{{--                  <a href="{{route('admin.configuration.view',$value->configuration_id)}}">--}}
{{--                    <button class="btn btn-default">--}}
{{--                      <i class="material-icons">remove_red_eye</i>--}}
{{--                    </button>--}}
{{--                  </a>--}}
                  <a href="{{route('admin.configuration.edit',$value->configuration_id)}}">
                    <button class="btn btn-info">
                      <i class="material-icons">edit</i>
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
    <!-- #END# Basic Table -->

  </div>

@endsection
@section('script')
@endsection
