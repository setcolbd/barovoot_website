@extends('admin.layouts.master')
@section('style')

@endsection
@section('content')


  <div id="Vue_component_wrapper">
    <div class="block-header">
      <h2>ALBUM View</h2>
{{--      <button style="float: right; margin-top: -20px;" class="btn btn-info" data-toggle="modal" data-target="#myModal">ADD ALBUM</button>--}}
    </div>


    <!-- Basic Table -->
    <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
          <div class="header">
            <h2 class="card-inside-title">View Album</h2>
          </div>
          <form  method="post" action="" enctype="multipart/form-data">
            <div class="body table-responsive">

              <table class="table">
                <tr>
                  <th>Name</th>
                  <td>{{$data->name}}</td>
                </tr>
                <tr>
                  <th>Description</th>
                  <td>{{$data->description}}</td>
                </tr>
                <tr>
                  <th>Type</th>
                  <td>
                    @if($data->type == 1)
                      <p>Photo</p> @endif

                    @if($data->type == 2)
                      <p>Video</p> @endif

                    @if($data->type == 3)
                      <p>Audio</p> @endif
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
