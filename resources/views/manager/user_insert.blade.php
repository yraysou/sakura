@extends('layouts.manager.app')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('/css/insert.css?cacherefResh19111')}}">
@endsection

@section('js')
    <script type="text/javascript" src="{{asset('/js/insert.js?cacherefResh19111')}}"></script>
@endsection

@section('main')
    <div id="mainBlk" class="sideSpace">
        @if ($errors->any())
            <div class="errors">
                <div class="error__left"></div>
                <div class="error__right">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>・{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
        <form action="{{ ('/sign_up') }}" enctype="multipart/form-data" method="post">
            {{ csrf_field() }}
            <div class="input-area">
                <div class="input-column">
                    <p class="column-left">ID: </p><span class="column-right">{{ $user_id }}</span>
                </div>
                <div class="input-column">
                    <p class="column-left">氏名: </p><span class="column-right"><input class="column-name" type="text" vaule="" id="name" name="name"></span>
                </div>
                <div class="input-column">
                    <p class="column-left">電話番号: </p><span class="column-right"><input class="column-name" type="text" vaule="" id="tel_number" name="tel_number" placeholder="例）000-0000-0000"></span>
                </div>
                <div class="input-column">
                <p class="column-left">撮影日時: </p><span class="column-right"><input class="column-name" type="date" vaule="{{ $dt }}" id="shooting_date" name="shooting_date"></span>
                </div>
                <input type="hidden" id="user_id" name="user_id" value="{{ $user_id }}">
                <input type="hidden" id="manager_id" name="manager_id" value="{{ $manager_id }}">
                <input type="hidden" id="password" name="password" value="{{ $pw }}">
            </div>
            <div class="imageArea">
                <div class="image">
                    <div id="drop1" class="drop">Drop or Click!!</div>
                    <input type="file" class="fileInput" id="fileInput1" name="original" style="display:none"><span>本データ</span>
                </div>
                <div class="image">
                    <div id="drop2" class="drop">Drop or Click!!</div>
                    <input type="file" class="fileInput" id="fileInput2" name="print" style="display:none"><span>写真用データ</span>
                </div>
                <div class="image">
                    <div id="drop3" class="drop">Drop or Click!!</div>
                    <input type="file" class="fileInput" id="fileInput3" name="se" style="display:none"><span>ESデータ</span>
                </div>
            </div>
            <input type="submit" class="sendButton insertBtn" value="保存">
        </form>
    </div>
@endsection
