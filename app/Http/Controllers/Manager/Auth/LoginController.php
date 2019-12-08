<?php

namespace App\Http\Controllers\Manager\Auth;

use Auth;
use App\Models\Manager;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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

    protected $redirectTo = '/manager/user_list/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    // public function __construct()
    // {
    //     $this->middleware('guest:manager')->except('logout'); //変更
    // }

    public function showLoginForm()
    {
        if(Auth::guard('manager')->check()) {
            if(Auth::guard('manager')->user()->manager_id == 1){
                return redirect()->route('manager_list');
            }else{
                return redirect()->route('user_list');
            }
        }else {
            return view('manager.login');
        }
    }

    public function guard()
    {
        return Auth::guard('manager');
    }

    public function login(Request $request)
    {
        $manager = Manager::Where('store_name',$request->store_name)
            ->where('password',$request->password)
            ->where('withdraw_status', false)
            ->first();
            // dd($manager);
        if($manager){
            Auth::guard('manager')->login($manager, true);
            if($manager->manager_id == 1){
                return redirect()->route('manager_list');
            }else{
                return redirect()->route('user_list');
            }
        }else{
            return redirect()->route('manager.loginpage');
        }
    }

    public function logout()
    {
        Auth::guard('manager')->logout();  //変更
        return redirect()->route('manager.loginpage');  //変更
    }
}
