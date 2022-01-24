@extends('admin.layouts.master')
@section('style')

@endsection
@section('content')


<div id="Vue_component_wrapperhkjh">
  <div class="block-header">
    <h2>CONFIGURATION</h2>
  </div>


  <!-- Input -->
  <div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
      <div class="card">
        <div class="body">

          <h2 class="card-inside-title">Add Configuration</h2>
          <form method="post"
                action="{{isset($data) ? route('admin.configuration.update') : route('admin.configuration.add')}}" enctype="multipart/form-data">
            {{@csrf_field()}}
            <div class="row clearfix">
              <div class="col-sm-12">
                <div class="form-group form-group-lg">
                  <div class="form-line">
                    <input type="hidden" name="id" value="{{isset($data) ? $data->configuration_id : '' }}">
                    <select @change="CallEditorFunction()"  class="form-control show-tick" v-model="formElement.type" name="type" id="type">
                      <option {{isset($data) && $data->type == 'text' ? 'selected' : ''}} value="text">Text</option>
                      <option {{isset($data) && $data->type == 'textarea' ? 'selected' : ''}} value="textarea">Textarea</option>
                      <option {{isset($data) && $data->type == 'file' ? 'selected' : ''}} value="file">File</option>
                    </select>
                  </div>
                  <span>{{$errors->first('type')}}</span>
                </div>
                <div class="row">
                  <div class="col-md-6" >
                    <div class="form-group form-group-lg">
                      <div class="form-line">
                        <input type="text" class="form-control" value="{{isset($data) ? $data->name : ''}}" name="name" placeholder="Name" @if(isset($data) && $data->name) readonly="readonly"  @endif/>
                      </div>
                      <span>{{$errors->first('name')}}</span>
                    </div>
                  </div>
                  <div class="col-md-6" >
                    <div class="form-group form-group-lg">
                      <div class="" style="margin-top: 15px;">
                        @if(isset($data) && $data->name)
                        <span style="color: red;">This area are not changable!!</span>
                        @endif
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group form-group-lg">
                  <div class="form-line">
                    <input type="text" class="form-control" value="{{isset($data) ? $data->display_name : ''}}" name="display_name" placeholder="Display Name" />
                  </div>
                  <span>{{$errors->first('display_name')}}</span>
                </div>

  {{--              VALUE--}}
                <div class="form-group form-group-lg" v-if="formElement.type === 'text'">
                  <div class="form-line">
                    <input type="text" value="{{isset($data) ? $data->value : ''}}" class="form-control" name="value" placeholder="example@gmail.com" />
                  </div>
                  <span>{{$errors->first('value')}}</span>
                </div>

                <div class="form-group form-group-lg" v-if="formElement.type === 'textarea'">
                  <div class="form-line">
                    <textarea rows="10" class="form-control no-resize"  name="value" placeholder="Please type what you want..." >{{isset($data) ? $data->value : ''}}</textarea>
                  </div>
                  <span>{{$errors->first('value')}}</span>
                </div>

                <div class="form-group form-group-lg" v-if="formElement.type === 'file'">
                  <div>
                    @if (isset($data))
                      <img style="height: 100px" id="ImageId" src="{{env('PUBLIC_PATH')}}/{{$data->value}}">
                    @else
                      <img style="height: 100px" src="{{env('PUBLIC_PATH')}}/admin_resources/user.jpg" id="ImageId">
                    @endif
                  </div>
                  <div class="form-line">
                    <input type="file" name="value" class="form-control" onchange="showImage(this, 'ImageId')">
                    <input v-if="formElement.type === 'file'" type="hidden" name="value" value="{{isset($data) ? $data->value : ''}}">
                  </div>
                  <span>{{$errors->first('value')}}</span>
                </div>


              </div>
            </div>
            <div class="row_clearfix">
              <button class="btn btn-success floatleft">Submit</button><a href="{{route('admin.configuration.list')}}" class="previous">&laquo; Previous</a>
            </div>
          </form>

        </div>
      </div>
    </div>
  </div>
  <!-- #END# Input -->
</div>

@endsection
@section('script')

  <script>
      new Vue({
        el: '#Vue_component_wrapperhkjh',
        data: {
          formElement: {
            type: '{{isset($data) ? $data->type : 'text'}}',
          },

        },
      });
  </script>
@endsection
