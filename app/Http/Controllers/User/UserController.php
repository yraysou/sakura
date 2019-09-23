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
            return view('user.mypage',[
                'users' => $users,
                'manager' => $manager,
            ]); 
        }else{
            return redirect()->route('user.loginpage');
        }
    }
}
