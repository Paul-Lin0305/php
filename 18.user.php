<html>
    <head><title>使用者管理</title></head>
    <body>
    <?php
        error_reporting(0); // 隱藏錯誤訊息
        session_start();    // 啟動會話，檢查登入狀態

        // --- 權限檢查 ---
        if (!$_SESSION["id"]) {
            echo "請登入帳號";
            echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
        }
        else{   
            // --- 顯示標題與選單 ---
            // 提供連結：跳轉到新增使用者頁面，或回到佈告欄列表
            // 建立表格結構
            echo "<h1>使用者管理</h1>
                [<a href=14.user_add_form.php>新增使用者</a>] [<a href=11.bulletin.php>回佈告欄列表</a>]<br>
                <table border=1>
                    <tr><td></td><td>帳號</td><td>密碼</td></tr>";
            
            // --- 資料庫操作 ---
            // 連接資料庫
            $conn=mysqli_connect("120.105.96.90", "immust", "immustimmust", "immust");
            // 從 user 資料表中抓取所有帳號密碼資料
            $result=mysqli_query($conn, "select * from user");
            // --- 迴圈列出所有使用者 ---
            while ($row=mysqli_fetch_array($result)){
                // 顯示帳號 // 顯示密碼
                echo "<tr><td><a href=19.user_edit_form.php?id={$row['id']}>修改</a>||<a href=17.user_delete.php?id={$row['id']}>刪除</a></td><td>{$row['id']}</td><td>{$row['pwd']}</td></tr>";
            }
            echo "</table>";
        }
    ?> 
    </body>
</html>
