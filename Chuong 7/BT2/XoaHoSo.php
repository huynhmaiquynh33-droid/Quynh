<?php
include 'Connection.php';
if (isset($_POST['manv'])) {
    $manv = $_POST['manv'];
    mysqli_query($conn, "DELETE FROM NHANVIEN WHERE manv='$manv'");
    if (mysqli_affected_rows($conn) > 0)
        echo "<p style='color:green'>Xóa thành công: $manv</p>";
    else
        echo "<p style='color:red'>Không tìm thấy: $manv</p>";
}
?>
<!DOCTYPE html>
<html lang="vi">
<head><meta charset="UTF-8"><title>Xóa Hồ Sơ</title></head>
<body>
<h2>Xóa Hồ Sơ Nhân Viên</h2>
<a href="index.php">← Trang chủ</a><br><br>
<form method="POST">
    Mã NV cần xóa: <input type="text" name="manv">
    <input type="submit" value="Xóa">
</form>
</body></html>