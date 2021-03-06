document.addEventListener('DOMContentLoaded', function () {

  const getImg = document.getElementsByClassName('getList');
  // ランダムな文字列の生成
  const str = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
  //桁数の定義
  const len = 12;

  getImg[0].addEventListener('change', function (ev) {
    // 画像名の作成
    let imgName = ev.target.value.split('/');
    const downloadImgName = imgName.slice(-1)[0];
    // aタグのdownloadに代入
    ev.target.nextElementSibling.download = downloadImgName;
    // hrefに選択された画像のurlを代入
    ev.target.nextElementSibling.href = ev.target.value;
  });
});