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
            <div class="form-group form-group-lg">
              <div class="form-line">
                <input type="text" class="form-control"  name="name" placeholder="Name" value="{{$social_data->name}}"/>
              </div>
              <span>{{$errors->first('name')}}</span>
            </div>
            @php
              $icons = Config::has('fontawesome_icon') ? Config::get('fontawesome_icon') : [];
            @endphp
            <div class="form-group form-group-lg">
              <div class="form-line">
                <select class="form-control show-tick" name="icon" >
                  <option>Select Icon</option>
                  @foreach($icons as $class => $icon)
                    <option {{isset($social_data) && $social_data->icon == $class ? 'Selected' : ''}} value="{{$class}}">{!! $icon !!} {{$class}}</option>
                  @endforeach
                </select>
              </div>
              <span>{{$errors->first('icon')}}</span>
            </div>

            <div class="form-group form-group-lg">
              <div class="form-line">
                <input type="text" class="form-control"  name="link" placeholder="Link" value="{{$social_data->link}}"/>
              </div>
              <span>{{$errors->first('link')}}</span>
            </div>

            <button class="btn btn-success">Submit</button>
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
