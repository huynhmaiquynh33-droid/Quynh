<?php
session_start();

// Kiểm tra đã đăng nhập chưa
if (!isset($_SESSION['user'])) {
    header("Location: login.html");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Trang chính</title>
</head>
<body>

<h2>Chào bạn: <?php echo $_SESSION['user']; ?></h2>

<a href="logout.php">Đăng xuất</a>

</body>
</html>