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
        #執行 UPDATE：將指定 id 的使用者密碼更新為表單送來的新密碼
        #$POST['pwd'] 為新密碼，$_POST['id'] 為要修改的使用者 id（來自隱藏欄位）
        if (!mysqli_query($conn, "update user set pwd='{$_POST['pwd']}' where id='{$_POST['id']}'")){
            echo "修改錯誤";
            #修改失敗，3 秒後跳回使用者列表頁
            echo "<meta http-equiv=REFRESH content='3, url=18.user.php'>";
        }else{
            echo "修改成功，三秒鐘後回到網頁";
            #修改成功，3 秒後跳回使用者列表頁
            echo "<meta http-equiv=REFRESH content='3, url=18.user.php'>";
        }
    }

?>
