@extends('layouts.manager.app')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('/css/user_list.css?cacherefResh19111')}}">
@endsection

@section('main')
    <div id="mainBlk" class="sideSpace">
        <div class="main-body">
            <div class="scroll">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="column">店舗名</th>
                            <th class="column">password</th>
                            <th class="link">削除</th>
                        </tr>
                    </thead>
                    @if (count($managers))
                        <tbody>
                            @foreach ($managers as $manager)
                                @if($manager ->manager_id != 1)
                                    <tr  class="record">
                                        <th score="row">{{$manager->store_name}}</th>
                                        <td>{{$manager->password}}</td>        
                                        <td><a class ="lineHeight fontRed" href="{{ '/manager/delete_manager'.'/'.$manager->manager_id }}">削除</a></td>
                                    </tr> 
                                @endif
                            @endforeach
                        </tbody>
                    @else
                        <p class="noColumn">登録された情報はありません</p>
                    @endif
                </table>
            </div>
        </div>
        <div class="linkList">
            @if(Auth::guard('manager')->user()->manager_id == 1)
                <a href="{{ route('manager.createForm') }}" class="linkBtn">店舗登録</a>
            @else
                <a href="{{ route('user_list') }}" class="linkBtn">ユーザ一覧</a>
            @endif
            <a href="{{ route('manager.logout') }}" class="linkBtn">ログアウト</a>
        </div>
    </div>
@endsection
