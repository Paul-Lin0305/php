<?php
    // 啟動 Session 功能。
    // 無論是設定、讀取還是刪除 Session，第一步都一定要先寫這一行。
    session_start();

    // 刪除特定的 Session 變數。
    // 這裡清除了 "id" 這個變數，這會讓 11.bulletin.php 的權限檢查失效，達到登出的效果。
    unset($_SESSION["id"]);

    // 在網頁上顯示提示字串給使用者看。
    echo "登出成功....";

    // 透過 HTML 的 meta 標籤進行自動跳轉。
    // content='3; url=2.login.html' 代表「3秒後自動轉址到 2.login.html」。
    echo "<meta http-equiv=REFRESH content='3; url=2.login.html'>";
?>
