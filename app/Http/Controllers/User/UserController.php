<?php

namespace App\Http\Controllers\User;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Manager;
use DB;

class UserController extends Controller
{
    //
    public function show(){
        if(Auth::check()){
            $users = User::find(Auth::id());
            $manager = Manager::find($users->manager_id);
            $agreement = $users->agreement_status;
            if($agreement == 1){
                return view('user.mypage',[
                    'users' => $users,
                    'manager' => $manager,
                ]); 
            }else{
                return view('user/agreement');
            }   
        }else{
            return redirect()->route('user.loginpage');
        }
    }

    // 利用規約
    public function agreement(){
        if(Auth::check()){
            $users = User::find(Auth::id());
            $agreement = $users->agreement_status;
            if($agreement == 1){
                return redirect()->route('userpage');
            }else{
                return view('user/agreement');
            }
        }else{
            return redirect()->route('user.loginpage');
        }  
    }

    //  利用規約リダイレクト
    public function changeStatus(Request $request){
        if(Auth::check()){
            $users = User::find(Auth::id());
            $users->agreement_status = $request->agreement_status;
            $users->save();
            return redirect()->route('userpage');
        }else {
            return view('user/agreement');
        }  
    }
}
