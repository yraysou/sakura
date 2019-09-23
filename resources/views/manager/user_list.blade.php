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
                            <th class="column">id</th>
                            <th class="column">名前</th>
                            <th class="column">撮影日</th>
                            <th class="link">詳細</th>
                            <th class="link">削除</th>
                        </tr>
                    </thead>
                    @if (count($users))
                        <tbody>
                            @foreach ($users as $user)
                                <tr class="record">
                                    <th score="row">{{$user->user_id}}</th>
                                    <td>{{$user->name}}</td>        
                                    <td>{{$user->shooting_date}}</td>
                                    <td><a class ="lineHeight fontWhite" href="{{ '/manager/user_detail'.'/'.$user->id }}">詳細</a></td>
                                    <td><a class ="lineHeight fontRed" href="{{ '/manager/delete'.'/'.$user->id }}">削除</a></td>
                                </tr> 
                            @endforeach
                        </tbody>
                    @else
                        <p class="noColumn">登録された情報はありません</p>
                    @endif
                </table>
            </div>
        </div>
        <div class="linkList">
            <a href="{{ route('user_insert') }}" class="linkBtn">新規登録</a>
            @if(Auth::guard('manager')->user()->manager_id == 1)
                <a href="{{ route('manager.createForm') }}" class="linkBtn">店舗登録</a>
                <a href="{{ route('manager_list') }}" class="linkBtn">店舗一覧</a>
            @endif
            <a href="{{ route('manager.logout') }}" class="linkBtn">ログアウト</a>
        </div>
    </div>
@endsection
