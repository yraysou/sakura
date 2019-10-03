@extends('layouts.user.app')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('/css/mypage.css?cacherefResh19111')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/detail.css?cacherefResh19111')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/user_sp.css?cacherefResh19111')}}">
@endsection

@section('js')
    <script type="text/javascript" src="{{asset('/js/getImage.js?cacherefResh19111')}}"></script>
@endsection

@section('main')
    <div id="mainBlk" class="sideSpace ">
        <div class="photoArea">
            <div class="photoEle">
                <img class="hostdata__img" src="{{asset(str_replace('public/', '/storage/', $user->original))}}" alt=""><span>本データ</span>
            </div>
            <div class="photoEle printImg">
                <img class="hostdata__img" src="{{asset(str_replace('public/', '/storage/', $user->print))}}" alt=""><span>写真印刷用データ</span>
            </div>
            <div class="photoEle esImg">
                <img class="hostdata__img" src="{{asset(str_replace('public/', '/storage/', $user->se))}}" alt=""><span>ESデータ</span>
            </div>
        </div>
        <div class="bottomEle">
            <div class="left">
                <h2>画像取得方法の説明</h2>
                <p>/--------------------------------</p>
                <p>欲しい写真を選択し、</p>
                <p>写真をダウンロードして下さい。</p>
                <p>--------------------------------/</p>
                <p class="fontRed">使用可能期限:{{ $users->after_half_year }}<br/>
                忘れずにデータを取得してください</p>
            </div>
            <div class="right">
                <div class="rightEle">
                    <p>ID:</p><span>{{ $users->user_id }}</span>
                </div>
                <div class="rightEle">
                    <p>氏名:</p><span>{{ $users->name }}</span>
                </div>
                <div class="rightEle">
                    <p>撮影日:</p><span>{{ $users->shooting_date }}</span>
                </div> 
            </div>
        </div>
        <div class="getWrapper">
            <select class="getList">
                <option selected="selected"  hidden>写真を選択して下さい</option>
                <option class="original" value="/image/{{ $manager->store_name }}/{{ $users->user_id }}/{{ $users->original }}">本データ</option>
                <option class="print" value="/image/{{ $manager->store_name }}/{{ $users->user_id }}/{{ $users->print }}">写真印刷用</option>
                <option class="es" value="/image/{{ $manager->store_name }}/{{ $users->user_id }}/{{ $users->se }}">ES用</option>
            </select>
            <a 
                class="getImage" 
                href="" 
                download=""
            >ダウンロードする
            </a>
        </div>
    </div>
@endsection