<?php

namespace App\Http\Controllers\User\Auth;

use Auth;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    //ログインした後のレダイレクト先

    protected $redirectTo = '/user/agreement/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('guest')->except('logout');
    // }

    public function showLoginForm()
    {
        if(Auth::check()) {
            return redirect()->route('userpage');
        }else {
            return view('user.login');  //変更
        }
    }

    public function username()
    {
        return 'user_id';
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('user.loginpage');
    }
}
