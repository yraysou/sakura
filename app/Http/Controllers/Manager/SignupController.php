<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Validator;
use Auth;
use App\Models\User;
use App\Models\Manager;
use Carbon\Carbon;

class SignupController extends Controller
{
    //user作成
    public function userCreate(Request $request){
        if(Auth::guard('manager')->check()) {
            $rules = [
                'user_id'   => 'required|max:25',
                'name'      => 'required|max:25',
                'password' => 'required|string|min:6',
                'tel_number'      => 'required|max:25',
                'manager_id'      => 'required|integer',
                'shooting_date' => 'required|date',
            ];

            $messages = [
                'user_id.required'   => 'user_idは必ず入力してください。',
                'name.required'      => '名前は必ず入力してください。',
                'password.required'  => 'パスワードは必ず入力してください。',
                'tel_number.required' => ' 電話番号は必ず入力してください。',
                'manager_id.required' => 'idは数値で入力してください。',
                'shooting_date.required' => '撮影日は必ず入力してください。'

            ];
            
            $validator = Validator::make($request->all(),$rules,$messages);

            if($validator->fails()){
                return redirect('/manager/user_insert')
                    ->withErrors($validator)
                    ->withInput();
            };

            $user = new User();
            $user->user_id = $request->user_id;
            $user->name = $request->name;
            $user->password = Hash::make($request->password);
            $user->conf_pass = $request->password;
            $user->tel_number = $request->tel_number;    
            $user->manager_id = $request->manager_id;

            //写真の保存名
            $userId = $request->user_id; 
            $store_name = Auth::guard('manager')->user()->store_name;

            // ディレクトリ作成
            if($request->original){
                $user->original = $request->file('original')->store('public/'.$store_name."/".$userId);
            }
            //印刷用写真
            if($request->print){
                $user->print = $request->file('print')->store('public/'.$store_name."/".$userId);
            }
            // se用写真
            if($request->se){
                $user->se = $request->file('se')->store('public/'.$store_name."/".$userId);
            }

            $after_half_year = Carbon::parse($request->shooting_date)->addMonth(6);
            $user->shooting_date = $request->shooting_date;
            $user->after_half_year = $after_half_year;
            $user->save();

            
            //リダイレクト
            return redirect()->route('user_list');
        } else {
            return redirect()->route('manager.loginpage');
        }

    }

    public function managerCreateForm() {
        if(Auth::guard('manager')->check()) {
            return view('manager.manager_create_form');
        }else{
            return redirect()->route('manager.loginpage');
        }
    }

    public function managerCreate(Request $request) {
        if(Auth::guard('manager')->check()) {
            $rules = [
                'store_name'   => 'required|max:25',
                'password' => 'required|string|min:6',
            ];

            $messages = [
                'store_name.required'   => '店舗名は必ず入力してください。',
                'password.required'  => 'パスワードは必ず入力してください。',
            ];

            $validator = Validator::make($request->all(),$rules,$messages);
            if($validator->fails()){
                return redirect()->route('manager.createForm')
                    ->withErrors($validator)
                    ->withInput();
            };
            $manager = new Manager();
            $manager->store_name = $request->store_name;
            $manager->password = $request->password;
            $manager->save();
            return redirect()->route('manager_list');
        }else{
            return redirect()->route('manager.loginpage');
        }
    }
}
