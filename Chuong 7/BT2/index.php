<?php
// Trang chủ - Quản lý nhân sự Trường ĐH Bạc Liêu
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Nhân Sự - Trường ĐH Bạc Liêu</title>
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --blue:   #1a3a6b;
            --blue2:  #2255a4;
            --blue3:  #3d72c9;
            --accent: #e8a020;
            --light:  #f0f4fa;
            --border: #c8d4e8;
            --text:   #1a2744;
            --muted:  #5a6a8a;
            --white:  #ffffff;
            --sidebar:#dce6f5;
            --hover:  #b8cce8;
        }
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: 'Be Vietnam Pro', sans-serif; background: var(--light); color: var(--text); }

        .header {
            background: var(--white);
            border-bottom: 3px solid var(--blue);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 24px;
        }
        .header img { height: 70px; object-fit: contain; }
        .header-title {
            font-size: 2rem;
            font-weight: 800;
            color: var(--blue);
            letter-spacing: 1px;
            line-height: 1.1;
            text-align: right;
        }
        .header-title span { color: var(--accent); display: block; font-size: 1.5rem; }

        .layout { display: flex; min-height: calc(100vh - 160px); }

        .sidebar { width: 190px; flex-shrink: 0; background: var(--white); border-right: 2px solid var(--border); }
        .sidebar-group { margin-bottom: 2px; }
        .sidebar-group-title {
            background: var(--blue);
            color: var(--white);
            font-size: 0.82rem;
            font-weight: 700;
            padding: 8px 12px;
        }
        .sidebar-link {
            display: block;
            padding: 7px 16px;
            font-size: 0.83rem;
            color: var(--text);
            text-decoration: none;
            border-bottom: 1px solid var(--border);
            background: var(--sidebar);
            transition: background 0.15s;
        }
        .sidebar-link:hover { background: var(--hover); color: var(--blue); font-weight: 600; }
        .sidebar-home {
            display: block;
            padding: 9px 12px;
            font-size: 0.88rem;
            font-weight: 700;
            color: var(--white);
            text-decoration: none;
            background: var(--blue2);
            border-bottom: 2px solid var(--border);
        }
        .sidebar-home:hover { background: var(--blue3); }

        .content { flex: 1; padding: 20px 28px; background: var(--white); }
        .content h2 { font-size: 1rem; font-weight: 800; color: var(--blue); margin-bottom: 6px; }
        .content h3 { font-size: 0.95rem; font-weight: 700; color: var(--blue2); margin: 16px 0 6px; }

        .content-inner { display: flex; gap: 24px; align-items: flex-start; margin-top: 12px; }
        .content-text { flex: 1; font-size: 0.88rem; line-height: 1.75; color: var(--text); }
        .content-text p { margin-bottom: 10px; }

        .content-img {
            width: 260px;
            flex-shrink: 0;
            border: 2px solid var(--border);
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 16px rgba(26,58,107,0.12);
        }
        .content-img img {
            width: 100%;
            display: block;
            object-fit: cover;
        }
        .content-img p {
            text-align: center;
            font-size: 0.75rem;
            color: var(--muted);
            padding: 6px;
            background: var(--light);
            border-top: 1px solid var(--border);
        }

        .footer {
            background: var(--blue);
            color: var(--white);
            padding: 14px 24px;
            font-size: 0.82rem;
            line-height: 1.9;
            border-top: 4px solid var(--accent);
        }
        .footer strong { font-size: 0.92rem; }
        .footer em { color: var(--accent); font-style: normal; font-weight: 600; }
    </style>
</head>
<body>

<div class="header">
    <img src="logo.png" alt="Logo Trường ĐH Bạc Liêu">
    <div class="header-title">
        QUẢN LÝ
        <span>NHÂN SỰ</span>
    </div>
</div>

<div class="layout">
    <nav class="sidebar">
        <a href="index.php" class="sidebar-home">🏠 Trang chủ</a>

        <div class="sidebar-group">
            <div class="sidebar-group-title">Đơn vị trực thuộc</div>
            <a href="KhoaCNTT.php" class="sidebar-link">Khoa KT &amp; CN</a>
            <a href="KhoaSuPham.php" class="sidebar-link">Khoa Sư phạm</a>
            <a href="KhoaNNTS.php" class="sidebar-link">Khoa NN&amp;TS</a>
            <a href="KhoaKinhTe.php" class="sidebar-link">Khoa Kinh tế và Luật</a>
        </div>

        <div class="sidebar-group">
            <div class="sidebar-group-title">Hồ sơ nhân viên</div>
            <a href="DanhSach.php" class="sidebar-link">Danh sách</a>
            <a href="XemHoSo.php" class="sidebar-link">Xem hồ sơ</a>
            <a href="ThemHoSo.php" class="sidebar-link">Thêm hồ sơ</a>
            <a href="SuaHoSo.php" class="sidebar-link">Sửa hồ sơ</a>
            <a href="XoaHoSo.php" class="sidebar-link">Xóa hồ sơ</a>
            <a href="TimHoSo.php" class="sidebar-link">Tìm hồ sơ</a>
        </div>

        <div class="sidebar-group">
            <div class="sidebar-group-title">Quản lý tiền lương</div>
            <a href="BangLuong.php" class="sidebar-link">Bảng lương</a>
            <a href="CapNhatHoSo.php" class="sidebar-link">Cập nhật hồ sơ</a>
            <a href="TimKiem.php" class="sidebar-link">Tìm kiếm</a>
            <a href="TinhLuong.php" class="sidebar-link">Tính lương</a>
            <a href="TinhThuong.php" class="sidebar-link">Tính thưởng</a>
        </div>
    </nav>

    <main class="content">
        <h2>Tên tiếng Anh: BAC LIEU UNIVERSITY</h2>
        <h2>Tên viết tắt: Tiếng Việt ĐHBL - Tiếng Anh BLU</h2>

        <div class="content-inner">
            <div class="content-text">
                <p>Trường ĐHBL (ĐHBL) là trường đại học công lập, là cơ sở giáo dục
                đại học đa ngành, đa hệ, được thành lập theo Quyết định số
                1558/QĐ-TTg ngày 24/11/2006 của Thủ tướng Chính phủ. Việc
                thành lập Trường ĐHBL là phù hợp theo ý chí, nguyện vọng của Đảng
                bộ và nhân dân tỉnh Bạc Liêu, đáp ứng yêu cầu đào tạo và phát triển
                nguồn nhân lực chất lượng cao, phục vụ sự nghiệp công nghiệp hóa, hiện
                đại hóa của Bạc Liêu và vùng Bán đảo Cà Mau.</p>

                <h3>II. CHỨC NĂNG NHIỆM VỤ</h3>

                <p>Về đào tạo: Tổ chức đào tạo đa dạng các cấp trình độ từ cao đẳng,
                đại học đến sau đại học và tổ chức các loại hình liên thông, vừa học
                vừa làm, liên kết, v.v. nhằm đáp ứng nhu cầu đào tạo ngày càng cao
                và đa dạng của xã hội, đặc biệt là nguồn nhân lực có chất lượng,
                phục vụ phát triển kinh tế, xã hội (KT-XH) của vùng Bán đảo Cà Mau
                và khu vực Đồng bằng sông Cửu Long.</p>

                <p>Về khoa học công nghệ: Tổ chức nghiên cứu khoa học định hướng
                ứng dụng, chú trọng giải quyết các vấn đề cấp bách và lâu dài trong
                phát triển kinh tế xã hội của địa phương và vùng. Tập trung nghiên
                cứu và chuyển giao công nghệ, ưu tiên giải quyết các vấn đề được
                xã hội đặc biệt quan tâm và thực hiện các dịch vụ khoa học phục vụ
                cộng đồng.</p>
            </div>

            <div class="content-img">
                <img src="truong.jpg" alt="Nhà điều hành Đại học Bạc Liêu">
                <p>Nhà điều hành Trường ĐH Bạc Liêu</p>
            </div>
        </div>
    </main>
</div>

<footer class="footer">
    <strong>TRƯỜNG ĐẠI HỌC BẠC LIÊU</strong><br>
    <em>Chất lượng - Sáng tạo - Trách nhiệm - Hội nhập</em><br>
    Điện thoại: 02913822653 &nbsp;|&nbsp;
    Email: mail@blu.edu.vn &nbsp;|&nbsp;
    Địa chỉ: Số 178 đường Võ Thị Sáu, P. 8, TP. Bạc Liêu, Tỉnh Bạc Liêu
</footer>

</body>
</html>