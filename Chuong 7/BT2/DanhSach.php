<?php include 'Connection.php'; ?>
<!DOCTYPE html>
<html lang="vi">
<head><meta charset="UTF-8"><title>Danh Sách Nhân Viên</title></head>
<body>
<h2>Danh Sách Nhân Viên</h2>
<a href="index.php">← Trang chủ</a><br><br>
<?php
$result = mysqli_query($conn, "SELECT * FROM NHANVIEN");
$count  = mysqli_num_rows($result);
echo "<p>Tổng số: $count nhân viên</p>";
echo "<table border='1' cellpadding='6'>
<tr><th>Mã NV</th><th>Họ Tên</th><th>Ngày Sinh</th><th>Giới Tính</th><th>Đơn Vị</th><th>Chức Vụ</th><th>Điện Thoại</th></tr>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
        <td>{$row['manv']}</td>
        <td>{$row['hoten']}</td>
        <td>{$row['ngaysinh']}</td>
        <td>{$row['gioitinh']}</td>
        <td>{$row['donvi']}</td>
        <td>{$row['chucvu']}</td>
        <td>{$row['dienthoai']}</td>
    </tr>";
}
echo "</table>";
?>
</body></html>