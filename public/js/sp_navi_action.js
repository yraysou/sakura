/*===================================
 ヘッダーmenuナビ開閉
===================================*/

$(function(){
var $window = $(window),
    // $accordion = $('#spNav'),
    // $menuButton = $('#header'),
    $menuButton = $("#sp-menu-button");
    // $navBg = $(".spNavBg");
    $navList = $(".spNavListBlk");
    $navtit = $("#sp-menu-tit");
    $body = $('body');
    $html = $('html');
    $wrapper = $('#container');

   //3.開く時の動き
   function openAction(){
       // $menuButton.addClass('menu-open');
       // $accordion.addClass('menu-open');
       // $navBg.addClass('menu-open');
       $navList.addClass('menu-open');
       $menuButton.addClass('menu-open');
       $navtit.addClass('menu-open');

       //同時に処理するとずれて見えるので少し遅らせる
       // setTimeout(function(){
       //      $scrollPosition = $window.scrollTop();
       //      $openScrollPosition = '-' + $scrollPosition + 'px';
       //      $wrapper.css({'position': 'relative','top': $openScrollPosition});

       //      $html.css({'overflow': 'hidden'}).height('100vh');
       //      $body.css({'overflow': 'hidden'}).height('100vh');
       // },300);
   }

   //4.閉じる時の動き
    function closeAction(){

       //メニューを開いている時スクロールさせない
       $html.css({'overflow': '','height': ''});
       $body.css({'overflow': '','height': ''});

       //スクロールさせない処理でトップに戻されてしまうので場所の維持
      // $(window).scrollTop($scrollPosition);
       //クラスを外す
       // $menuButton.removeClass('menu-open');
       // $accordion.removeClass('menu-open');
       // $navBg.removeClass('menu-open');
       $navList.removeClass('menu-open');
       $menuButton.removeClass('menu-open');
       $navtit.removeClass('menu-open');
       // $(window).off('.noScroll');


    }

   //5.クリックイベント
   $menuButton.on('click',function(){
       //open用のクラスがあるかどうか判定
       if($menuButton.hasClass('menu-open')){
           //閉じる時の動き
           // $wrapper.css({'position': 'initial'});
           closeAction();
       } else {
           //開く時の動き
           openAction();
       }
   });
   $(".spInnerNav").on('click',function(){
      closeAction();
   });

});
