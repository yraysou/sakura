@extends('layouts.user.app')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('/css/mypage.css?cacherefResh19111')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/user_sp.css?cacherefResh19111')}}">
@endsection

@section('js')
    <script type="text/javascript" src="{{asset('/js/getImage.js?cacherefResh19111')}}"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="{{asset('/js/agreement.js?cacherefResh19111')}}"></script>
@endsection

@section('main')
    <div id="mainBlk" class="sideSpace ">
        <div class="photoArea">
            <div class="photoEle">
                <img class="hostdata__img" src="{{asset(str_replace('public/', '/storage/', $users->original))}}" alt=""><span>本データ</span>
            </div>
            <div class="photoEle printImg">
                <img class="hostdata__img" src="{{asset(str_replace('public/', '/storage/', $users->print))}}" alt=""><span>写真印刷用データ</span>
            </div>
            <div class="photoEle esImg">
                <img class="hostdata__img" src="{{asset(str_replace('public/', '/storage/', $users->se))}}" alt=""><span>ESデータ</span>
            </div>
        </div>
        <div class="bottomEle">
            <div class="left">
                <h2>画像取得方法の説明</h2>
                <p>/--------------------------------</p>
                <p>欲しい写真を選択し、</p>
                <p>写真をダウンロードして下さい。</p>
                <p>--------------------------------/</p>
                <p class="fontRed">使用可能期限:<span class="year">{{ $users->after_half_year }}</span><br/>
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
                <div class="rightEle">
                    <p> 電話番号:</p><span>{{ $users->tel_number }}</span>
                </div>
            </div>     
        </div>
        <div class="getWrapper">
            <select class="getList" id="" onchange="">
                <option selected="selected"  hidden>写真を選択して下さい</option>
                <option class="original" value="{{asset(str_replace('public/', '/storage/', $users->original))}}" alt="">本データ</option>
                <option class="print" value="{{asset(str_replace('public/', '/storage/', $users->print))}}" alt="">写真印刷用</option>
                <option class="es" value="{{asset(str_replace('public/', '/storage/', $users->se))}}" alt="">ES用</option>
            </select>
            <a 
                class="getImage" 
                id=""
                href="" 
                download=""
            >ダウンロードする
            </a>
        </div>
    </div>
@endsection