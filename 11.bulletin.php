<?php
    error_reporting(0); // 關閉錯誤報告，避免在網頁上顯示警告訊息
    session_start();    // 啟動 Session，用來存取存放在伺服器端的使用者資料

    // 檢查 Session 中是否有 "id"，如果沒有代表使用者尚未登入
    if (!$_SESSION["id"]) {
        echo "請先登入";
        // 3秒後自動跳轉回登入頁面 (2.login.html)
        echo "<meta http-equiv=REFRESH content='3, url=2.login.html'>";
    }
    else{
        // 顯示歡迎訊息及功能選單（登出、管理使用者、新增佈告）
        echo "歡迎, ".$_SESSION["id"]."[<a href=12.logout.php>登出</a>] [<a href=18.user.php>管理使用者</a>] [<a href=22.bulletin_add_form.php>新增佈告</a>]<br>";
        // 連接資料庫 (主機, 帳號, 密碼, 資料庫名稱)
        $conn=mysqli_connect("120.105.96.90", "immust", "immustimmust", "immust");
        // 從 bulletin 資料表查詢所有公告資料
        $result=mysqli_query($conn, "select * from bulletin");
        // 建立表格標題
        echo "<table border=2><tr><td></td><td>佈告編號</td><td>佈告類別</td><td>標題</td><td>佈告內容</td><td>發佈時間</td></tr>";
        // 利用迴圈逐筆取出資料庫中的記錄
        while ($row=mysqli_fetch_array($result)){
            // 顯示「修改」連結，並透過 GET 傳送該筆公告的 ID (bid)
            // 顯示「刪除」連結
            echo "<tr><td><a href=26.bulletin_edit_form.php?bid={$row["bid"]}>修改</a> 
            <a href=28.bulletin_delete.php?bid={$row["bid"]}>刪除</a></td><td>";
            echo $row["bid"];   // 顯示編號
            echo "</td><td>";
            echo $row["type"];  // 顯示類別
            echo "</td><td>"; 
            echo $row["title"]; // 顯示標題
            echo "</td><td>";
            echo $row["content"]; // 顯示內容
            echo "</td><td>";
            echo $row["time"];  // 顯示時間
            echo "</td></tr>";
        }
        echo "</table>";    
    }
 
