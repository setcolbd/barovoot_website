<?php

namespace App\Http\Controllers\Admin;

use App\BlogModel;
use App\ConfigurationModel;
use App\EventsModel;
use App\Models\Album;
use App\Models\Booking;
use App\Models\Comments;
use App\Models\CustomerFeedback;
use App\Models\CustomerMessage;
use App\Models\Gallery;
use App\Models\Offer;
use App\Models\Package;
use App\Models\Pages;
use App\Models\Slide;
use App\Models\Subscriber;
use App\SocialModel;
use http\Client\Response;
use Toastr;
use Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
  public function AdminDashboard()
  {
    $headers['title'] = 'Admin Dashboard';
    return view('admin.dashboard', $headers);
  }

  public function AdminLogout()
  {
    $configs = ConfigurationModel::get();
    $config_data = [];
    $config_head = [];
    if (count($configs) > 0){
      foreach ($configs as $config){
        $config_data[$config->name] = $config->value;
        $config_head[$config->name] = $config->display_name;
      }
    }

    view()->share('config_data', $config_data);
    view()->share('config_head', $config_head);

    Auth::logout();
    return redirect(route('admin.login'));
  }

  public function Map()
  {
    $headers['title'] = 'Map';
    $headers['latitude'] = ConfigurationModel::where('name','latitude')->first();
    $headers['longitude'] = ConfigurationModel::where('name','longitude')->first();
    return view('admin.map',$headers);
  }

  public function MapUpdate(Request $request)
  {
    if($request->latitude && $request->longitude)
    {
      $latitude = ConfigurationModel::where('name','latitude')->first();
      $latitude->value=$request->latitude;
      $latitude->save();

      $longitude = ConfigurationModel::where('name','longitude')->first();
      $longitude->value=$request->longitude;
      $longitude->save();

      Toastr::success('Location Updated Successfully!', 'Success', ["positionClass" => "toast-bottom-right"]);
      return back();
    }
  }

//===========CONFIGURATION==========================
  public function configuration()
  {
    $headers['title'] = 'Admin Configuration';
    return view('admin.configuration.configuration', $headers);
  }
  public function ConfigurationList()
  {
    $headers['title'] = 'Admin Configuration List';
    $headers['data'] = ConfigurationModel::get();
    return view('admin.configuration.configuration_list', $headers);
  }
  public function ConfigurationEdit($id)
  {
    $headers['title'] = 'Admin Configuration Edit';
    $headers['data'] = ConfigurationModel::findOrFail($id);
    return view('admin.configuration.configuration', $headers);
  }
  public function AddConfiguration(Request $request)
  {
    $configuration = new ConfigurationModel;
    $validate = Validator::make($request->all(), $configuration->validation());
    if ($validate->fails()) {
      return back()->withInput()->withErrors($validate);
    } else {
      $requested_data = $request->all();
      if ($request->type == 'file') {
        if ($request->hasFile('value')) {
          $image_type = $request->file('value')->getClientOriginalExtension();
          $path = "admin_resources/file/";
          $upload_path = public_path('admin_resources/file/');
          $name = time() . "." . $image_type;
          $full_path = $path . $name;
          $request->file('value')->move($upload_path, $name);
          $requested_data = Arr::set($requested_data, 'value', $full_path);
        }
      }
      $configuration->fill($requested_data)->save();
      Toastr::success('Configuration Created Successfully!', 'Success', ["positionClass" => "toast-bottom-right"]);
      return back();
    }
  }
  public function DeleteConfiguration($id)
  {
    $data = ConfigurationModel::findOrFail($id);
    if ($data->type == 'file') {
      if (File::exists(public_path($data->value))) {
        File::delete(public_path($data->value));
      }
    }
    $data->delete();
    Toastr::success('Configuration Deleted Successfully!', 'Success', ["positionClass" => "toast-bottom-right"]);
    return back();
  }
  public function UpdateConfiguration(Request $request)
  {
    $configuration = ConfigurationModel::findOrFail($request->id);
    $validate = Validator::make($request->all(), $configuration->validation($request->id));
    if ($validate->fails()) {
      return back()->withInput()->withErrors($validate);
    } else {
      $requested_data = $request->all();
      if ($request->type == 'file') {
        if (File::exists(public_path($configuration->value))) {
          File::delete(public_path($configuration->value));
        }

        if ($request->hasFile('value')) {
          $image_type = $request->file('value')->getClientOriginalExtension();
          $path = "admin_resources/file/";
          $upload_path = public_path('admin_resources/file/');
          $name = time() . "." . $image_type;
          $full_path = $path . $name;
          $request->file('value')->move($upload_path, $name);
          $requested_data = Arr::set($requested_data, 'value', $full_path);
        }
      }
    }
    $configuration->fill($requested_data)->save();
    Toastr::success('Configuration Created Successfully!', 'Success', ["positionClass" => "toast-bottom-right"]);
    return back();
  }

//===========SOCIAL===============================
  public function Social()
  {
    $headers['title'] = 'Social';
    $headers['social_data'] = SocialModel::get();
    return view('admin.social.social', $headers);
  }
  public function SocialEdit($id)
  {
    $headers['title'] = 'Admin Social Edit';
    $headers['social_data'] = SocialModel::findOrFail($id);
    return view('admin.social.social_edit', $headers);
  }
  public function SocialView($id)
  {
    $headers['title'] = 'Admin Social View';
    $headers['social_data'] = SocialModel::findOrFail($id);
    return view('admin.social.social_view', $headers);
  }
  public function AddSocial(Request $request)
  {
//      dd($request->all());
    $social = new SocialModel;
    $validate = Validator::make($request->all(), $social->validation());
    if ($validate->fails()) {
      Toastr::warning('Validation Failed!', 'Warning', ["positionClass" => "toast-bottom-right"]);
      return back()->withInput()->withErrors($validate);
    } else {
      $social->fill($request->all())->save();
      Toastr::success('Social Created Successfully!', 'Success', ["positionClass" => "toast-bottom-right"]);
      return back();
    }
  }
  public function DeleteSocial($id)
  {
    $data = SocialModel::findOrFail($id);

    $data->delete();
    Toastr::success('Social Deleted Successfully!', 'Success', ["positionClass" => "toast-bottom-right"]);
    return back();
  }
  public function UpdateSocial(Request $request)
  {
    $social = SocialModel::findOrFail($request->social_id);
    $validate = Validator::make($request->all(), $social->validation());
    if ($validate->fails()) {
      Toastr::warning('Validation Failed!', 'Warning', ["positionClass" => "toast-bottom-right"]);
      return back()->withInput()->withErrors($validate);
    } else {
      $social->fill($request->all())->save();
      Toastr::success('Social Updated Successfully!', 'Success', ["positionClass" => "toast-bottom-right"]);
      return back();
    }
  }

//=================EVENTS=================================
  public function Events()
  {
    $headers['title'] = 'Events';
    $headers['data'] = EventsModel::orderBy('created_at','DESC')->get();
    return view('admin.events.events', $headers);
  }
  public function EventsEdit($id)
  {
    $headers['title'] = 'Admin Events Edit';
    $headers['data'] = EventsModel::findOrFail($id);
    return view('admin.events.events_edit', $headers);
  }
  public function EventsView($id)
  {
    $headers['title'] = 'Admin Events View';
    $headers['data'] = EventsModel::findOrFail($id);
    return view('admin.events.events_view', $headers);
  }
  public function AddEvents(Request $request)
  {
    //      dd($request->all());
    $events = new EventsModel;
    $validate = Validator::make($request->all(), $events->validation());
    if ($validate->fails()) {
      Toastr::warning('Validation Failed!', 'Warning', ["positionClass" => "toast-bottom-right"]);
      return back()->withInput()->withErrors($validate);
    } else {
      $requested_data = $request->all();
      if ($request->hasFile('image')) {
        $image_type = $request->file('image')->getClientOriginalExtension();
        $path = "admin_resources/file/";
        $upload_path = public_path('admin_resources/file/');
        $name = time() . "." . $image_type;
        $full_path = $path . $name;
        $request->file('image')->move($upload_path, $name);
        $requested_data = Arr::set($requested_data, 'image', $full_path);
      }

      $events->fill($requested_data)->save();
      Toastr::success('Events Created Successfully!', 'Success', ["positionClass" => "toast-bottom-right"]);
      return back();
    }
  }
  public function DeleteEvents($id)
  {
    $data = EventsModel::findOrFail($id);

    if (File::exists(public_path($data->image))) {
      File::delete(public_path($data->image));
    }

    $data->delete();
    Toastr::success('Events Deleted Successfully!', 'Success', ["positionClass" => "toast-bottom-right"]);
    return back();
  }
  public function UpdateEvents(Request $request)
  {
    $events = EventsModel::findOrFail($request->events_id);

    $validate = Validator::make($request->all(), $events->validation());

    if ($validate->fails()) {
      Toastr::warning('Validation Failed!', 'Warning', ["positionClass" => "toast-bottom-right"]);
      return back()->withInput()->withErrors($validate);
    } else {

      $requested_data = $request->all();

      if ($request->hasFile('image')) {

        if (File::exists(public_path($events->image))) {
          File::delete(public_path($events->image));
        }

        $image_type = $request->file('image')->getClientOriginalExtension();
        $path = "admin_resources/file/";
        $upload_path = public_path('admin_resources/file/');
        $name = time() . "." . $image_type;
        $full_path = $path . $name;
        $request->file('image')->move($upload_path, $name);
        $requested_data = Arr::set($requested_data, 'image', $full_path);
      }

      $events->fill($requested_data)->save();
      Toastr::success('Events Created Successfully!', 'Success', ["positionClass" => "toast-bottom-right"]);
      return back();
    }
  }

//============BLOG=================
  public function Blog()
  {
    $headers['title'] = 'Blog';
    $headers['data'] = BlogModel::orderBy('created_at','DESC')->get();
    return view('admin.blog.blog', $headers);
  }
  public function BlogEdit($id)
  {
    $headers['title'] = 'Admin Blog Edit';
    $headers['data'] = BlogModel::findOrFail($id);
    return view('admin.blog.blog_edit', $headers);
  }
  public function BlogView($id)
  {
    $headers['title'] = 'Admin Blog View';
    $headers['data'] = BlogModel::findOrFail($id);
    return view('admin.blog.blog_view', $headers);
  }
  public function AddBlog(Request $request)
  {
    $blog = new BlogModel;
    $validate = Validator::make($request->all(), $blog->validation());
    if ($validate->fails()) {
      Toastr::warning('Validation Failed!', 'Warning', ["positionClass" => "toast-bottom-right"]);
      return back()->withInput()->withErrors($validate);
    } else {

      $requested_data = $request->all();
      if ($request->hasFile('image')) {
        $image_type = $request->file('image')->getClientOriginalExtension();
        $path = "admin_resources/file/";
        $upload_path = public_path('admin_resources/file/');
        $name = time() . "." . $image_type;
        $full_path = $path . $name;
        $request->file('image')->move($upload_path, $name);
        $requested_data = Arr::set($requested_data, 'image', $full_path);
      }
      $requested_data = Arr::set($requested_data, 'entry_by', Auth::user()->id);

      $blog->fill($requested_data)->save();
      Toastr::success('Events Created Successfully!', 'Success', ["positionClass" => "toast-bottom-right"]);
      return back();
    }
  }
  public function UpdateBlog(Request $request)
  {
//    dd($request->all());
    $blog = BlogModel::findOrFail($request->blog_id);
    $validate = Validator::make($request->all(), $blog->validation());
    if ($validate->fails()) {
      Toastr::warning('Validation Failed!', 'Warning', ["positionClass" => "toast-bottom-right"]);
      return back()->withInput()->withErrors($validate);
    } else {


      $requested_data = $request->all();
      if ($request->hasFile('image')) {
        if (File::exists(public_path($blog->image))) {
          File::delete(public_path($blog->image));
        }

        $image_type = $request->file('image')->getClientOriginalExtension();
        $path = "admin_resources/file/";
        $upload_path = public_path('admin_resources/file/');
        $name = time() . "." . $image_type;
        $full_path = $path . $name;
        $request->file('image')->move($upload_path, $name);
        $requested_data = Arr::set($requested_data, 'image', $full_path);
      }
      $requested_data = Arr::set($requested_data, 'entry_by', Auth::user()->id);

      $blog->fill($requested_data)->save();
      Toastr::success('Events Update Successfully!', 'Success', ["positionClass" => "toast-bottom-right"]);
      return back();
    }
  }
  public function DeleteBlog($id)
  {
    $data = BlogModel::findOrFail($id);
    Comments::where('blog_id',$id)->delete();
    if (File::exists(public_path($data->image))) {
      File::delete(public_path($data->image));
    }

    $data->delete();
    Toastr::success('Blog Deleted Successfully!', 'Success', ["positionClass" => "toast-bottom-right"]);
    return back();
  }

//=================EVENTS=================================
  public function Slides()
  {
    $headers['title'] = 'Slides';
    $headers['data'] = Slide::get();
    return view('admin.slide.slide', $headers);
  }

  public function SlidesEdit($id)
  {
    $headers['title'] = 'Admin Events Edit';
    $headers['data'] = EventsModel::findOrFail($id);
    return view('admin.events.events_edit', $headers);
  }
  public function SlideView($id)
  {
    $headers['title'] = 'Admin Events View';
    $headers['data'] = Slide::findOrFail($id);
    return view('admin.slide.slide_view', $headers);
  }
  public function AddSlides(Request $request)
  {
    $events = new EventsModel;
    $validate = Validator::make($request->all(), $events->validation());
    if ($validate->fails()) {
      Toastr::warning('Validation Failed!', 'Warning', ["positionClass" => "toast-bottom-right"]);
      return back()->withInput()->withErrors($validate);
    } else {
      $requested_data = $request->all();
      if ($request->hasFile('image')) {
        $image_type = $request->file('image')->getClientOriginalExtension();
        $path = "admin_resources/file/";
        $upload_path = public_path('admin_resources/file/');
        $name = time() . "." . $image_type;
        $full_path = $path . $name;
        $request->file('image')->move($upload_path, $name);
        $requested_data = Arr::set($requested_data, 'image', $full_path);
      }

      $events->fill($requested_data)->save();
      Toastr::success('Events Created Successfully!', 'Success', ["positionClass" => "toast-bottom-right"]);
      return back();
    }
  }
  public function DeleteSlides($id)
  {
    $data = EventsModel::findOrFail($id);

    if (File::exists(public_path($data->image))) {
      File::delete(public_path($data->image));
    }

    $data->delete();
    Toastr::success('Events Deleted Successfully!', 'Success', ["positionClass" => "toast-bottom-right"]);
    return back();
  }
  public function UpdateSlides(Request $request)
  {
    $events = EventsModel::findOrFail($request->events_id);

    $validate = Validator::make($request->all(), $events->validation());

    if ($validate->fails()) {
      Toastr::warning('Validation Failed!', 'Warning', ["positionClass" => "toast-bottom-right"]);
      return back()->withInput()->withErrors($validate);
    } else {

      $requested_data = $request->all();

      if (File::exists(public_path($events->image))) {
        File::delete(public_path($events->image));
      }

      if ($request->hasFile('image')) {
        $image_type = $request->file('image')->getClientOriginalExtension();
        $path = "admin_resources/file/";
        $upload_path = public_path('admin_resources/file/');
        $name = time() . "." . $image_type;
        $full_path = $path . $name;
        $request->file('image')->move($upload_path, $name);
        $requested_data = Arr::set($requested_data, 'image', $full_path);
      }

      $events->fill($requested_data)->save();
      Toastr::success('Events Created Successfully!', 'Success', ["positionClass" => "toast-bottom-right"]);
      return back();
    }
  }

  //===========PACKAGE===============================
  public function Package()
  {
    $headers['title'] = 'Package';
    $headers['data'] = Package::orderBy('created_at','DESC')->get();
    return view('admin.package.package', $headers);
  }
  public function AddPackage(Request $request)
  {
    $package = new Package;
    $validate = Validator::make($request->all(), $package->validation());
    if ($validate->fails()) {
      Toastr::warning('Validation Failed!', 'Warning', ["positionClass" => "toast-bottom-right"]);
      return back()->withInput()->withErrors($validate);
    } else {

      $requested_data = $request->all();
      if ($request->hasFile('image')) {
        $image_type = $request->file('image')->getClientOriginalExtension();
        $path = "admin_resources/file/";
        $upload_path = public_path('admin_resources/file/');
        $name = time() . "." . $image_type;
        $full_path = $path . $name;
        $request->file('image')->move($upload_path, $name);
        $requested_data = Arr::set($requested_data, 'image', $full_path);
      }

      $package->fill($requested_data)->save();
      Toastr::success('Package Created Successfully!', 'Success', ["positionClass" => "toast-bottom-right"]);
      return back();
    }
  }
  public function PackageEdit($id)
  {
    $headers['title'] = 'Admin Package Edit';
    $headers['data'] = Package::findOrFail($id);
    return view('admin.package.package_edit', $headers);
  }
  public function PackageView($id)
  {
    $headers['title'] = 'Admin Package View';
    $headers['data'] = Package::findOrFail($id);
    return view('admin.package.package_view', $headers);
  }
  public function UpdatePackage(Request $request)
  {
    $package = Package::findOrFail($request->package_id);
    $validate = Validator::make($request->all(), $package->validation());
    if ($validate->fails()) {
      Toastr::warning('Validation Failed!', 'Warning', ["positionClass" => "toast-bottom-right"]);
      return back()->withInput()->withErrors($validate);
    } else {

      $requested_data = $request->all();

      if ($request->hasFile('image')) {

        if (File::exists(public_path($package->image))) {
          File::delete(public_path($package->image));
        }

        $image_type = $request->file('image')->getClientOriginalExtension();
        $path = "admin_resources/file/";
        $upload_path = public_path('admin_resources/file/');
        $name = time() . "." . $image_type;
        $full_path = $path . $name;
        $request->file('image')->move($upload_path, $name);
        $requested_data = Arr::set($requested_data, 'image', $full_path);
      }

      $package->fill($requested_data)->save();
      Toastr::success('Package Updated Successfully!', 'Success', ["positionClass" => "toast-bottom-right"]);
      return back();
    }
  }
  public function DeletePackage($id)
  {
    $data = Package::findOrFail($id);

    if (File::exists(public_path($data->image))) {
      File::delete(public_path($data->image));
    }

    $data->delete();
    Toastr::success('Package Deleted Successfully!', 'Success', ["positionClass" => "toast-bottom-right"]);
    return back();
  }

  //===========BOOKING===============================
  public function Booking(){
    $headers['title'] = 'Booking';
    $headers['data'] = Booking::orderBy('created_at','DESC')->get();
    return view('admin.booking.booking', $headers);
  }
  public function AddBooking(Request $request)
  {
    $booking = new Booking;
    $validate = Validator::make($request->data, $booking->validation());
    if ($validate->fails()) {
      $response = [
        'status' => 201,
        'error' => $validate->errors(),
      ];
    } else {

      $booking->fill($request->data)->save();

      $response = [
        'status' => 200,
      ];
    }
    return response()->json($response);
  }
  public function BookingEdit($id)
  {
    $headers['title'] = 'Admin Booking Edit';
    $headers['data'] = Booking::findOrFail($id);
    return view('admin.booking.booking_edit', $headers);
  }
  public function BookingView($id)
  {
    $headers['title'] = 'Admin Booking View';
    $headers['data'] = Booking::findOrFail($id);
    return view('admin.booking.booking_view', $headers);
  }
  public function UpdateBooking(Request $request)
  {
    $booking = Booking::findOrFail($request->booking_id);
    $validate = Validator::make($request->all(), $booking->validation());
    if ($validate->fails()) {
      Toastr::warning('Validation Failed!', 'Warning', ["positionClass" => "toast-bottom-right"]);
      return back()->withInput()->withErrors($validate);
    } else {

      $booking->fill($request->all())->save();
      Toastr::success('Booking Updated Successfully!', 'Success', ["positionClass" => "toast-bottom-right"]);
      return back();
    }
  }
  public function AddSlide(Request $request)
  {
    $slide = new Slide;
    $validate = Validator::make($request->all(), $slide->validation());
    if ($validate->fails()) {
      Toastr::warning('Validation Failed!', 'Warning', ["positionClass" => "toast-bottom-right"]);
      return back()->withInput()->withErrors($validate);
    } else {

      $requested_data = $request->all();
      if ($request->hasFile('image')) {
        $image_type = $request->file('image')->getClientOriginalExtension();
        $path = "admin_resources/file/";
        $upload_path = public_path('admin_resources/file/');
        $name = time() . "." . $image_type;
        $full_path = $path . $name;
        $request->file('image')->move($upload_path, $name);
        $requested_data = Arr::set($requested_data, 'image', $full_path);
      }
      $slide->fill($requested_data)->save();
      Toastr::success('Slide Created Successfully!', 'Success', ["positionClass" => "toast-bottom-right"]);
      return back();
    }
  }
  public function SlideEdit($id)
  {
    $headers['title'] = 'Admin Slide Edit';
    $headers['data'] = Slide::findOrFail($id);
    return view('admin.slide.slide_edit', $headers);
  }
  public function UpdateSlide(Request $request)
  {
    $slide = Slide::findOrFail($request->slides_id);
//    dd($slide);
    $validate = Validator::make($request->all(), $slide->validation());
    if ($validate->fails()) {
      Toastr::warning('Validation Failed!', 'Warning', ["positionClass" => "toast-bottom-right"]);
      return back()->withInput()->withErrors($validate);
    } else {

      $requested_data = $request->all();

      if ($request->hasFile('image')) {

        if (File::exists(public_path($slide->image))) {
          File::delete(public_path($slide->image));
        }

        $image_type = $request->file('image')->getClientOriginalExtension();
        $path = "admin_resources/file/";
        $upload_path = public_path('admin_resources/file/');
        $name = time() . "." . $image_type;
        $full_path = $path . $name;
        $request->file('image')->move($upload_path, $name);
        $requested_data = Arr::set($requested_data, 'image', $full_path);
      }

      $slide->fill($requested_data)->save();
      Toastr::success('Slide Updated Successfully!', 'Success', ["positionClass" => "toast-bottom-right"]);
      return back();
    }
  }
  public function DeleteSlide($id)
  {
    $data = Slide::findOrFail($id);
    if (File::exists(public_path($data->image))) {
      File::delete(public_path($data->image));
    }
    $data->delete();
    Toastr::success('Slide Deleted Successfully!', 'Success', ["positionClass" => "toast-bottom-right"]);
    return back();
  }

  //===========ALBUM===============================
  public function Album()
  {
    $headers['title'] = 'Album';
    $headers['data'] = Album::get();
    return view('admin.album.album', $headers);
  }
  public function AlbumEdit($id)
  {
    $headers['title'] = 'Admin Album Edit';
    $headers['data'] = Album::findOrFail($id);
    return view('admin.album.album_edit', $headers);
  }
  public function AlbumView($id)
  {
    $headers['title'] = 'Admin View';
    $headers['data'] = Album::findOrFail($id);
    return view('admin.album.album_view', $headers);
  }
  public function AddAlbum(Request $request)
  {
//      dd($request->all());
    $album = new Album;
    $validate = Validator::make($request->all(), $album->validation());
    if ($validate->fails()) {
      Toastr::warning('Validation Failed!', 'Warning', ["positionClass" => "toast-bottom-right"]);
      return back()->withInput()->withErrors($validate);
    } else {
      $album->fill($request->all())->save();
      Toastr::success('Album Created Successfully!', 'Success', ["positionClass" => "toast-bottom-right"]);
      return back();
    }
  }
  public function DeleteAlbum($id)
  {
    $data = Album::findOrFail($id);

    $data->delete();
    Toastr::success('Album Deleted Successfully!', 'Success', ["positionClass" => "toast-bottom-right"]);
    return back();
  }
  public function UpdateAlbum(Request $request)
  {
    $album = Album::findOrFail($request->album_id);
    $validate = Validator::make($request->all(), $album->validation());
    if ($validate->fails()) {
      Toastr::warning('Validation Failed!', 'Warning', ["positionClass" => "toast-bottom-right"]);
      return back()->withInput()->withErrors($validate);
    } else {
      $album->fill($request->all())->save();
      Toastr::success('Album Updated Successfully!', 'Success', ["positionClass" => "toast-bottom-right"]);
      return back();
    }
  }

  //===========GALLERY===============================
  public function Gallery()
  {
    $headers['title'] = 'Gallery';
    $headers['data'] = Gallery::join('album', 'album.album_id', '=', 'gallery.album_id')->select('album.name', 'gallery.*')->get();
    $headers['album'] = Album::all();
    return view('admin.gallery.gallery', $headers);
  }
  public function AddGallery(Request $request)
  {
    $gallery = new Gallery;
    $validate = Validator::make($request->all(), $gallery->validation());
    if ($validate->fails()) {
      Toastr::warning('Validation Failed!', 'Warning', ["positionClass" => "toast-bottom-right"]);
      return back()->withInput()->withErrors($validate);
    } else {

      $requested_data = $request->all();
      if ($request->type == 1 || $request->type == 3) {
        if ($request->hasFile('value')) {
          $image_type = $request->file('value')->getClientOriginalExtension();
          $path = "admin_resources/file/";
          $upload_path = public_path('admin_resources/file/');
          $name = time() . "." . $image_type;
          $full_path = $path . $name;
          $request->file('value')->move($upload_path, $name);
          $requested_data = Arr::set($requested_data, 'value', $full_path);
        }
      }
      if ($request->type == 2) {
        $str_arr = explode("=", $request->value);
        $requested_data = Arr::set($requested_data, 'value', $str_arr[1]);
      }
      $gallery->fill($requested_data);
      $gallery->duration = $request->duration ? $request->duration : 0;
      $gallery->save();
      Toastr::success('Gallery Created Successfully!', 'Success', ["positionClass" => "toast-bottom-right"]);
      return back();
    }
  }
  public function GalleryEdit($id)
  {
    $headers['title'] = 'Admin Gallery Edit';
    $headers['data'] = Gallery::findOrFail($id);
    $headers['album'] = Album::all();
    return view('admin.gallery.gallery_edit', $headers);
  }
  public function GalleryView ($id)
  {
    $headers['title'] = 'Admin Gallery View';
    $headers['data'] = Gallery::join('album','album.album_id','=','gallery.album_id')->findOrFail($id);
    $headers['album'] = Album::all();
    return view('admin.gallery.gallery_view', $headers);
  }

  public function UpdateGallery(Request $request)
  {
    $gallery = Gallery::findOrFail($request->gallery_id);
    $validate = Validator::make($request->all(), $gallery->validation());
    if ($validate->fails()) {
      Toastr::warning('Validation Failed!', 'Warning', ["positionClass" => "toast-bottom-right"]);
      return back()->withInput()->withErrors($validate);
    } else {

      $requested_data = $request->all();
      if ($request->type == 1) {
        if ($request->hasFile('value')) {

          if (File::exists(public_path($gallery->image))) {
            File::delete(public_path($gallery->image));
          }

          $image_type = $request->file('value')->getClientOriginalExtension();
          $path = "admin_resources/file/";
          $upload_path = public_path('admin_resources/file/');
          $name = time() . "." . $image_type;
          $full_path = $path . $name;
          $request->file('value')->move($upload_path, $name);
          $requested_data = Arr::set($requested_data, 'value', $full_path);
        }
      }

      $gallery->fill($requested_data)->save();
      Toastr::success('Gallery Created Successfully!', 'Success', ["positionClass" => "toast-bottom-right"]);
      return back();
    }
  }
  public function DeleteGallery($id)
  {
    $data = Gallery::findOrFail($id);

    if (File::exists(public_path($data->image))) {
      File::delete(public_path($data->image));
    }

    $data->delete();
    Toastr::success('Package Deleted Successfully!', 'Success', ["positionClass" => "toast-bottom-right"]);
    return back();
  }


  //===========PAGES===============================
  public function Pages()
  {
    $headers['title'] = 'Pages';
    $headers['data'] = Pages::orderBy('created_at','DESC')->with('parent_page')->get()->toArray();
    return view('admin.pages.pages', $headers);
  }
  public function PagesEdit($id)
  {
    $headers['title'] = 'Admin Pages Edit';
    $headers['data'] = Pages::findOrFail($id);
    $headers['menu_data'] = Pages::all();
    return view('admin.pages.pages_edit', $headers);
  }
  public function AddPages(Request $request)
  {
    $pages = new Pages;
    $validate = Validator::make($request->all(), $pages->validation());
    if ($validate->fails()) {
      Toastr::warning('Validation Failed!', 'Warning', ["positionClass" => "toast-bottom-right"]);
      return back()->withInput()->withErrors($validate);
    } else {
      $pages->fill($request->all())->save();
      Toastr::success('Pages Created Successfully!', 'Success', ["positionClass" => "toast-bottom-right"]);
      return back();
    }
  }
  public function DeletePages($id)
  {
    $data = Pages::findOrFail($id);

    $data->delete();
    Toastr::success('Social Deleted Successfully!', 'Success', ["positionClass" => "toast-bottom-right"]);
    return back();
  }
  public function UpdatePages(Request $request)
  {
    $pages = Pages::findOrFail($request->pages_id);
    $validate = Validator::make($request->all(), $pages->validation());
    if ($validate->fails()) {
      Toastr::warning('Validation Failed!', 'Warning', ["positionClass" => "toast-bottom-right"]);
      return back()->withInput()->withErrors($validate);
    } else {
      $pages->fill($request->all())->save();
      Toastr::success('Pages Updated Successfully!', 'Success', ["positionClass" => "toast-bottom-right"]);
      return back();
    }
  }


  //============BLOG=================
  public function CustomerFeedBack()
  {
    $headers['title'] = 'Blog';
    $headers['data'] = CustomerFeedback::orderBy('created_at','DESC')->get();
    return view('admin.customer_feedback.customer_feedback', $headers);
  }
  public function CustomerFeedBackEdit($id)
  {
    $headers['title'] = 'Admin Customer Feedback Edit';
    $headers['data'] = CustomerFeedback::findOrFail($id);
    return view('admin.customer_feedback.customer_feedback_edit', $headers);
  }
  public function CustomerFeedBackView($id)
  {
    $headers['title'] = 'Admin Customer Feedback View';
    $headers['data'] = CustomerFeedback::findOrFail($id);
    return view('admin.customer_feedback.customer_feedback_view', $headers);
  }
  public function AddCustomerFeedBack(Request $request)
  {
    $requested_data = $request->data;
    $feedback = new CustomerFeedback;
    $validate = Validator::make($requested_data, $feedback->validation());
    if ($validate->fails()) {
      $response = [
        'status' => 201,
        'error' => $validate->errors(),
      ];
    } else {

      $position = strpos($request['data']['image'], ";");
      $sub_str = substr($request['data']['image'], 0, $position);
      $extenstion = explode("/", $sub_str);
      $upload_path = public_path() . "/admin_resources/file/" . time() . "." . $extenstion[1];
      $path = "admin_resources/file/" . time() . "." . $extenstion[1];
      $image_upload = Image::make($request['data']['image'])->resize(400, 400);
      $image_upload->save($upload_path);
      $requested_data = array_set($requested_data, 'image', $path);

      $feedback->fill($requested_data)->save();
      $response = [
        'status' => 200,
      ];
    }
    return response()->json($response);
  }
  public function UpdateCustomerFeedBack(Request $request)
  {
//    dd($request->all());
    $blog = CustomerFeedback::findOrFail($request->blog_id);
    $validate = Validator::make($request->all(), $blog->validation());
    if ($validate->fails()) {
      Toastr::warning('Validation Failed!', 'Warning', ["positionClass" => "toast-bottom-right"]);
      return back()->withInput()->withErrors($validate);
    } else {


      $requested_data = $request->all();
      if ($request->hasFile('image')) {
        if (File::exists(public_path($blog->image))) {
          File::delete(public_path($blog->image));
        }

        $image_type = $request->file('image')->getClientOriginalExtension();
        $path = "admin_resources/file/";
        $upload_path = public_path('admin_resources/file/');
        $name = time() . "." . $image_type;
        $full_path = $path . $name;
        $request->file('image')->move($upload_path, $name);
        $requested_data = Arr::set($requested_data, 'image', $full_path);
      }
      $requested_data = Arr::set($requested_data, 'entry_by', Auth::user()->id);

      $blog->fill($requested_data)->save();
      Toastr::success('Events Update Successfully!', 'Success', ["positionClass" => "toast-bottom-right"]);
      return back();
    }
  }
  public function DeleteCustomerFeedBack($id)
  {
    $data = CustomerFeedback::findOrFail($id);

    if (File::exists(public_path($data->image))) {
      File::delete(public_path($data->image));
    }

    $data->delete();
    Toastr::success('Feedback Deleted Successfully!', 'Success', ["positionClass" => "toast-bottom-right"]);
    return back();
  }
  public function StatusCustomerFeedBack($id)
  {
    $data = CustomerFeedback::findOrFail($id);

    if ($data->status == 1) {
      $data->status = 0;
      $data->save();
    } else {
      $data->status = 1;
      $data->save();
    }
    Toastr::success('Feedback Status Change!', 'Success', ["positionClass" => "toast-bottom-right"]);
    return back();
  }

  //============== Messege ==========
  public function CustomerMessage(){
    $headers['title'] = 'Customer Message';
    $headers['data'] = CustomerMessage::orderBy('created_at','DESC')->get();
    return view('admin.customer_message.customer_message', $headers);
  }
  public function AddCustomerMessage(Request $request)
  {
    $customer_message = new CustomerMessage;
    $validate = Validator::make($request->data, $customer_message->validation());
    if ($validate->fails()) {
      $response = [
        'status' => 201,
        'error' => $validate->errors(),
      ];
    } else {

      $customer_message->fill($request->data)->save();

      $response = [
        'status' => 200,
      ];
    }
    return response()->json($response);
  }
  public function CustomerMessageEdit($id)
  {
    $headers['title'] = 'Customer Message';
    $headers['data'] = CustomerMessage::findOrFail($id);
    return view('admin.customer_message.customer_message_edit', $headers);
  }
  public function CustomerMessageView($id)
  {
    $headers['title'] = 'Customer Message';
    $headers['data'] = CustomerMessage::findOrFail($id);
    return view('admin.customer_message.customer_message_view', $headers);
  }
  public function UpdateCustomerMessage(Request $request)
  {
    $customer_msg = CustomerMessage::findOrFail($request->customer_message_id);
    $validate = Validator::make($request->all(), $customer_msg->validation());
    if ($validate->fails()) {
      Toastr::warning('Validation Failed!', 'Warning', ["positionClass" => "toast-bottom-right"]);
      return back()->withInput()->withErrors($validate);
    } else {

      $customer_msg->fill($request->all())->save();
      Toastr::success('Customer Message Updated Successfully!', 'Success', ["positionClass" => "toast-bottom-right"]);
      return back();
    }
  }
  public function DeleteCustomerMessage($id)
  {
    $data = CustomerMessage::findOrFail($id);


    $data->delete();
    Toastr::success('Message Deleted Successfully!', 'Success', ["positionClass" => "toast-bottom-right"]);
    return back();
  }

  //===========/Comment/===============================
  public function Comment($id)
  {
    $headers['title'] = 'Comments';
    $headers['data'] = Comments::where('blog_id', $id)->get();
    return view('admin.comment.comment', $headers);
  }
  public function AddComment(Request $request)
  {
    $comment = new Comments;
    $validate = Validator::make($request->data, $comment->validation());
    if ($validate->fails()) {
      $response = [
        'status' => 201,
        'error' => $validate->errors(),
      ];
    } else {
      $comment->fill($request->data)->save();
      $response = [
        'status' => 200,
        'data' => $comment,
      ];
    }
    return response()->json($response);
  }
  public function CommentStatus($id)
  {
    $data = Comments::findOrFail($id);
    if ($data->status == 1) {
      $data->status = 0;
      $data->save();
    } else {
      $data->status = 1;
      $data->save();
    }
    Toastr::success('Feedback Status Change!', 'Success', ["positionClass" => "toast-bottom-right"]);
    return back();
  }
  public function DeleteComment($id)
  {
    $data = Comments::findOrFail($id);
    $data->delete();
    Toastr::success('Comment Deleted Successfully!', 'Success', ["positionClass" => "toast-bottom-right"]);
    return back();
  }

  //===========Subscriber================
  public function Subscriber()
  {
    $headers['title'] = 'Subscriber';
    $headers['data'] = Subscriber::orderBy('created_at','DESC')->get();
    return view('admin.subscriber.subscriber', $headers);
  }
  public function SubscriberStatus($id)
  {
    $data = Subscriber::findOrFail($id);
    if ($data->status == 1) {
      $data->status = 0;
      $data->save();
    } else {
      $data->status = 1;
      $data->save();
    }
    Toastr::success('Subscriber Status Change!', 'Success', ["positionClass" => "toast-bottom-right"]);
    return back();
  }
  public function DeleteSubscriber($id)
  {
    $data = Subscriber::findOrFail($id);
    $data->delete();
    Toastr::success('Subscriber Deleted Successfully!', 'Success', ["positionClass" => "toast-bottom-right"]);
    return back();
  }

  //===========Offer===============================
  public function Offer()
  {
    $headers['title'] = 'Offer';
    $headers['data'] = Offer::orderBy('created_at','DESC')->get();
    return view('admin.offer.offer', $headers);
  }
  public function AddOffer(Request $request)
  {
    $offer = new Offer;
    $validate = Validator::make($request->all(), $offer->validation());
    if ($validate->fails()) {
      Toastr::warning('Validation Failed!', 'Warning', ["positionClass" => "toast-bottom-right"]);
      return back()->withInput()->withErrors($validate);
    } else {

      $requested_data = $request->all();
      if ($request->hasFile('image')) {
        $image_type = $request->file('image')->getClientOriginalExtension();
        $path = "admin_resources/file/";
        $upload_path = public_path('admin_resources/file/');
        $name = time() . "." . $image_type;
        $full_path = $path . $name;
        $request->file('image')->move($upload_path, $name);
        $requested_data = Arr::set($requested_data, 'image', $full_path);
      }

      $offer->fill($requested_data)->save();
      Toastr::success('Package Created Successfully!', 'Success', ["positionClass" => "toast-bottom-right"]);
      return back();
    }
  }
  public function OfferEdit($id)
  {
    $headers['title'] = 'Admin Offer Edit';
    $headers['data'] = Offer::findOrFail($id);
    return view('admin.offer.offer_edit', $headers);
  }
  public function OfferView($id)
  {
    $headers['title'] = 'Admin Offer View';
    $headers['data'] = Offer::findOrFail($id);
    return view('admin.offer.offer_view', $headers);
  }
  public function UpdateOffer(Request $request)
  {
    $offer = Offer::findOrFail($request->offer_id);
    $validate = Validator::make($request->all(), $offer->validation());
    if ($validate->fails()) {
      Toastr::warning('Validation Failed!', 'Warning', ["positionClass" => "toast-bottom-right"]);
      return back()->withInput()->withErrors($validate);
    } else {

      $requested_data = $request->all();

      if ($request->hasFile('image')) {

        if (File::exists(public_path($offer->image))) {
          File::delete(public_path($offer->image));
        }

        $image_type = $request->file('image')->getClientOriginalExtension();
        $path = "admin_resources/file/";
        $upload_path = public_path('admin_resources/file/');
        $name = time() . "." . $image_type;
        $full_path = $path . $name;
        $request->file('image')->move($upload_path, $name);
        $requested_data = Arr::set($requested_data, 'image', $full_path);
      }

      $offer->fill($requested_data)->save();
      Toastr::success('Package Updated Successfully!', 'Success', ["positionClass" => "toast-bottom-right"]);
      return back();
    }
  }
  public function DeleteOffer($id)
  {
    $data = Offer::findOrFail($id);

    if (File::exists(public_path($data->image))) {
      File::delete(public_path($data->image));
    }

    $data->delete();
    Toastr::success('Offer Deleted Successfully!', 'Success', ["positionClass" => "toast-bottom-right"]);
    return back();
  }
}

