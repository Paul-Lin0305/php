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
        #執行 UPDATE：將指定 bid 的佈告資料更新為表單送來的新內容
        #更新欄位：title=標題、content=內容、time=發布時間、type=佈告類型
        #WHERE 條件使用隱藏欄位傳來的 bid，確保只修改該筆佈告
        if (!mysqli_query($conn, "update bulletin set title='{$_POST['title']}',content='{$_POST['content']}',time='{$_POST['time']}',type={$_POST['type']} where bid='{$_POST['bid']}'")){
            echo "修改錯誤";
            #修改失敗，3 秒後跳回佈告列表頁
            echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>";
        }else{
            echo "修改成功，三秒鐘後回到佈告欄列表";
            #修改成功，3 秒後跳回佈告列表頁
            echo "<meta http-equiv=REFRESH content='3, url=11.bulletin.php'>";
        }
    }

?>
