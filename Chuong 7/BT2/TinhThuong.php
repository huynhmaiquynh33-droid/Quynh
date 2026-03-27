<?php include 'Connection.php'; ?>
<!DOCTYPE html>
<html lang="vi">
<head><meta charset="UTF-8"><title>Tính Thưởng</title></head>
<body>
<h2>Tính Tiền Thưởng (10% lương thực)</h2>
<a href="index.php">← Trang chủ</a><br><br>
<?php
$result = mysqli_query($conn, "SELECT * FROM NHANVIEN");
echo "<table border='1' cellpadding='6'>
<tr><th>Mã NV</th><th>Họ Tên</th><th>Lương Thực</th><th>Thưởng 10%</th></tr>";
while ($row = mysqli_fetch_assoc($result)) {
    $luong  = $row['luongcb'] * $row['hesoluong'];
    $thuong = $luong * 0.1;
    echo "<tr>
        <td>{$row['manv']}</td>
        <td>{$row['hoten']}</td>
        <td>" . number_format($luong,0,',','.') . " đ</td>
        <td>" . number_format($thuong,0,',','.') . " đ</td>
    </tr>";
}
echo "</table>";
?>
</body></html>

<!-- Connection.php      ← kết nối database quanly_nhansu
index.php           ← trang chủ (đã có)
logo.png            ← logo trường (đã có)
DanhSach.php        ← liệt kê toàn bộ nhân viên
XemHoSo.php         ← xem chi tiết 1 nhân viên
ThemHoSo.php        ← thêm nhân viên mới
SuaHoSo.php         ← sửa thông tin nhân viên
XoaHoSo.php         ← xóa nhân viên
BangLuong.php       ← bảng lương toàn trường
TimKiem.php         ← tìm theo tên
TinhLuong.php       ← tính lương 1 nhân viên
TinhThuong.php      ← tính thưởng toàn trường
```


http://localhost/l-p-tr-nh-web/Chuong%207/BT2/index.php -->