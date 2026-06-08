<?php
    error_reporting(0);
    session_start();
    #檢查使用者是否已登入（Session 中是否有 id）
    if (!$_SESSION["id"]) {
        echo "請登入帳號";
        #3 秒後自動跳轉到登入頁面
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else{   
        #連線到 MySQL 資料庫
        $conn=mysqli_connect("120.105.96.90", "immust", "immustimmust", "immust");
        #從 URL 的 GET 參數取得要刪除的佈告 bid，組成 DELETE 語法
        $sql="delete from bulletin where bid='{$_GET["bid"]}'";
        #echo $sql;
        #執行 SQL，失敗則顯示錯誤訊息
        if (!mysqli_query($conn,$sql)){
            echo "佈告刪除錯誤";
        }else{
            echo "佈告刪除成功";
        }
        #無論成功或失敗，3 秒後都跳回佈告列表頁
        echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>";
    }
?>
