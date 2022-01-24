<?php


namespace App\Http\Helpers;


use App\Models\Category;
use App\Models\MenuDetail;
use App\Models\Page;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

trait ControllerHelper
{
    public function returnMaxTimeAttemptMessage($seconds)
    {
        $data = '<div class="text-danger"><span>Too many login attempts. Please try again in after </span><span id="countdown">' . $seconds . '</span><span> seconds</span></div><script>
    var timeleft = parseInt("' . $seconds . '");var downloadTimer = setInterval(function(){document.getElementById("countdown").innerHTML = timeleft;timeleft -= 1;if(timeleft <= 0){location.reload();}}, 1000);</script>';
        return $data;
    }

    public function Alert($type, $message, $time = 2000)
    {
        Session::flash('type', $type);
        Session::flash('message', $message);
        Session::flash('time', $time);
    }
}
