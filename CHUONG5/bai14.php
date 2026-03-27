<!DOCTYPE html>
<html>
<head>
    <title>Câu 14 - Ma trận số thực</title>
</head>
<body>
    <h3>Nhập ma trận số thực</h3>
    <form method="POST" action="">
        <label>Nhập ma trận (mỗi hàng xuống dòng, các số cách nhau bởi khoảng trắng):</label><br>
        <textarea name="chuoi_matran" rows="6" cols="40"><?php 
            echo isset($_POST['chuoi_matran']) ? $_POST['chuoi_matran'] : "1.1 2.3 3.1 4.0 5.0\n6.2 7.7 8.8 9.5 1.2\n4.6 1.9 3.6 8.9 1.5\n1.6 1.7 1.8 1.9 2.0"; 
        ?></textarea><br>
        <button type="submit" name="submit_cau14">Thực hiện</button>
    </form>
    <hr>

    <?php
    if (isset($_POST['submit_cau14']) && $_POST['chuoi_matran'] != "") {
        
        // --- XỬ LÝ CHUỖI THÀNH MA TRẬN 2 CHIỀU ---
        $chuoi_matran = trim($_POST['chuoi_matran']);
        // Cắt theo dấu xuống dòng để lấy từng dòng
        $cac_dong = explode("\n", $chuoi_matran); 
        
        $matran = array();
        foreach ($cac_dong as $dong) {
            // Loại bỏ khoảng trắng thừa và cắt dòng thành các số
            $dong_so = explode(" ", trim($dong));
            
            $dong_tam = array();
            foreach ($dong_so as $so) {
                if ($so != "") { // Bỏ qua nếu có dư khoảng trắng
                    $dong_tam[] = (float)$so; // Ép về số thực
                }
            }
            if (count($dong_tam) > 0) {
                $matran[] = $dong_tam; // Thêm mảng dòng vào ma trận
            }
        }

        // --- CÁC HÀM XỬ LÝ ---
        function timMaxMaTran($matran) {
            $max = $matran[0][0];
            foreach ($matran as $dong) {
                foreach ($dong as $cot) {
                    if ($cot > $max) $max = $cot;
                }
            }
            return $max;
        }

        function timMinMaTran($matran) {
            $min = $matran[0][0];
            foreach ($matran as $dong) {
                foreach ($dong as $cot) {
                    if ($cot < $min) $min = $cot;
                }
            }
            return $min;
        }

        function tinhTongMaTran($matran) {
            $tong = 0;
            foreach ($matran as $dong) {
                foreach ($dong as $cot) {
                    $tong += $cot;
                }
            }
            return $tong;
        }

        function inMaTran($matran) {
            echo "<table border='1' cellspacing='0' cellpadding='8' style='text-align: center;'>";
            foreach ($matran as $dong) {
                echo "<tr>";
                foreach ($dong as $cot) {
                    echo "<td>" . $cot . "</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
        }

        // --- IN KẾT QUẢ ---
        echo "<b>d) Ma trận vừa nhập:</b><br><br>";
        inMaTran($matran);
        echo "<br><b>a) Số lớn nhất trong ma trận:</b> " . timMaxMaTran($matran) . "<br>";
        echo "<b>b) Số nhỏ nhất trong ma trận:</b> " . timMinMaTran($matran) . "<br>";
        echo "<b>c) Tổng các số trong ma trận:</b> " . tinhTongMaTran($matran) . "<br>";
    }
    ?>
</body>
</html>