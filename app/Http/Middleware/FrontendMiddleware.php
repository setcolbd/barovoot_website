<?php

namespace App\Http\Middleware;

use App\BlogModel;
use App\ConfigurationModel;
use App\Models\CustomerFeedback;
use App\Models\Gallery;
use App\Models\Pages;
use App\SocialModel;
use Closure;

class FrontendMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
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
      $social = SocialModel::all();
      $pages = Pages::all();
      $blog = BlogModel::leftJoin('users','users.id','=','blog.entry_by')->select('blog.*','users.name AS author_name')->get();
      $gallery_image = Gallery::orderBy('created_at', 'DESC')->get()->toArray();
      $customer_feedback = CustomerFeedback::whereStatus(1)->get();
//      $gallery_image = Gallery::orderBy('created_at', 'DESC')->where('type',1)->limit(6)->get();
      view()->share('config_data', $config_data);
      view()->share('config_head', $config_head);
      view()->share('gallery_image', $gallery_image);
      view()->share('customer_feedback', $customer_feedback);
      view()->share('social', $social);
      view()->share('pages', $pages);
      view()->share('blog', $blog);
      view()->share('public_path', url()->current().'/public');

      return $next($request);
    }
}
