<?php
include 'Connection.php';
$row = null;
if (isset($_POST['luu'])) {
    $sql = "UPDATE NHANVIEN SET
        hoten='{$_POST['hoten']}', ngaysinh='{$_POST['ngaysinh']}',
        gioitinh='{$_POST['gioitinh']}', diachi='{$_POST['diachi']}',
        dienthoai='{$_POST['dienthoai']}', donvi='{$_POST['donvi']}',
        chucvu='{$_POST['chucvu']}', luongcb={$_POST['luongcb']},
        hesoluong={$_POST['hesoluong']}
        WHERE manv='{$_POST['manv']}'";
    if (mysqli_query($conn, $sql))
        echo "<p style='color:green'>Cập nhật thành công!</p>";
    else
        echo "<p style='color:red'>Lỗi: " . mysqli_error($conn) . "</p>";
}
if (isset($_POST['tim'])) {
    $result = mysqli_query($conn, "SELECT * FROM NHANVIEN WHERE manv='{$_POST['manv']}'");
    $row    = mysqli_fetch_assoc($result);
    if (!$row) echo "<p style='color:red'>Không tìm thấy!</p>";
}
?>
<!DOCTYPE html>
<html lang="vi">
<head><meta charset="UTF-8"><title>Sửa Hồ Sơ</title></head>
<body>
<h2>Sửa Hồ Sơ Nhân Viên</h2>
<a href="index.php">← Trang chủ</a><br><br>
<form method="POST">
    Mã NV: <input type="text" name="manv" value="<?= $row['manv'] ?? '' ?>">
    <input type="submit" name="tim" value="Tìm">
</form>
<?php if ($row): ?>
<form method="POST">
<input type="hidden" name="manv" value="<?= $row['manv'] ?>">
Họ tên: <input type="text" name="hoten" value="<?= $row['hoten'] ?>"><br><br>
Ngày sinh: <input type="date" name="ngaysinh" value="<?= $row['ngaysinh'] ?>"><br><br>
Giới tính: <input type="text" name="gioitinh" value="<?= $row['gioitinh'] ?>"><br><br>
Địa chỉ: <input type="text" name="diachi" value="<?= $row['diachi'] ?>"><br><br>
Điện thoại: <input type="text" name="dienthoai" value="<?= $row['dienthoai'] ?>"><br><br>
Đơn vị: <input type="text" name="donvi" value="<?= $row['donvi'] ?>"><br><br>
Chức vụ: <input type="text" name="chucvu" value="<?= $row['chucvu'] ?>"><br><br>
Lương CB: <input type="number" name="luongcb" value="<?= $row['luongcb'] ?>"><br><br>
Hệ số: <input type="number" step="0.1" name="hesoluong" value="<?= $row['hesoluong'] ?>"><br><br>
<input type="submit" name="luu" value="Lưu thay đổi">
</form>
<?php endif; ?>
</body></html>