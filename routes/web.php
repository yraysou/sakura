<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*-----------------------------
*userの処理
------------------------------*/
// userログイン

Route::get('/user', 'User\Auth\LoginController@showLoginForm')->name('user.loginpage');

Route::post('/user/login', 'User\Auth\LoginController@login')->name('user.login');

Route::get('/user/logout', 'User\Auth\LoginController@logout')->name('user.logout');

// ユーザ表示画面
Route::get('/user/mypage/', 'User\UserController@show')->name('userpage');

// 利用規約
Route::get('/user/agreement/', 'User\UserController@agreement')->name('agreement');

Route::post('/user/changeStatus/', 'User\UserController@changeStatus')->name('chageStatus');

/*-----------------------------mypage
*managerの処理
------------------------------*/
// managerログイン
Route::get('/', 'Manager\Auth\LoginController@showLoginForm')->name('manager.loginpage');

Route::post('/manager/login', 'Manager\Auth\LoginController@login')->name('manager.login');

Route::get('/manager/logout', 'Manager\Auth\LoginController@logout')->name('manager.logout');

// 店舗登録
Route::get('/manager/managerCreateForm','Manager\SignupController@managerCreateForm')->name('manager.createForm');
Route::post('/manager/managerCreate','Manager\SignupController@managerCreate')->name('manager.create');

// 店舗一覧
Route::get('manager/manager_list','Manager\ManagerController@managerList')->name('manager_list');

// 店舗削除
Route::get('/manager/delete_manager/{manager_id}','Manager\ManagerController@deleteManager')->name('manager_delete');

// 新規登録処理
Route::post('/sign_up', 'Manager\SignupController@userCreate')->name('user.create');

// 管理者表示画面
Route::get('/manager/user_insert', 'Manager\ManagerController@user_insert')->name('user_insert');

// ユーザ一覧画面
Route::get('/manager/user_list','Manager\ManagerController@userListSearch')->name('user_list');

// ユーザ詳細画面
Route::get('/manager/user_detail/{user_id}','Manager\ManagerController@detail')->name('user_detail');

// ユーザ削除
Route::get('/manager/delete/{user_id}/{keyword?}','Manager\ManagerController@delete')->name('user_delete');
