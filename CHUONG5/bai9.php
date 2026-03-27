<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Bảng cửu chương</title>

<style>
body{
font-family:Arial;
}
table{
margin:auto;
}
td{
padding:6px 20px;
vertical-align:top;
}
</style>

</head>
<body>

<h2 style="text-align:center;">BẢNG CỬU CHƯƠNG 1 - 10</h2>

<table border="0">

<?php

for($i = 1; $i <= 10; $i+=5)
{
    echo "<tr>";

    for($j = $i; $j < $i+5; $j++)
    {
        echo "<td>";

        for($k = 1; $k <= 10; $k++)
        {
            $kq = $j * $k;
            echo "$j x $k = $kq <br>";
        }

        echo "</td>";
    }

    echo "</tr>";
}

?>

</table>

</body>
</html>