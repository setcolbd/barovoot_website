@extends('admin.layouts.master')
@section('style')

@endsection
@section('content')
  <div>
    <div class="block-header">
      <h2>DASHBOARD</h2>
    </div>

    <!-- Widgets -->
    <div class="row clearfix">
      <a href="{{route('admin.events')}}">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-pink hover-expand-effect">
            <div class="icon">
              <i class="material-icons">playlist_add_check</i>
            </div>
            <div class="content">
              <div class="text">Events</div>
              <div class="number count-to" data-from="0" data-to="125" data-speed="15" data-fresh-interval="20"></div>
            </div>
          </div>
        </div>
      </a>
      <a href="{{route('admin.package')}}">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-cyan hover-expand-effect">
            <div class="icon">
              <i class="material-icons">help</i>
            </div>
            <div class="content">
              <div class="text">Package</div>
              <div class="number count-to" data-from="0" data-to="257" data-speed="1000" data-fresh-interval="20"></div>
            </div>
          </div>
        </div>
      </a>
      <a href="{{route('admin.offer')}}">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-light-green hover-expand-effect">
            <div class="icon">
              <i class="material-icons">forum</i>
            </div>
            <div class="content">
              <div class="text">Offer</div>
              <div class="number count-to" data-from="0" data-to="243" data-speed="1000" data-fresh-interval="20"></div>
            </div>
          </div>
        </div>
      </a>
      <a href="{{route('admin.booking')}}">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-orange hover-expand-effect">
            <div class="icon">
              <i class="material-icons">person_add</i>
            </div>
            <div class="content">
              <div class="text">Booking</div>
              <div class="number count-to" data-from="0" data-to="1225" data-speed="1000" data-fresh-interval="20"></div>
            </div>
          </div>
        </div>
      </a>
    </div>
    <!-- #END# Widgets -->

  </div>
@endsection
@section('script')

@endsection