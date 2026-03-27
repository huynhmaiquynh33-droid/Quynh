<?php include 'Connection.php'; ?>
<!DOCTYPE html>
<html lang="vi">
<head><meta charset="UTF-8"><title>Tìm Kiếm</title></head>
<body>
<h2>Tìm Kiếm Nhân Viên</h2>
<a href="index.php">← Trang chủ</a><br><br>
<form method="POST">
    Họ tên: <input type="text" name="hoten">
    <input type="submit" value="Tìm">
</form>
<?php
if (isset($_POST['hoten'])) {
    $hoten  = $_POST['hoten'];
    $result = mysqli_query($conn, "SELECT * FROM NHANVIEN WHERE hoten LIKE '%$hoten%'");
    $count  = mysqli_num_rows($result);
    echo "<p>Tìm thấy: $count kết quả</p>";
    echo "<table border='1' cellpadding='6'>
    <tr><th>Mã NV</th><th>Họ Tên</th><th>Đơn Vị</th><th>Chức Vụ</th><th>Điện Thoại</th></tr>";
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
            <td>{$row['manv']}</td>
            <td>{$row['hoten']}</td>
            <td>{$row['donvi']}</td>
            <td>{$row['chucvu']}</td>
            <td>{$row['dienthoai']}</td>
        </tr>";
    }
    echo "</table>";
}
?>
</body></html>