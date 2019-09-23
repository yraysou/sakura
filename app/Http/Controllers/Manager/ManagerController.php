<?php

namespace App\Http\Controllers\Manager;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Manager;
use DB;
use Carbon\Carbon;



class ManagerController extends Controller
{

    public function user_insert() {
        if(Auth::guard('manager')->check()) {
            $user_id = sprintf("%06d",mt_rand(0,999999));
            $pw = substr(str_shuffle('1234567890abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 8);
            $dt = Carbon::now()->toDateString();
            $manager_id = Auth::guard('manager')->user()->manager_id;
            return view('manager.user_insert',[
                "user_id" => $user_id,
                "pw" => $pw,
                "dt" => $dt,
                "manager_id" => $manager_id
            ]);
        }else{
            return redirect()->route('manager.loginpage');
        }
    }

    //ユーザの一覧を取得
    public function show() {
        if(Auth::guard('manager')->check()) {
            $manager_id = Auth::guard('manager')->user()->manager_id;
            //全てのデータを取得する
            $users = User::orderBy('created_at', 'desc')
                ->where("manager_id",$manager_id)
                ->get();
            return view('manager.user_list', [
                'users' => $users,
            ]);
        }else {
            return redirect()->route('manager.loginpage');
        }
        
    }

    public function detail($user_id) {
        if(Auth::guard('manager')->check()) {
            $users = User::find($user_id);
            $manager = Auth::guard('manager')->user();
            return view('manager.user_detail',[
                'users' => $users,
                'manager' => $manager,
            ]);
        }else {
            return redirect()->route('manager.loginpage');
        }
    }

    public function delete($user_id) {
        User::destroy($user_id);
        $users = User::orderBy('created_at', 'desc')->get();
        return view('manager.user_list', [
            'users' => $users,
        ]);
    }

    public function managerList() {
        $managers =  Manager::get();
        return view('manager.manager_list',[
            'managers' => $managers
        ]);
    }

    public function deleteManager($manager_id) {
        Manager::destroy($manager_id);
        $managers =  Manager::get();
        return view('manager.manager_list',[
            'managers' => $managers
        ]);
    }
}
