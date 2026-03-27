<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Đếm ký tự</title>
</head>
<body>

<h2>Đếm số ký tự trong chuỗi</h2>

<form method="post">
Chuỗi: <input type="text" name="chuoi"><br><br>
Ký tự cần tìm: <input type="text" name="kytu"><br><br>
<input type="submit" value="Đếm">
</form>

<?php
if(isset($_POST["chuoi"]))
{
    $s = $_POST["chuoi"];
    $c = $_POST["kytu"];

    $dem = substr_count($s,$c);

    echo "Số lần xuất hiện của '$c' là: $dem";
}
?>

</body>
</html>