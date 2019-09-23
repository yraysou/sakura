document.addEventListener('DOMContentLoaded', function () {
  // 宣言
  var
    drop = document.querySelectorAll('.drop'),
    fileInput = document.querySelectorAll('.fileInput');
  // 画像の最大ファイルサイズ（20MB）
  var maxSize = 20 * 1024 * 1024;
  // ドロップされたファイルの整理
  function organizeFiles(files, element) {
    var img = files[0];

    // 画像以外は無視
    if (!img || img.type.indexOf('image/') < 0) {
      throw exit;
    }
    // 指定したサイズを超える画像は無視
    if (img.size > maxSize) {
      throw exit;
    }
    // 画像出力処理へ進む
    outputImage(img, element);
  }
  
  // 画像の出力
  function outputImage(blob, element) {
    var
      // 画像要素の生成
      image = new Image(),

      // File/BlobオブジェクトにアクセスできるURLを生成
      blobURL = URL.createObjectURL(blob);

    // src にURLを入れる
    image.src = blobURL;

    // 画像読み込み完了後
    image.addEventListener('load', function () {
      // File/BlobオブジェクトにアクセスできるURLを開放
      URL.revokeObjectURL(blobURL);

      // cssの反映
      element.classList.remove('drop');
      element.classList.add('output');

      // #output へ出力
      element.appendChild(image);
    });
  }
  
  for(var i=0, len=drop.length; i<len; i++) {
    // ドラッグ中の要素がドロップ要素に重なった時
    drop[i].addEventListener('dragover', function (ev) {
      ev.preventDefault();
  
      // ファイルのコピーを渡すようにする
      ev.dataTransfer.dropEffect = 'copy';
  
      ev.target.classList.add('dragover');
    });

    // ドラッグ中の要素がドロップ要素から外れた時
    drop[i].addEventListener('dragleave', function (ev) {
      ev.target.classList.remove('dragover');
    });

    // ドロップ要素にドロップされた時
    drop[i].addEventListener('drop', function (ev) {
      ev.preventDefault();
      console.log(ev.dataTransfer.files);
      ev.target.classList.remove('dragover');
      ev.target.textContent = "";
      ev.target.nextElementSibling.files = ev.dataTransfer.files;

      // ev.dataTransfer.files に複数のファイルのリストが入っている
      organizeFiles(ev.dataTransfer.files, ev.target);
    });

    // #drop がクリックされた時
    drop[i].addEventListener('click', function (event) {
      var next = event.target.nextElementSibling;
      next.click();
    });

    // ファイル参照で画像を追加した場合
    fileInput[i].addEventListener('change', function (ev) {
      // 前のの要素を取得
      var pre = ev.target.previousElementSibling;
      pre.textContent = "";  
      // ev.target.files に複数のファイルのリストが入っている
      organizeFiles(ev.target.files, pre);
    });
  }
});