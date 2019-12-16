@extends('layouts.manager.app')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('/css/detail.css?cacherefResh19111')}}">
    <link rel="stylesheet" id="cs" type="text/css" href="{{asset('/css/detail_print.css?cacherefResh19111')}}">
    {{-- <link rel="stylesheet" id="2"  type="text/css" href="{{asset('/css/little_print.css?cacherefResh19111')}}"> --}}
    @endsection

@section('js')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script type="text/javascript" src="{{asset('/js/modal.js?cacherefResh19111')}}"></script>

    <script>
        function changeCss(){
            document.getElementById("cs").href = "{{asset('/css/detail_print.css?cacherefResh19111')}}";
        }

        function changeEle(){
            document.getElementById("cs").href = "{{asset('/css/little_print.css?cacherefResh19111')}}";
        }
        
        function setHref( $href ) {
            jQuery( '#cs' ).attr( 'href', $href );
            window.print();
            return false;
        }
    </script>
@endsection

@section('main')    
    <div id="mainBlk" class="sideSpace">
        <div class="allContents">
        <div class="photoArea">
            <div class="photoEle original">
                <img class="hostdata__img" src="{{asset(str_replace('public/', '/storage/', $users->original))}}"><span>本データ</span>
            </div>
            <div class="photoEle print">
                <img class="hostdata__img" src="{{asset(str_replace('public/', '/storage/', $users->print))}}"><span>印刷用データ</span>
            </div>
            <div class="photoEle es">
                <img class="hostdata__img" src="{{asset(str_replace('public/', '/storage/', $users->es))}}" alt=""><span class="esImg">ES用データ</span>
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
                    <p class="fontRed">使用可能期限:<span class="year">{{ $users->a_year_later }}</span><br/>
                    忘れずにデータを取得してください</p>
                </div>
                    <div class="mix">
                        <p class="fontRed">使用可能期限:<span class="mixEle">{{ $users->a_year_later }}</span><br/>
                        忘れずにデータを取得してください</p>            
                    </div>
                    <form action="{{ route('userUpdate')}}" enctype="multipart/form-data" method="post" name="form1">
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
                                    <div class="rightEle tel">
                                        <p>電話番号:</p><input type="text" name="tel_number" value="{{ $users->tel_number }}"><span class="small_msg">修正可</span>
                                    </div>    
                                    <div class="rightEle time">
                                        <p>撮影日:</p><input class="shooting_date" type="date"  name="shooting_date" value="{{ $users->shooting_date }}"><span class="small_msg">修正可</span>
                                    </div>    
                                    <input  type="hidden" class="linkBtn"  value="更新" name="update" >
                                    <a  class="linkBtn more" name="update" onclick="popupOpen()">更新</a>
                                    <div class="qrCss">{!! QrCode::size(160)->generate(route('user.loginpage')); !!}</div>      
                            </div>
                    </form>  
            </div>
        </div>    
        <div class="procedure">
            <img src="{{ asset('image/pro.png') }}" alt="">
        </div>    
        <div class="linkList">
            <a class="linkBtn" href="#" onclick="setHref('{{asset('/css/detail_print.css?cacherefResh19111')}}');changeEle();">このページをA4印刷</a>
            <a class="linkBtn" href="/manager/user_list">一覧へ戻る</a>
            <a class="linkBtn" href="#" onclick="setHref('{{asset('/css/little_print.css?cacherefResh19111')}}');changeCss();">このページをL版印刷</a>
        </div>
        <div class="popUp" id="popupBg" hidden>
            <div class="my-parts" onclick="popupClose()" onload="onLoad()><span></span></div>
            <div class="popUp-list">
                <div class="max">
                    <p>本当に更新しますか？</p>
                </div>
                <div class="popUp-wrapper">
                    <a  href="javascript:form1.submit()" type="submit" class="popUp--btn"><p>はい</p></a>
                    <a href="" class="update popUp--btn" onclick="popupClose()"><p>いいえ</p></a>
                </div>
            </div>
        </div>
        <div class="backImg update"onclick="popupClose()" hidden></div>
    </div>
@endsection
