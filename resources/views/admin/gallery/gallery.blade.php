@extends('admin.layouts.master')
@section('style')

@endsection
@section('content')

  <div id="">

    <div class="row clearfix">
      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
          <div class="header">
            <h2 class="card-inside-title">ADD GALLERY</h2>
            <button style="float: right; margin-top: -20px;" class="btn btn-info" data-toggle="modal" data-target="#myModal">ADD GALLERY</button>
          </div>
          <div class="body">
            <div class="table-responsive">
              <table  class="table table-bordered table-striped table-hover js-basic-example dataTable">
              <thead>
              <tr>
                <th>#</th>
                <th>TITLE</th>
                <th>ALBUM NAME</th>
                <th>TYPE</th>
                <th>FILE</th>
                <th>ACTION</th>
              </tr>
              </thead>
              <tbody>
              @foreach($data as $key => $value)
                <tr>
                  <td>{{$key+1}}</td>
                  <td>{{$value->title}}</td>
                  <td>{{$value->name}}</td>
                  @if($value->type == 1)
                    <td >Photo</td>
                  @elseif($value->type == 2)
                    <td >Video</td>
                  @else
                    <td>Audio</td>
                  @endif

                  @if($value->type == 1)
                    <td ><img style="width: 32px !important;" src="{{env('PUBLIC_PATH')}}/{{$value->value}}"></td>
                  @elseif($value->type == 2)
                    <td ><img style="width: 32px !important;" src="http://i3.ytimg.com/vi/{{$value->value}}/default.jpg"></td>
                  @else
                    <td>{{$value->title}}</td>
                  @endif
                  <td>
                    <a href="{{route('admin.gallery.view',$value->gallery_id)}}">
                      <button class="btn btn-default">
                        <i class="material-icons">remove_red_eye</i>
                      </button>
                    </a>
                    <a href="{{route('admin.gallery.edit',$value->gallery_id)}}">
                      <button class="btn btn-info">
                        <i class="material-icons">edit</i>
                      </button>
                    </a>
                    <a onclick="return confirm('Are you sure?')" href="{{route('admin.gallery.delete',$value->gallery_id)}}">
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
            <h4 class="modal-title">Add GALLERY</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <form  method="post" action="{{route('admin.gallery.add')}}"  enctype="multipart/form-data">
          {{@csrf_field()}}
          <!-- Modal body -->
            <div class="modal-body" id="Vue_component_wrapper">

              <div class="form-group form-group-lg">
                <div class="form-line">
                  <select class="form-control" name="type" v-model="formElement.type">
                    <option value="1">Photo</option>
                    <option value="2">Video</option>
                    <option value="3">Audio</option>
                  </select>
                </div>
                <span>{{$errors->first('type')}}</span>
              </div>

              <div class="form-group form-group-lg" v-if="formElement.type == '1'">
                <div class="form-line">
                  <select class="form-control" name="album_id">
                    <option value="">Select Album</option>
                    @php
                      $album_collect_photo = collect($album)->where('type',1);
                    @endphp
                    @foreach($album_collect_photo as $album_value)
                    <option value="{{$album_value->album_id}}">{{$album_value->name}}</option>
                    @endforeach
                  </select>
                </div>
                <span>{{$errors->first('type')}}</span>
              </div>

              <div class="form-group form-group-lg"  v-if="formElement.type == '2'">
                <div class="form-line">
                  <select class="form-control" name="album_id">
                    <option value="">Select Album</option>
                    @php
                      $album_collect_video = collect($album)->where('type',2);
                    @endphp
                    @foreach($album_collect_video as $album_value)
                    <option value="{{$album_value->album_id}}">{{$album_value->name}}</option>
                    @endforeach
                  </select>
                </div>
                <span>{{$errors->first('type')}}</span>
              </div>

              <div class="form-group form-group-lg"  v-if="formElement.type == '3'">
                <div class="form-line">
                  <select class="form-control" name="album_id">
                    <option value="">Select Album</option>
                    @php
                      $album_collect_audio = collect($album)->where('type',3);
                    @endphp
                    @foreach($album_collect_audio as $album_value)
                    <option value="{{$album_value->album_id}}">{{$album_value->name}}</option>
                    @endforeach
                  </select>
                </div>
                <span>{{$errors->first('type')}}</span>
              </div>

              <div class="form-group form-group-lg">
                <div class="form-line">
                  <input type="text" class="form-control"  name="title" placeholder="Title" />
                </div>
                <span>{{$errors->first('title')}}</span>
              </div>

              <div class="form-group form-group-lg" v-if="formElement.type == '1' || formElement.type == '3'">
                <div class="form-line">
                  <input type="file" class="form-control" id="myFiles" onchange="parseAudioFile()"  name="value"/>
                  <input type="hidden" class="form-control" id="duration"  name="duration"/>
                  <input type="hidden" class="form-control" id="bitrate"  name="bitrate"/>
                </div>
                <span>{{$errors->first('value')}}</span>
              </div>

              <div class="form-group form-group-lg" v-if="formElement.type == '2'">
                <div class="form-line">
                  <input type="text" class="form-control"  name="value" placeholder="Video Link"/>
                </div>
                <span>{{$errors->first('value')}}</span>
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
{{--<script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>--}}
@section('script')
  <script>
      new Vue({
        el: '#Vue_component_wrapper',
        data: {
          formElement: {
              type:1,
          },
        },
      });
  </script>
  <script>
    function parseAudioFile(){
      const input = document.getElementById('myFiles');
      const files = input.files;
      const file = files && files.length ? files[0] : null;
      if(file && file.type.includes('audio')){
        const audioContext = new (window.AudioContext || window.webkitAudioContext)();
        const reader = new FileReader();
        reader.onload = function(e){
          const arrayBuffer = e.target.result;
          audioContext.decodeAudioData(arrayBuffer)
                  .then(function(buffer){
                    const duration = buffer.duration || 1;
                    const bitrate = Math.floor((file.size * 0.008) / duration);
                    $('#bitrate').val(bitrate.toFixed(2));
                    $('#duration').val(duration.toFixed(2));
                    console.log(bitrate);
                    console.log(duration);
                  });
        };
        reader.readAsArrayBuffer(file);
      }
    }
  </script>
@endsection
