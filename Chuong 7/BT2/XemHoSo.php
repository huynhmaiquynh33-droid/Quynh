<?php include 'Connection.php'; ?>
<!DOCTYPE html>
<html lang="vi">
<head><meta charset="UTF-8"><title>Xem Hồ Sơ</title></head>
<body>
<h2>Xem Hồ Sơ Nhân Viên</h2>
<a href="index.php">← Trang chủ</a><br><br>
<form method="POST">
    Mã NV: <input type="text" name="manv">
    <input type="submit" value="Xem">
</form>
<?php
if (isset($_POST['manv'])) {
    $manv   = $_POST['manv'];
    $result = mysqli_query($conn, "SELECT * FROM NHANVIEN WHERE manv='$manv'");
    $row    = mysqli_fetch_assoc($result);
    if ($row) {
        echo "<table border='1' cellpadding='8'>
        <tr><th>Mã NV</th><td>{$row['manv']}</td></tr>
        <tr><th>Họ tên</th><td>{$row['hoten']}</td></tr>
        <tr><th>Ngày sinh</th><td>{$row['ngaysinh']}</td></tr>
        <tr><th>Giới tính</th><td>{$row['gioitinh']}</td></tr>
        <tr><th>Địa chỉ</th><td>{$row['diachi']}</td></tr>
        <tr><th>Điện thoại</th><td>{$row['dienthoai']}</td></tr>
        <tr><th>Đơn vị</th><td>{$row['donvi']}</td></tr>
        <tr><th>Chức vụ</th><td>{$row['chucvu']}</td></tr>
        <tr><th>Lương CB</th><td>" . number_format($row['luongcb'],0,',','.') . " đ</td></tr>
        <tr><th>Hệ số</th><td>{$row['hesoluong']}</td></tr>
        </table>";
    } else {
        echo "<p style='color:red'>Không tìm thấy!</p>";
    }
}
?>
</body></html>