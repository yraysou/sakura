<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
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
                'manager_id'      => 'required|integer',
                'shooting_date' => 'required|date',
            ];

            $messages = [
                'user_id.required'   => 'user_idは必ず入力してください。',
                'name.required'      => '名前は必ず入力してください。',
                'password.required'  => 'パスワードは必ず入力してください。',
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
            $user->manager_id = $request->manager_id;

            //写真の保存名
            $userId = $request->user_id; 
            $store_name = Auth::guard('manager')->user()->store_name;

            //ディレクトリの作成
            if (!file_exists(public_path()."/image"."/".$userId)) { 
                mkdir(public_path()."/image"."/".$store_name."/".$userId, 0777, TRUE);
            }

            if($request->original){
                //ファイル名の作成
                $original = uniqid("original_") . "_" . $request->original->getClientOriginalName();
                //ファイルの保存
                $request->original->move(public_path()."/image"."/".$store_name."/".$userId, $original);
                //DBに登録
                $user->original = $original;
            }
            //印刷用写真
            if($request->print){
                $print = uniqid("print_") . "_" . $request->print->getClientOriginalName();
                $request->print->move(public_path()."/image"."/".$store_name."/".$userId, $print);
                $user->print = $print;
            }

            if($request->se){
                //SE用写真
                $se = uniqid("se_") . "_" . $request->se->getClientOriginalName();
                $request->se->move(public_path()."/image"."/".$store_name."/".$userId, $se);
                $user->se = $se;
            }

            $after_half_year = Carbon::parse($request->shooting_date)->addMonth(6);
            $user->shooting_date = $request->shooting_date;
            $user->after_half_year = $after_half_year;
            $user->save();
            // User::create([
            //     'user_id' => $request->user_id,
            //     'name' => $request->name,
            //     'password' => Hash::make($request->password),
            //     'conf_pass' => $request->password,
            //     'manager_id' => $request->manager_id,
            //     'original' => $original,
            //     'print' => $print,
            //     'se' => $se,
            //     'shooting_date' => $request->shooting_date,
            //     'after_half_year' => $after_half_year
            // ]);

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
            return redirect()->route('user_list');
        }else{
            return redirect()->route('manager.loginpage');
        }
    }
}
