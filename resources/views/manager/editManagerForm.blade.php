@extends('layouts.manager.app')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('/css/login.css?cacherefResh19111')}}">
@endsection

@section('main')
    <div id="mainBlk" class="sideSpace">
        <div class="head sideSpace">
            <p>店舗編集画面</p>
        </div>
        <div class="form-body">
            <form class="form-horizontal" method="POST" action="{{ route('store.edit.manager') }}">
                {{ csrf_field() }}
                {{-- store_name --}}
                <div class="form-group">
                    <label for="store_name" class="input-title">スタジオ</label>
                    <div class="input-group">
                        <input id="store_name" placeholder="スタジオ名" type="text" class="" name="store_name" required value="{{$manager->store_name}}">
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
                        <input id="password" placeholder="Password" type="text" class="" name="password" required value="{{$manager->password}}">

                        @if ($errors->has('password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>
                </div>
                {{-- ログインボタン --}}
                <div class="flexArea">
                    <input type="hidden" name="manager_id" value="{{$manager->manager_id}}">
                    <input class="sendButton" type="submit" value="退会させる" style="margin-top:25px" />
                    <a href="{{route('manager_list')}}"class="sendButton" style="margin-top:25px">戻る</a>
                </div>
            </form>
        </div>
    </div>
@endsection
