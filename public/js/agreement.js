
//checkboxが押された時の処理
function myfunc() {
    var check1 = document.getElementById("Checkbox1").checked;
    var disabled = document.getElementById("disabled");
    var unShow = document.getElementById("unShow");
    if(check1 == true){
        disabled.classList.remove("disabled");
        unShow.classList.add("unShow");
    }
    else{
        disabled.classList.add("disabled");
    }
}

//  未チェック時の赤文字表示
function clickfunc() {
    var check2 = document.getElementById("Checkbox1").checked;
    var unShow = document.getElementById("unShow");
    if(check2 == false){
        unShow.classList.remove("unShow");
    }
}

