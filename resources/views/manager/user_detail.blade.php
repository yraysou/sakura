@extends('layouts.manager.app')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('/css/detail.css?cacherefResh19111')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/css/detail_print.css?cacherefResh19111')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
@endsection

@section('main')    
    <div id="mainBlk" class="sideSpace">
        <div class="procedure">
            <img src="{{ asset('image/procedure.png') }}" alt="">
        </div>
        <div class="photoArea">
            <div class="photoEle">
                <img class="hostdata__img" src="{{asset(str_replace('public/', '/storage/', $users->original))}}" alt=""><span>本データ</span>
            </div>
            <div class="photoEle">
                <img class="hostdata__img" src="{{asset(str_replace('public/', '/storage/', $users->print))}}" alt=""><span>印刷用データ</span>
            </div>
            <div class="photoEle">
                <img class="hostdata__img" src="{{asset(str_replace('public/', '/storage/', $users->se))}}" alt=""><span>SE用データ</span>
            </div>
        </div>
        <div class="bottomEle">
            <div class="left">
                <h2>画像取得方法の説明</h2>
                <p>/--------------------------------</p>
                <p>記載されているID、PassWordを入力し、ログインしたら</p>
                <p>欲しい写真を選択し、</p>
                <p>写真をダウンロードして下さい。</p>
                <h3>※手順がわからない方は手順を見ながら</h3>
                <h3>操作を進めてください。</h3>
                <p>--------------------------------/</p>
                <p class="fontRed">使用可能期限:<span>{{ $users->a_year_later }}</span><br/>
                忘れずにデータを取得してください</p>
            </div>
        <form action="{{ route('userUpdate')}}" enctype="multipart/form-data" method="post">
                {{ csrf_field() }}
                    <div class="right">
                            <script>
                                @if (session('flash_message'))
                                    $(function () {
                                            toastr.success('{{ session('flash_message') }}');
                                    });
                                @endif
                            </script>
                            
                        <div class="rightEle">
                            <p>ID:</p> <span class="rightEle__detail">{{ $users->user_id }}</span>
                            <input type="hidden" value="{{ $users->user_id }}" name="user_id">
                        </div>
                        <div class="rightEle">
                            <p>Password:</p> <span class="rightEle__detail">{{ $users->conf_pass }}</span>
                        </div>
                        <div class="rightEle">
                            <p>氏名:</p> <span class="rightEle__detail">{{ $users->name }}</span>
                        </div>
                        <div class="rightEle">
                            <p>電話番号:</p><input type="text" name="tel_number" value="{{ $users->tel_number }}"><span class="small_msg">修正可</span>
                        </div>    
                        <div class="rightEle">
                            <p>撮影日:</p><input type="text"  name="shooting_date" value="{{ $users->shooting_date }}"><span class="small_msg">修正可</span>
                        </div>    
                        <input  type="submit" class="linkBtn"  value="更新" name="update">            
                    </div>
            </form>    
        </div>
        <div class="linkList">
            <a class="linkBtn" href="#" onclick="window.print();return false;">このページを印刷</a>
            <a class="linkBtn" href="/manager/user_list">一覧へ戻る</a>
        </div>
    </div>
@endsection
