<?php
    error_reporting(0);
    session_start();
    #檢查使用者是否已登入（Session 中是否有 id）
    if (!$_SESSION["id"]) {
        echo "please login first";
        #3 秒後自動跳轉到登入頁面
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else{
        #連線到 MySQL 資料庫
        $conn=mysqli_connect("120.105.96.90", "immust", "immustimmust", "immust");
        #根據 URL GET 參數的 bid，查詢該佈告的現有資料
        $result=mysqli_query($conn, "select * from bulletin where bid={$_GET["bid"]}");
        #取得查詢結果的第一筆資料
        $row=mysqli_fetch_array($result);
        #預設三個類型的 radio 都不選
        $checked1="";
        $checked2="";
        $checked3="";
        #根據資料庫的 type 值，決定哪個 radio 要顯示為已選取
        if ($row['type']==1)
            $checked1="checked";
        if ($row['type']==2)
            $checked2="checked";
        if ($row['type']==3)
            $checked3="checked";
        #輸出編輯表單，預填現有資料供修改
        echo "
        <html>
            <head><title>新增佈告</title></head>
            <body>
                <form method=post action=27.bulletin_edit.php>
                    佈告編號：{$row['bid']}<input type=hidden name=bid value={$row['bid']}><br>
                    標    題：<input type=text name=title value={$row['title']}><br>
                    內    容：<br><textarea name=content rows=20 cols=20>{$row['content']}</textarea><br>
                    佈告類型：<input type=radio name=type value=1 {$checked1}>系上公告 
                            <input type=radio name=type value=2 {$checked2}>獲獎資訊
                            <input type=radio name=type value=3 {$checked3}>徵才資訊<br>
                    發布時間：<input type=date name=time value={$row['time']}><p></p>
                    <input type=submit value=修改佈告> <input type=reset value=清除>
                </form>
            </body>
        </html>
        ";
    }
?>
