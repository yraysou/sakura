@extends('layouts.user.app')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('/css/login.css?cacherefResh19111')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/user_sp.css?cacherefResh19111')}}">
@endsection

@section('main')
    <div id="mainBlk" class="sideSpace">
        <div class="head sideSpace">
            <h2>画像ダウンロード</h2>
            <p>お客様ログイン</p>
        </div>
        <div class="form-body">
            <form class="form-horizontal" method="POST" action="{{ route('user.login') }}">
                {{ csrf_field() }}
                {{-- store_name --}}
                <div class="form-group">
                    <label for="user_id" class="input-title">お客様ID</label>
                    <div class="input-group">
                        <input id="user_id" type="text" class="form-control" placeholder="ID" name="user_id" value="{{ old('user_id') }}" required autofocus>
                        @if ($errors->has('user_id'))
                            <span class="help-block">
                                <strong>{{ $errors->first('user_id') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                {{-- password --}}
                <div class="form-group">
                    <label for="password" class="input-title">Password</label>
                    <div class="input-group">
                        <input id="password" placeholder="Password　※小文字と大文字を区別しております" type="text" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                {{-- ログインボタン --}}
                <input class="sendButton" type="submit" value="ログイン" style="margin-top: 25px" />
            </form>
        </div>
    </div>
@endsection
