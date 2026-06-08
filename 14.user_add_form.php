<html>
    <head><title>新增使用者</title></head>
    <body>
<?php        
    #關閉錯誤顯示
    error_reporting(0);
    #啟動 Session
    session_start();
    #檢查是否已登入（Session 中有無 id）
    if (!$_SESSION["id"]) {
        #未登入則顯示提示訊息
        echo "請登入帳號";
        #3 秒後自動跳轉回登入頁
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else{    
        /*
        <!-- 表單送出至新增使用者處理頁 -->
        <!-- 輸入新帳號 -->
        <!-- 輸入新密碼 -->
        <!-- 送出 / 重設按鈕 -->
        */
        echo "
            <form action=15.user_add.php method=post>
                帳號：<input type=text name=id><br>
                密碼：<input type=text name=pwd><p></p>
                <input type=submit value=新增> <input type=reset value=清除>
            </form>
        ";
    }
?>
    </body>
</html>
