<?php

namespace App\Http\Controllers\Admin;

use App\Http\Helpers\ControllerHelper;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    use ControllerHelper;

    public function loginForm(){
        $headers['title'] = 'Login';
        return view('admin.login', $headers);
    }

    public function DoLogin(Request $request){
        try {
            if ($this->hasTooManyLoginAttempts($request)) {
                $this->fireLockoutEvent($request);
            }
            $credentials = array(
                'email' => $request->input('email'),
                'password' => $request->input('password'),
            );
            $remember = $request->input('remember') ? $request->input('remember') : false;

            $limit = $this->limiter()->attempts($this->throttleKey($request));
            if ($limit <= $this->maxAttempts()){
                if (Auth::attempt($credentials, $remember)) {
                    return redirect(route('admin.home'));
                }else{
                    $this->incrementLoginAttempts($request);
                    Session::flash('message', '<div class="text-danger">Login Failed</div>');
                    return redirect(route('admin.login'));
                }
            }else{
                $seconds = $this->limiter()->availableIn(
                    $this->throttleKey($request)
                );
                Session::flash('seconds', $seconds);
                Session::flash('message', $this->returnMaxTimeAttemptMessage($seconds));
                return redirect(route('admin.login'));
            }

        } catch (\Exception $exception) {
            dd($exception->getMessage());
        }
    }

}
