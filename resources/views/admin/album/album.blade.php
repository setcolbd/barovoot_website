@extends('admin.layouts.master')
@section('style')

@endsection
@section('content')

  <div id="Vue_component_wrapper">

    <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
          <div class="header">
            <h2 class="card-inside-title">Add Album</h2>
            <button style="float: right; margin-top: -20px;" class="btn btn-info" data-toggle="modal" data-target="#myModal">Add Album</button>
          </div>
          <div class="body">
            <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
              <thead>
              <tr>
                <th>#</th>
                <th>NAME</th>
                <th>DESCRIPTON</th>
                <th>TYPE</th>
                <th>ACTION</th>
              </tr>
              </thead>
              <tbody>
              @foreach($data as $key => $value)
                <tr>
                  <td>{{$key+1}}</td>
                  <td>{{$value->name}}</td>
                  <td>{{$value->description}}</td>
                  @if($value->type == 1)
                    <td >Photo</td>
                  @else
                    <td >Video</td>
                  @endif
                  <td>
                    <a href="{{route('admin.album.view',$value->album_id)}}">
                      <button class="btn btn-default">
                        <i class="material-icons">remove_red_eye</i>
                      </button>
                    </a>
                    <a href="{{route('admin.album.edit',$value->album_id)}}">
                      <button class="btn btn-info">
                        <i class="material-icons">edit</i>
                      </button>
                    </a>
                    <a onclick="return confirm('Are you sure?')" href="{{route('admin.album.delete',$value->album_id)}}">
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
    <div class="modal" id="myModal">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Add Album</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <form  method="post" action="{{route('admin.album.add')}}">
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

              <div class="form-group form-group-lg">
                <div class="form-line">
                  <select class="form-control" name="type">
                    <option value="1">Photo</option>
                    <option value="2">Video</option>
                    <option value="3">Audio</option>
                  </select>
                </div>
                <span>{{$errors->first('type')}}</span>
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
