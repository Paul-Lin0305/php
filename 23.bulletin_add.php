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
        #組成 INSERT 語法，將表單送來的四個欄位寫入 bulletin 資料表
        #title=標題、content=內容、type=佈告類型(1/2/3)、time=發布日期
        $sql="insert into bulletin(title, content, type, time) 
        values('{$_POST['title']}','{$_POST['content']}', {$_POST['type']},'{$_POST['time']}')";
        #執行 SQL，失敗則顯示錯誤訊息
        if (!mysqli_query($conn, $sql)){
            echo "新增命令錯誤";
        }
        else{
            echo "新增佈告成功，三秒鐘後回到網頁";
            #新增成功，3 秒後跳回佈告列表頁
            echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>";
        }
    }
?>
