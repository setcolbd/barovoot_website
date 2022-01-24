@extends('admin.layouts.master')
@section('style')

@endsection
@section('content')
  <div>
    <div class="block-header">
      <h2>GOOGLE MAP</h2>
    </div>

    <!-- Widgets -->
    <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
          <div class="header">

            <div class="row">
              <div class="col-md-12" >
                <label for="date">Map</label>
                <div class="form-group">
                  <div class="form-line">
                  <div id="map" style="height: 500px; width: 100%">
                  </div>
                </div>
              </div>
            </div>
            <form action="{{route('admin.map.update')}}" method="POST">
              {{@csrf_field()}}
            <div class="row" style="margin: 10px;">
              <div class="col-md-6" >
                <label for="lat">Latitude</label>
                <div class="form-group">
                  <div class="form-line">
                    <input id="lat" value="{{$latitude->value}}" name="latitude" class="form-control" readonly="readonly">
                  </div>
                </div>
              </div>

              <div class="col-md-6" >
                <label for="lng">Logitude</label>
                <div class="form-group">
                  <div class="form-line">
                    <input id="lng" name="longitude" value="{{$longitude->value}}" class="form-control"  readonly="readonly">
                  </div>
                </div>
              </div>
              <button class="btn btn-success">Update</button>
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- #END# Widgets -->

  </div>
@endsection
@section('script')
  <script>
    var map;


    function initMap() {

      var int_latitude = '{{$latitude->value}}'; // YOUR LATITUDE VALUE
      var int_longitude = '{{$longitude->value}}'; // YOUR LONGITUDE VALUE

      var latitude = parseFloat(int_latitude); // YOUR LATITUDE VALUE
      var longitude = parseFloat(int_longitude); // YOUR LONGITUDE VALUE



      // var latitude = 27.7172453; // YOUR LATITUDE VALUE
      // var longitude = 85.3239605; // YOUR LONGITUDE VALUE

      var myLatLng = {lat: latitude, lng: longitude};

      map = new google.maps.Map(document.getElementById('map'), {
        center: myLatLng,
        zoom: 14,
        disableDoubleClickZoom: true, // disable the default map zoom on double click
      });

      var marker = new google.maps.Marker({
        position: myLatLng,
        map: map,
        title: latitude + ', ' + longitude
      });

      google.maps.event.addListener(map,'click',function(event) {

        var marker = new google.maps.Marker({
          position: event.latLng,
          map: map,
          title: event.latLng.lat()+', '+event.latLng.lng()
        });

        document.getElementById('lat').value = event.latLng.lat();
        document.getElementById('lng').value =  event.latLng.lng();

        // document.getElementById('latclicked').innerHTML = event.latLng.lat();
        // document.getElementById('longclicked').innerHTML =  event.latLng.lng();
      });

    }
  </script>
@endsection