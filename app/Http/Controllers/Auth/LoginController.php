<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Login;
use App\Providers\RouteServiceProvider;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except(['logout', 'userLogout']);
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }


    /**
     * Get the needed authorization credentials from the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        if (is_numeric($request->email)) {
            return ['phone'=>$request->email,'password'=>$request->password, 'isactive' => 1];
        }elseif($request->email){
            return ['staffnumb'=>$request->email,'password'=>$request->password, 'isactive' => 1];
        }
        return $request->only($this->username(), 'password');
    }


    public function userLogout(Request $request)
    {
        if (Auth::check()) {
             //updating the last login time of the user
        $user=User::find(auth()->user()->id);
        $user->last_login_at=$user->login_at;
        $user->save();

        //logging user out
        Auth::logout();

        header("cache-Control: no-store, no-cache, must-revalidate");
        header("cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");

        return redirect(route('login'))->with('success','You have logged out successsfully!');
            
        }        
         return redirect(route('login'));
       
    }



    protected function authenticated(Request $request, $user)
    {
       
            //saving the users last login and ip address
            $user->login_at=Carbon::now()->toDateTimeString();
            $user->last_login_ip=$request->getClientIp();
            $user->save();

            Auth::logoutOtherDevices($request->password);
                        
            return redirect()->route('home');

    }

    protected function sendLoginResponse(Request $request)
    {
        //getting user details while logging in
        $login=new Login;
        $login->user_id=auth()->id();
        $login->ipaddress=$request->getClientIp();
        $login->device=$request->userAgent();
        $login->save();

        $request->session()->regenerate();

        $this->clearLoginAttempts($request);

        if ($response = $this->authenticated($request, $this->guard()->user())) {
            return $response;
        }

        return $request->wantsJson()
                    ? new JsonResponse([], 204)
                    : redirect()->intended($this->redirectPath());
    }
}
