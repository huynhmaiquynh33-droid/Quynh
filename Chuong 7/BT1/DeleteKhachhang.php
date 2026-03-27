<?php
include 'Connection.php';
$makh = $_POST['makh'];

// Xóa hóa đơn liên quan trước
mysqli_query($conn, "DELETE FROM HOADON WHERE makh='$makh'");

// Xóa khách hàng
$sql = "DELETE FROM KHACHHANG WHERE makh='$makh'";

if (mysqli_query($conn, $sql))
    echo "Xóa thành công!";
else
    echo "Lỗi: " . mysqli_error($conn);
?>