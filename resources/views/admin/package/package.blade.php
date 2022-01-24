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
                <h2 class="card-inside-title">Add Package</h2>
              </div>
              <div class="col-md-6 text-right">
                <button style="float: right;" class="btn btn-info add_button" data-toggle="modal" data-target="#myModal">Add Package</button>
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
                <th>DESCRIPTION</th>
                <th>IMAGE</th>
                <th>ACTION</th>
              </tr>
              </thead>
              <tbody>
              @foreach($data as $key => $value)
                <tr>
                  <td>{{$key+1}}</td>
                  <td>{{$value->name}}</td>
                  <td>{{$value->description}}</td>
                  <td class="{{$value->image}}"></td>
                  <td>
                    <a href="{{route('admin.package.view',$value->package_id)}}">
                      <button class="btn btn-default">
                        <i class="material-icons">remove_red_eye</i>
                      </button>
                    </a>
                    <a href="{{route('admin.package.edit',$value->package_id)}}">
                      <button class="btn btn-info">
                        <i class="material-icons">edit</i>
                      </button>
                    </a>
                    <a onclick="return confirm('Are you sure?')" href="{{route('admin.package.delete',$value->package_id)}}">
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
    <div class="modal" id="myModal">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Add Package</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <form  method="post" action="{{route('admin.package.add')}}" enctype="multipart/form-data">
          {{@csrf_field()}}
          <!-- Modal body -->
            <div class="modal-body">


              <div class="form-group form-group-lg">
                <div class="form-line">
                  <input type="text" class="form-control"  name="name" placeholder="Name" />
                </div>
                <span>{{$errors->first('name')}}</span>
              </div>

              <div class="form-group form-group-lg">
                <div class="form-line">
                  <textarea rows="4" class="form-control no-resize" name="description" placeholder="Please type what you want..."></textarea>
                </div>
                <span>{{$errors->first('description')}}</span>
              </div>
              @php
                $icons = Config::has('fontawesome_icon') ? Config::get('fontawesome_icon') : [];
              @endphp
              <div class="form-group form-group-lg">
                <div class="form-line">
                  <select class="form-control show-tick" name="image" >
                    <option>Select Icon</option>
                    @foreach($icons as $class => $icon)
                      <option value="{{$class}}">{!! $icon !!} {{$class}}</option>
                    @endforeach
                  </select>
                </div>
                <span>{{$errors->first('image')}}</span>
              </div>

              <button class="btn btn-success">Submit</button>
            </div>

          </form>
          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>

        </div>
      </div>
    </div>
  </div>
@endsection
@section('script')
@endsection
