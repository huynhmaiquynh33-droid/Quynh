<?php
include 'Connection.php';
$mahang  = $_POST['mahang'];
$tenhang = $_POST['tenhang'];
$mansx   = $_POST['mansx'];
$namsx   = $_POST['namsx'];
$gia     = $_POST['gia'];

$sql = "INSERT INTO HANGHOA (mahang,tenhang,mansx,namsx,gia)
        VALUES ('$mahang','$tenhang','$mansx',$namsx,$gia)";

if (mysqli_query($conn, $sql))
    echo "Thêm thành công! <a href='InsertHanghoa.html'>Thêm tiếp</a>";
else
    echo "Lỗi: " . mysqli_error($conn);
?>