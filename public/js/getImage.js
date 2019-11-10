document.addEventListener('DOMContentLoaded', function () {

  const getImg = document.getElementsByClassName('getList');
  // ランダムな文字列の生成
  const str = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
  //桁数の定義
  const len = 12;

  getImg[0].addEventListener('change', function (ev) {
    // 選択された画像のclassNameを取得
    const className = ev.target.options[ev.target.selectedIndex].className;
    //ランダムな文字列の生成
    let random = "";
    for(var i=0;i<len;i++){
      random += str.charAt(Math.floor(Math.random() * str.length));
    }
    // 画像名の作成
    const downloadImgName = className+'_'+random+'.png';
    // aタグのdownloadに代入
    ev.target.nextElementSibling.download = downloadImgName;
    // hrefに選択された画像のurlを代入
    ev.target.nextElementSibling.href = ev.target.value;
  });
});