<?php
include 'Connection.php';
$tenkh = $_POST['tenkh'];

$sql = "SELECT HOADON.*, KHACHHANG.tenkh, HANGHOA.tenhang
        FROM HOADON
        INNER JOIN KHACHHANG ON HOADON.makh = KHACHHANG.makh
        INNER JOIN HANGHOA ON HOADON.mahang = HANGHOA.mahang
        WHERE KHACHHANG.tenkh LIKE '%$tenkh%'";

$result = mysqli_query($conn, $sql);

echo "<table border='1'>";
echo "<tr><th>Mã HD</th><th>Tên KH</th><th>Tên hàng</th><th>Số lượng</th><th>Thành tiền</th></tr>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>
        <td>{$row['mahd']}</td>
        <td>{$row['tenkh']}</td>
        <td>{$row['tenhang']}</td>
        <td>{$row['soluong']}</td>
        <td>{$row['thanhtien']}</td>
    </tr>";
}
echo "</table>";
?>