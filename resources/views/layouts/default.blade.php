<!DOCTYPE html>
<html lang="ja">
	<head>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-139545412-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag() { dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', 'UA-139545412-1');
        </script>

		<meta charset="utf-8" />
        <meta name="viewport" content="width=device-width,user-scalable=no">
        <!-- <meta name="robots" content="noindex"> -->
        @yield('meta')

        <!-- OGPタグ -->
        <meta property="og:description" content="写真管理サイト" />
		<meta property="og:type" content="website" />
		<meta property="og:url" content="" />
		<meta property="og:image" content="" />
		<meta property="og:site_name" content="sakura" />
        @yield('ogp')

		<link rel="stylesheet" type="text/css" href="{{asset('/css/reset.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('/css/base.css')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('/css/base_pc.css?cacherefResh19111')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('/css/nav_mobi.css?cacherefResh19111')}}">
        <link rel="stylesheet" type="text/css" href="{{asset('/css/index.css?cacherefResh19111')}}">
        @yield('css')

        <link rel="icon" type="image/x-icon" href="" />
		<link rel="shortcut icon" type="image/x-icon" href="" />

		<!-- webフォント -->
        <link href="https://fonts.googleapis.com/css?family=Ropa+Sans" rel="stylesheet">
		<!-- //webフォント -->

        <script type="text/javascript" src="{{asset('/js/jquery-1.11.3.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('/js/sp_navi_action.js?cacherefResh19111')}}"></script>
        @yield('js')
    </head>
	<body>
        <div id="wrap" style="overflow: hidden;">
            <div class="bgGradeTop"></div>
            <div class="bgGradeBottom"></div>
            @include('common.header')
            @yield('main')
            @include('common.footer')
        </div>
	</body>
</html>
