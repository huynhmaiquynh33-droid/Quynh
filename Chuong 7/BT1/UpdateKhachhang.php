<?php
include 'Connection.php';
$makh      = $_POST['makh'];
$tenkh     = $_POST['tenkh'];
$dienthoai = $_POST['dienthoai'];
$diachi    = $_POST['diachi'];

$sql = "UPDATE KHACHHANG
        SET tenkh='$tenkh', dienthoai='$dienthoai', diachi='$diachi'
        WHERE makh='$makh'";

if (mysqli_query($conn, $sql))
    echo "Cập nhật thành công!";
else
    echo "Lỗi: " . mysqli_error($conn);
?>