<?php include 'Connection.php'; ?>
<!DOCTYPE html>
<html lang="vi">
<head><meta charset="UTF-8"><title>Bảng Lương</title></head>
<body>
<h2>Bảng Lương Toàn Trường</h2>
<a href="index.php">← Trang chủ</a><br><br>
<?php
$result = mysqli_query($conn, "SELECT *, (luongcb*hesoluong) AS luong_thuc FROM NHANVIEN");
echo "<table border='1' cellpadding='6'>
<tr><th>Mã NV</th><th>Họ Tên</th><th>Đơn Vị</th><th>Chức Vụ</th><th>Lương CB</th><th>Hệ Số</th><th>Lương Thực</th></tr>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
        <td>{$row['manv']}</td>
        <td>{$row['hoten']}</td>
        <td>{$row['donvi']}</td>
        <td>{$row['chucvu']}</td>
        <td>" . number_format($row['luongcb'],0,',','.') . "</td>
        <td>{$row['hesoluong']}</td>
        <td>" . number_format($row['luong_thuc'],0,',','.') . "</td>
    </tr>";
}
echo "</table>";
?>
</body></html>