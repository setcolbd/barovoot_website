<?php

namespace App\Http\Middleware\Admin;
use App\ConfigurationModel;
use Illuminate\Support\Facades\Auth;
use Closure;

class AdminAuthCheckMiddleware
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
        if (Auth::check()) {

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

          return $next($request);
        }
        else
        {
          return redirect(route('admin.login'));
        }
    }
}
