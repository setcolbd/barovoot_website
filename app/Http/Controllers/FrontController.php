<?php

namespace App\Http\Controllers;

use App\BlogModel;
use App\ConfigurationModel;
use App\EventsModel;
use App\Models\Comments;
use App\Models\CustomerFeedback;
use App\Models\Gallery;
use App\Models\Offer;
use App\Models\Package;
use App\Models\Slide;
use App\Models\Subscriber;
use App\SocialModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FrontController extends Controller
{
    public function index(){
        $headers['title'] = 'Barovoot';
        $headers['slider'] = Slide::all();
        $headers['event'] = EventsModel::orderBy('events_id', 'DESC')->get();
        $headers['package'] = Package::all();
        $headers['gallery_video'] = Gallery::orderBy('created_at', 'DESC')->where('type',2)->get();

        return view('front.index',$headers);

    }

    public function GetAudio()
    {

        $gallery = Gallery::orderBy('created_at', 'DESC')->where('type',3)->get();

        $array = [];
        foreach ($gallery as $key => $gallery_data){
          $array[$key]['track'] = $key+1;
          $array[$key]['name'] = $gallery_data->title;
          $array[$key]['duration'] = $gallery_data->duration;
          $array[$key]['file'] = $gallery_data->value;
        }

        return response()->json($array);
    }

    public function photo()
    {
      $headers['title'] = 'Barovoot Photos';
      return view('front.pages.photo_gallery',$headers);
    }

    public function videos()
    {
      $headers['title'] = 'Barovoot Videos';
      $headers['gallery_video'] = Gallery::orderBy('created_at', 'DESC')->where('type',2)->get();
      return view('front.pages.video_gallery',$headers);
    }

    public function blog()
    {
      $headers['title'] = 'Barovoot Blogs';
      $headers['blog_data'] = BlogModel::paginate(10);
      return view('front.pages.blog',$headers);
    }

    public function blog_details($id)
    {
      $headers['title'] = 'Barovoot Blogs';
      $headers['blog_data'] = BlogModel::leftJoin('users','users.id','=','blog.entry_by')->select('blog.*','users.name AS author_name')->findOrFail($id);

      $headers['latest_blog'] = BlogModel::orderBy('created_at', 'DESC')->take(5)->get();
      return view('front.pages.blog_details',$headers);
    }

    public function about_us()
    {
      $headers['title'] = 'Barovoot';
      $headers['blog_data'] = BlogModel::orderBy('created_at', 'DESC')->paginate(10);
      $headers['offer'] = Offer::orderBy('created_at', 'DESC')->get();
      $headers['package'] = Package::all();

      return view('front.pages.about_us',$headers);
    }

    public function events()
    {
      $headers['title'] = 'Barovoot Events';
      $headers['event'] = EventsModel::paginate(10);
      return view('front.pages.events',$headers);
    }

    public function event_details($id)
    {
      $headers['title'] = 'Barovoot Events';
      $headers['data'] = EventsModel::findOrFail($id);
      $headers['latest_blog'] = BlogModel::orderBy('created_at', 'DESC')->take(5)->get();
      return view('front.pages.event_details',$headers);
    }

    public function contact_us()
    {
      $headers['title'] = 'Barovoot';
      return view('front.pages.contact_us',$headers);
    }

    public function GetComment($id)
    {
      return Comments::where('blog_id',$id)->where('status',1)->with('reply')->get();
    }

    public function AddSubscriber(Request $request)
    {
        $data = new Subscriber;
        $validate = Validator::make($request->data, $data->validation());
        if ($validate->fails())
        {
          $response = [
            'status' => 201,
            'error' => $validate->errors(),
          ];
        }
        else
        {
          $data->fill($request->data)->save();
          $response = [
            'status' => 200,
          ];
        }
        return response()->json($response);
    }
}
