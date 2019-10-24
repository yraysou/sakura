<?php

namespace App\Http\Controllers\Manager;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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

    public function delete($user_id,$keyword = null) {
        $manager_id = Auth::guard('manager')->user()->manager_id;
        $user = DB::table('users')
                        ->leftjoin(
                            'manager',
                            'users.manager_id','=','manager.manager_id')
                        ->where([['users.id',$user_id]])
                        ->first();
                        // dump($user);
                        // exit;
        Storage::deleteDirectory("/public"."/".$user->store_name."/".$user->user_id);
        User::destroy($user_id);

        if(!empty($keyword))
        {   
            //  ユーザーから検索
            $users = DB::table('users')
                    ->where('user_id','like','%'.$keyword.'%')
                    ->orwhere('name','like', '%'.$keyword.'%')
                    ->orwhere('tel_number','like', '%'.$keyword.'%')
                    ->where("manager_id",$manager_id)
                    ->latest()
                    ->get();

        }else{//キーワードが未入力の場合
            $users = DB::table('users')
                    ->where("manager_id",$manager_id)
                    ->latest()
                    ->get();
        }
        //検索フォームへ
        return view('manager/user_list',[
            'users' => $users,
            'keyword' => $keyword,
            ]);
        // $users = User::orderBy('created_at', 'desc')->get();
        // return view('manager.user_list', [
        //     'users' => $users,
        
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

    public function userListSearch(Request $request)
    {
        if(Auth::guard('manager')->check()) {
            //キーワード取得
            $keyword = $request->input('keyword');          
            // マネージャーIDを取得
            $manager_id = Auth::guard('manager')->user()->manager_id;
            
            //キーワード入力されている場合
            if(!empty($keyword))
            {   
                //  ユーザーから検索
                $users = DB::table('users')
                        ->where('user_id','like','%'.$keyword.'%')
                        ->orwhere('name','like', '%'.$keyword.'%')
                        ->orwhere('tel_number','like', '%'.$keyword.'%')
                        ->where("manager_id",$manager_id)
                        // データ降順表示
                        ->latest()
                        ->get();

            }else{//キーワードが未入力の場合
                $users = DB::table('users')
                        ->where("manager_id",$manager_id)
                        // データ降順表示
                        ->latest()
                        ->get();
            }
            //検索フォームへ
            return view('manager/user_list',[
                'users' => $users,
                'keyword' => $keyword,
                ]);
                
        }else {
            return redirect()->route('manager.loginpage');
        }    
    }
}
