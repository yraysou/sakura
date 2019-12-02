<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width,user-scalable=no">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
        @yield('meta')

        <!-- OGPタグ -->
        {{-- <meta property="og:description" content="悩みや不安を吐き出したいなら、Neenee。ゲイに相談して、不安を和らげよう" /> --}}
		<meta property="og:type" content="website" />
		{{-- <meta property="og:url" content="https://neenee.jp/" />
		<meta property="og:image" content="https://neenee.jp/img/neenee_sns.img" /> --}}
		<meta property="og:site_name" content="sakura" />
        @yield('ogp')

        <link rel="stylesheet" type="text/css" href="{{asset('/css/reset.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('/css/base.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('/css/base_pc.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('/css/nav_mobi.css?cacherefResh19111')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('/css/index.css?cacherefResh19111')}}">
        @yield('css')

        <!-- ↓２つのcssを読み込む↓ -->
        <link rel="stylesheet" type="text/css" href="{{asset('/css/form_reset.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('/css/form.css')}}">
        <!-- ↑２つのcssを読み込む↑ -->

        <!-- webフォント -->
        <link href="https://fonts.googleapis.com/css?family=Ropa+Sans" rel="stylesheet">
        <!-- //webフォント -->

        <script type="text/javascript" src="{{asset('/js/jquery-1.11.3.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('/js/sp_navi_action.js?cacherefResh19111')}}"></script>
        @yield('js')
    </head>
    <body>
        <div id="wrap">
            {{-- @include('common.header') --}}
            @yield('main')
            {{-- @include('common.footer') --}}
        </div>
        @yield('bodyScripts')
    </body>
</html>
