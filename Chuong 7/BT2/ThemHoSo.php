<?php
include 'Connection.php';
if (isset($_POST['manv'])) {
    $sql = "INSERT INTO NHANVIEN VALUES
    ('{$_POST['manv']}','{$_POST['hoten']}','{$_POST['ngaysinh']}',
    '{$_POST['gioitinh']}','{$_POST['diachi']}','{$_POST['dienthoai']}',
    '{$_POST['donvi']}','{$_POST['chucvu']}',{$_POST['luongcb']},{$_POST['hesoluong']})";
    if (mysqli_query($conn, $sql))
        echo "<p style='color:green'>Thêm thành công!</p>";
    else
        echo "<p style='color:red'>Lỗi: " . mysqli_error($conn) . "</p>";
}
?>
<!DOCTYPE html>
<html lang="vi">
<head><meta charset="UTF-8"><title>Thêm Hồ Sơ</title></head>
<body>
<h2>Thêm Hồ Sơ Nhân Viên</h2>
<a href="index.php">← Trang chủ</a><br><br>
<form method="POST">
Mã NV: <input type="text" name="manv"><br><br>
Họ tên: <input type="text" name="hoten"><br><br>
Ngày sinh: <input type="date" name="ngaysinh"><br><br>
Giới tính: <select name="gioitinh"><option>Nam</option><option>Nữ</option></select><br><br>
Địa chỉ: <input type="text" name="diachi"><br><br>
Điện thoại: <input type="text" name="dienthoai"><br><br>
Đơn vị: <select name="donvi">
    <option>Khoa KT & CN</option>
    <option>Khoa Sư phạm</option>
    <option>Khoa NN&TS</option>
    <option>Khoa Kinh tế và Luật</option>
</select><br><br>
Chức vụ: <input type="text" name="chucvu"><br><br>
Lương cơ bản: <input type="number" name="luongcb"><br><br>
Hệ số lương: <input type="number" step="0.1" name="hesoluong"><br><br>
<input type="submit" value="Thêm hồ sơ">
</form>
</body></html>