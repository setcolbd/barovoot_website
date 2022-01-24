@extends('admin.layouts.master')
@section('style')

@endsection
@section('content')


  <div id="Vue_component_wrapper">
    <div class="block-header">
      <h2>Social LIST</h2>
    </div>


    <!-- Basic Table -->
    <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
          <div class="header">
            <h2 class="card-inside-title">Add Social</h2>
          </div>
          <form  method="post" action="{{route('admin.social.update')}}">
            {{@csrf_field()}}
            <input type="hidden" name="social_id" value="{{$social_data->social_id}}">
          <div class="body table-responsive">

            <table class="table">
              <tr>
                <th>Name</th>
                <td>{{$social_data->name}}</td>
              </tr>
              <tr>
                <th>Icon</th>
                <td class="{{$social_data->icon}}"></td>
              </tr>
              <tr>
                <th>Link</th>
                <td>{{$social_data->link}}</td>
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
