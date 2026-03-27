<?php
include 'Connection.php';
$table = $_POST['table'];

$result = mysqli_query($conn, "SELECT * FROM $table");
$count  = mysqli_num_rows($result);

echo "<h2>Danh sách $table</h2>";
echo "<p>Danh sách gồm có $count mặt hàng</p>";

// Thống kê theo NSX (chỉ với bảng HANGHOA)
if ($table == 'HANGHOA') {
    $rs = mysqli_query($conn, "SELECT tennsx, COUNT(*) as so
                                FROM HANGHOA
                                INNER JOIN NHASANXUAT ON HANGHOA.mansx = NHASANXUAT.mansx
                                GROUP BY HANGHOA.mansx");
    while ($r = mysqli_fetch_assoc($rs))
        echo "Nhà sản xuất {$r['tennsx']} có: {$r['so']}<br>";
}

// In bảng dữ liệu
echo "<table border='1'>";
$first = true;
while ($row = mysqli_fetch_assoc($result)) {
    if ($first) {
        echo "<tr>";
        foreach (array_keys($row) as $col) echo "<th>$col</th>";
        echo "</tr>";
        $first = false;
    }
    echo "<tr>";
    foreach ($row as $val) echo "<td>$val</td>";
    echo "</tr>";
}
echo "</table>";
?>

<!-- http://localhost/l-p-tr-nh-web/Chuong 7/BT1/InsertHanghoa.html
http://localhost/l-p-tr-nh-web/Chuong 7/BT1/List.html --> -->