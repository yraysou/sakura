@extends('layouts.manager.app')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('/css/detail.css?cacherefResh19111')}}">
@endsection

@section('main')
    <div id="mainBlk" class="sideSpace">
        <div class="photoArea">
            <div class="photoEle">
            <img src="/image/{{ $manager->store_name }}/{{ $users->user_id }}/{{ $users->original }}" alt=""><span>本データ</span>
            </div>
            <div class="photoEle">
                <img src="/image/{{ $manager->store_name }}/{{ $users->user_id }}/{{ $users->print }}" alt=""><span>印刷用データ</span>
            </div>
            <div class="photoEle">
            <img src="/image/{{ $manager->store_name }}/{{ $users->user_id }}/{{ $users->se }}" alt=""><span>SE用データ</span>
            </div>
        </div>
        <div class="bottomEle">
            <div class="left">
                <h2>画像取得方法の説明</h2>
                <p>/--------------------------------</p>
                <p>記載されているID、PassWordを入力し、ログインしたら</p>
                <p>欲しい写真を選択し、</p>
                <p>写真をダウンロードして下さい。</p>
                <p>--------------------------------/</p>
                <p class="fontRed">使用可能期限:<span>{{ $users->after_half_year }}</span><br/>
                忘れずにデータを取得してください</p>
            </div>
            <div class="right">
                <div class="rightEle">
                    <p>ID:</p><span>{{ $users->user_id }}</span>
                </div>
                <div class="rightEle">
                    <p>Password:</p> <span>{{ $users->conf_pass }}</span>
                </div>
                <div class="rightEle">
                    <p>氏名:</p><span>{{ $users->name }}</span>
                </div>
                <div class="rightEle">
                    <p>撮影日:</p><span>{{ $users->shooting_date }}</span>
                </div>
    
            </div>
        </div>
        <div class="linkList">
            <a class="linkBtn" href="#" onclick="window.print();return false;">このページを印刷</a>
            <a class="linkBtn" href="/manager/user_list">一覧へ戻る</a>
        </div>
    </div>
@endsection
