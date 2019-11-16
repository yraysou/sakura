function entryChange(){
    // レスポンシブのみ適応
    if(navigator.userAgent.match(/(iPhone|iPad|iPod|Android)/)){    
        if(document.getElementById('changeSelect')){
            id = document.getElementById('changeSelect').selectedIndex;

            if(id == 0) {
        // 初期値
                document.getElementById('firstBox').style.display = "";
                document.getElementById('secondBox').style.display = "none";
                document.getElementById('thirdBox').style.display = "none";
            }else if(id == 1) {
        //本データ
                document.getElementById('firstBox').style.display = "";
                document.getElementById('secondBox').style.display = "none";
                document.getElementById('thirdBox').style.display = "none";
            }else if(id == 2) {
        // 印刷用
                document.getElementById('firstBox').style.display = "none";
                document.getElementById('secondBox').style.display = "";
                document.getElementById('thirdBox').style.display = "none";
            }else if(id == 3){
        // se用
                document.getElementById('firstBox').style.display = "none";
                document.getElementById('secondBox').style.display = "none";
                document.getElementById('thirdBox').style.display = "";
            }
        }    
    }
}