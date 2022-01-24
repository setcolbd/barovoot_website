@extends('admin.layouts.master')
@section('style')

@endsection
@section('content')


  <div id="Vue_component_wrapper">
    <div class="block-header">
      <h2>OFFER LIST</h2>
      {{--      <button style="float: right; margin-top: -20px;" class="btn btn-info" data-toggle="modal" data-target="#myModal">Add PACKAGE</button>--}}
    </div>


    <!-- Basic Table -->
    <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
          <div class="header">
            <h2 class="card-inside-title">EDIT OFFER</h2>
          </div>
          <form  method="post" action="{{route('admin.offer.update')}}" enctype="multipart/form-data">
            <div class="body table-responsive">

              <table class="table">
                <tr>
                  <th>Title</th>
                  <td>{{$data->title}}</td>
                </tr>
                <tr>
                  <th>Description</th>
                  <td>{{$data->description}}</td>
                </tr>
                <tr>
                  <th>Image</th>
                  <td>
                    <img style="width: 130px;" src="{{env('PUBLIC_PATH')}}/{{$data->image}}">
                  </td>
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
