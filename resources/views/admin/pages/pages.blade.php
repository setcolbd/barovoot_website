@extends('admin.layouts.master')
@section('style')

@endsection
@section('content')

  <div id="Vue_component_wrapper">

    <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
          <div class="header">
            <h2 class="card-inside-title">Add Pages</h2>
            <button style="float: right; margin-top: -20px;" class="btn btn-info" data-toggle="modal" data-target="#myModal">Add Pages</button>
          </div>
          <div class="body">
            <div class="table-responsive">
              <table  class="table table-bordered table-striped table-hover js-basic-example dataTable">
              <thead>
              <tr>
                <th>#</th>
                <th>TITLE</th>
                <th>URL</th>
                <th>DESCRIPTION</th>
                <th>IS MENU</th>
                <th>MENU POSITION</th>
                <th>PARENT</th>
                <th>ACTION</th>
              </tr>
              </thead>
              <tbody>
              @foreach($data as $key => $value)
                <tr>
                  <td>{{$key+1}}</td>
                  <td>{{$value['title']}}</td>
                  <td>{{$value['url']}}</td>
                  <td>{{$value['description']}}</td>
                  @if($value['is_menu'] == 1)
                    <td >Yes</td>
                  @else
                    <td >No</td>
                  @endif
                  @if($value['menu_position'] ==1)
                  <td>Left Side</td>
                  @else
                    <td>Right Side</td>
                  @endif
                  <td>
                    @if($value['parent_page'])
                    {{$value['parent_page']['title']}}
                    @endif
                  </td>
                  <td>
                    <a href="{{route('admin.pages.edit',$value['pages_id'])}}">
                      <button class="btn btn-info">
                        <i class="material-icons">edit</i>
                      </button>
                    </a>
                    <a onclick="return confirm('Are you sure?')" href="{{route('admin.pages.delete',$value['pages_id'])}}">
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
            <h4 class="modal-title">Add Pages</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <form  method="post" action="{{route('admin.pages.add')}}">
          {{@csrf_field()}}
          <!-- Modal body -->
            <div class="modal-body">

              <div class="form-group form-group-lg">
                <div class="form-line">
                  <input type="text" class="form-control"  name="title" placeholder="Name" />
                </div>
                <span>{{$errors->first('title')}}</span>
              </div>

              <div class="form-group form-group-lg">
                <div class="form-line">
                  <input type="text" class="form-control"  name="url" placeholder="URL" />
                </div>
                <span>{{$errors->first('url')}}</span>
              </div>

              <div class="form-group form-group-lg">
                <div class="form-line">
                  <textarea id="description" rows="4" class="form-control no-resize" name="description" placeholder="Please type what you want..."></textarea>
                </div>
                <span>{{$errors->first('description')}}</span>
              </div>

              <div class="form-group form-group-lg">
                <div class="form-line">
                  <select class="form-control" name="is_menu">
                    <option value="">Is Menu</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                  </select>
                </div>
                <span>{{$errors->first('is_menu')}}</span>
              </div>

              <div class="form-group form-group-lg">
                <div class="form-line">
                  <select class="form-control"  name="menu_position">
                    <option>Select</option>
                    <option value="1">Left Side</option>
                    <option value="2">Right Side</option>
                  </select>
                </div>
                <span>{{$errors->first('menu_position')}}</span>
              </div>

              <div class="form-group form-group-lg">
                <div class="form-line">
                  <select class="form-control" name="parent">
                    <option value="">--select--</option>
                    @foreach($data as $value)
                      <option value="{{$value['pages_id']}}">{{$value['title']}}</option>
                    @endforeach
                  </select>
                </div>
                <span>{{$errors->first('parent')}}</span>
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
