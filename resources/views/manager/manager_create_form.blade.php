@extends('layouts.manager.app')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('/css/login.css?cacherefResh19111')}}">
@endsection

@section('main')
    <div id="mainBlk" class="sideSpace">
        <div class="head sideSpace">店舗登録画面</div>

        <div class="form-body">
            <form class="form-horizontal" method="POST" action="{{ route('manager.create') }}">
                {{ csrf_field() }}
                {{-- store_name --}}
                <div class="form-group">
                    <label for="store_name" class="input-title">スタジオ</label>
                    <div class="input-group">
                        <input id="store_name" type="text" class="" name="store_name" required>
                        @if ($errors->has('store_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('store_name') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                {{-- password --}}
                <div class="form-group">
                    <label for="password" class="input-title">Password</label>
                    <div class="input-group">
                        <input id="password" type="password" class="" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                {{-- ログインボタン --}}
                <input class="sendButton" type="submit" value="登録" style="margin-top: 25px" />
            </form>
        </div>
    </div>
@endsection
