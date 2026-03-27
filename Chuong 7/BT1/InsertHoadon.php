<?php
include 'Connection.php';
$mahd      = $_POST['mahd'];
$makh      = $_POST['makh'];
$mahang    = $_POST['mahang'];
$soluong   = $_POST['soluong'];
$thanhtien = $_POST['thanhtien'];

$sql = "INSERT INTO HOADON (mahd,makh,mahang,soluong,thanhtien)
        VALUES ('$mahd','$makh','$mahang',$soluong,$thanhtien)";

if (mysqli_query($conn, $sql))
    echo "Thêm thành công!";
else
    echo "Lỗi: " . mysqli_error($conn);
?>