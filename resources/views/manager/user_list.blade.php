@extends('layouts.manager.app')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('/css/user_list.css?cacherefResh19111')}}">
@endsection

@section('js')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script type="text/javascript" src="{{asset('/js/modal.js?cacherefResh19111')}}"></script>
@endsection

@section('main')
    <div id="mainBlk" class="sideSpace">
            <div class="search-container">
                <div class="search-wrapper">
                    <div class="">   
                        <form class="form-inline" action="{{url('manager/user_list')}}">
                            <div class="search-group">
                                <div>
                                    <input type="text" name="keyword" value="{{ $keyword }}" placeholder="   お客様検索   （ id / 名前 / 電話番号 ）" class="typeBtn">
                                </div>
                                <div>
                                    <input type="submit" value="検索" class="searchBtn">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <div class="main-body">
                <script>
                    @if (session('flash_message1'))
                        $(function () {
                                toastr.success('{{ session('flash_message1') }}');
                        });
                    @endif
                    </script>
            <div class="scroll">
                <table class="table">
                    <thead>
                        <tr>
                            <th class="column">id</th>
                            <th class="column">名前</th>
                            <th class="column">電話番号</th>                            
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
                                    <td>{{$user->tel_number}}</td>
                                    <td>{{$user->shooting_date}}</td>
                                    <td><a class ="lineHeight fontWhite" href="{{ '/manager/user_detail'.'/'.$user->id }}">詳細</a></td>
                                    <td><a class ="lineHeight fontRed"  onclick="adducePopupOpen();makeUrl(event)">削除</a><input type="hidden" value="{{$user->user_id}}"></td>
                                {{-- <td><a class ="lineHeight fontRed" href="{{ '/manager/delete'.'/'.$user->id.'/'.$keyword }}">削除</a></td> --}}
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
            @if(Auth::guard('manager')->user()->manager_id == 1)
                <a href="{{ route('manager.createForm') }}" class="linkBtn">店舗登録</a>
                <a href="{{ route('manager_list') }}" class="linkBtn">店舗一覧</a>
            @else
                <a href="{{ route('user_insert') }}" class="linkBtn">新規登録</a>
            @endif
            <a href="{{ route('manager.logout') }}" class="linkBtn">ログアウト</a>
        </div>
        <div class="popUp" id="adducePopupBg" hidden>
                <div class="my-parts" onclick="adducePopupClose()"><span></span></div>
                <div class="popUp-list">
                    <div class="max">
                        <p>本当に削除しますか？</p>
                    </div>
                    <div class="popUp-wrapper">
                        {{-- <a href="{{ '/manager/delete'.'/'.$user->id.'/'.$keyword }}" class="yes"><p>はい</p></a> --}}
                        <a href="" id="deleteRun"  class="popUp--btn" ><p>はい</p></a>
                        <a href="" class="popUp--btn" onclick="adducePopupClose()"><p>いいえ</P></a>
                    </div>
                </div>
        </div>
        <div class="backImg delete" onclick="adducePopupClose()" hidden></div>    
    </div>
@endsection
@section('bodyScripts')
    <script>
        function makeUrl(ev){
            const getId = ev.target.nextElementSibling.value;
            const url = '{{route('user_delete')}}' + '/' + getId;
            
            const deleteModal = document.getElementById("deleteRun");
            deleteModal.href = url;
            console.log(url);
        };
    </script>
@endsection
