<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;
use App\Rules\Captcha;
use Auth;
use Session;
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
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function validateLogin(Request $request)
    {

        $validate=$this->validate($request, [
            $this->username() => 'required', 
            'password' => 'required',
            'captchavalue'=>'captcha',
        ],
        [
            'captchavalue.captcha'=>'Incorrect Captcha.Try again'
        ]);

    }

    protected function attemptLogin(Request $request)
    {
       
        return $this->guard()->attempt(
            $this->credentials($request)
        );
    }

    public function logout(Request $request) {
        Auth::logout();
        $dd=Session::put('newlang','en'); 
        return redirect('/login');
    }
}
