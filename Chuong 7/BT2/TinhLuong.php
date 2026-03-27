<?php include 'Connection.php'; ?>
<!DOCTYPE html>
<html lang="vi">
<head><meta charset="UTF-8"><title>Tính Lương</title></head>
<body>
<h2>Tính Lương Nhân Viên</h2>
<a href="index.php">← Trang chủ</a><br><br>
<form method="POST">
    Mã NV: <input type="text" name="manv">
    <input type="submit" value="Tính lương">
</form>
<?php
if (isset($_POST['manv'])) {
    $result = mysqli_query($conn, "SELECT * FROM NHANVIEN WHERE manv='{$_POST['manv']}'");
    $row    = mysqli_fetch_assoc($result);
    if ($row) {
        $luong = $row['luongcb'] * $row['hesoluong'];
        echo "<h3>{$row['hoten']}</h3>
        <table border='1' cellpadding='8'>
        <tr><th>Lương cơ bản</th><td>" . number_format($row['luongcb'],0,',','.') . " đ</td></tr>
        <tr><th>Hệ số lương</th><td>{$row['hesoluong']}</td></tr>
        <tr><th>Lương thực nhận</th><td><b>" . number_format($luong,0,',','.') . " đ</b></td></tr>
        </table>";
    } else {
        echo "<p style='color:red'>Không tìm thấy!</p>";
    }
}
?>
</body></html>