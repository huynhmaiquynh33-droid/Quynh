<?php
session_start();

// Kiểm tra có dữ liệu gửi lên không
if (isset($_POST['username']) && isset($_POST['password'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    // Tài khoản mẫu
    if ($username == "admin" && $password == "123") {

        $_SESSION['user'] = $username;

        header("Location: mainpage.php");
        exit();

    } else {
        echo "Sai tài khoản hoặc mật khẩu! <br>";
        echo "<a href='login.html'>Quay lại</a>";
    }

} else {
    echo "Vui lòng đăng nhập từ form!";
}
?>