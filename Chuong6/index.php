<?php
$conn = mysqli_connect("localhost", "root", "", "quanly_cuahang");
if (!$conn) die("Lỗi kết nối: " . mysqli_connect_error());
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Cửa Hàng</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Playfair+Display:wght@700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --m50:  #effdf8;
            --m100: #d0fbe8;
            --m200: #a4f4d0;
            --m300: #68e8b4;
            --m400: #2ed49a;
            --m500: #0fb97e;
            --m600: #059666;
            --m700: #067754;
            --m800: #085f45;
            --m900: #094e3a;
            --bg:   #f4fdf9;
            --card: #ffffff;
            --text: #0d2e20;
            --muted:#7aaa91;
            --line: #d0fbe8;
        }
        *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
        html { scroll-behavior: smooth; }
        body {
            font-family: 'Outfit', sans-serif;
            background: var(--bg);
            color: var(--text);
            min-height: 100vh;
            overflow-x: hidden;
        }

        /* SIDEBAR */
        .sidebar {
            position: fixed; left: 0; top: 0;
            width: 240px; height: 100vh;
            background: linear-gradient(180deg, var(--m800) 0%, var(--m900) 100%);
            display: flex; flex-direction: column;
            z-index: 100;
            box-shadow: 4px 0 32px rgba(5,150,102,0.18);
        }
        .sidebar-brand {
            padding: 32px 24px 24px;
            border-bottom: 1px solid rgba(255,255,255,0.08);
        }
        .sidebar-brand .logo {
            width: 44px; height: 44px;
            background: linear-gradient(135deg, var(--m300), var(--m500));
            border-radius: 12px;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.4rem; margin-bottom: 12px;
            box-shadow: 0 4px 16px rgba(46,212,154,0.35);
        }
        .sidebar-brand h2 {
            font-family: 'Playfair Display', serif;
            font-size: 1.05rem; color: #fff; line-height: 1.3;
        }
        .sidebar-brand p {
            font-size: 0.72rem; color: var(--m300);
            margin-top: 3px; letter-spacing: 0.5px; text-transform: uppercase;
        }
        .sidebar-nav {
            flex: 1; padding: 20px 14px;
            display: flex; flex-direction: column; gap: 4px;
        }
        .nav-label {
            font-size: 0.65rem; color: var(--m400);
            text-transform: uppercase; letter-spacing: 1.2px;
            font-weight: 600; padding: 8px 10px 4px;
        }
        .nav-link {
            display: flex; align-items: center; gap: 10px;
            padding: 10px 14px; border-radius: 10px;
            text-decoration: none; color: rgba(255,255,255,0.65);
            font-size: 0.88rem; font-weight: 500; transition: all 0.2s;
        }
        .nav-link:hover, .nav-link.active {
            background: rgba(46,212,154,0.15); color: var(--m200);
        }
        .nav-link .icon { font-size: 1rem; width: 20px; text-align: center; }
        .nav-link .count {
            margin-left: auto; font-size: 0.7rem;
            background: rgba(46,212,154,0.2); color: var(--m300);
            padding: 2px 8px; border-radius: 999px; font-weight: 600;
        }
        .sidebar-footer {
            padding: 16px 24px;
            border-top: 1px solid rgba(255,255,255,0.08);
            font-size: 0.72rem; color: var(--m500);
        }

        /* MAIN */
        .main { margin-left: 240px; min-height: 100vh; }
        .topbar {
            background: var(--card);
            border-bottom: 1px solid var(--line);
            padding: 18px 40px;
            display: flex; align-items: center; justify-content: space-between;
            position: sticky; top: 0; z-index: 50;
        }
        .topbar-title { font-size: 1.1rem; font-weight: 700; color: var(--text); }
        .topbar-title span { color: var(--m500); }
        .topbar-stats { display: flex; gap: 12px; }
        .stat-pill {
            display: flex; align-items: center; gap: 7px;
            background: var(--m50); border: 1px solid var(--m200);
            padding: 6px 14px; border-radius: 999px;
            font-size: 0.78rem; font-weight: 600; color: var(--m700);
        }
        .stat-pill .dot {
            width: 7px; height: 7px; border-radius: 50%;
            background: var(--m400); animation: pulse 2s infinite;
        }
        @keyframes pulse {
            0%,100%{opacity:1;transform:scale(1)}
            50%{opacity:0.5;transform:scale(0.8)}
        }

        /* CONTENT */
        .content { padding: 36px 40px 60px; }
        .stats-grid {
            display: grid; grid-template-columns: repeat(5,1fr);
            gap: 16px; margin-bottom: 40px;
        }
        .stat-card {
            background: var(--card); border: 1px solid var(--line);
            border-radius: 16px; padding: 20px;
            position: relative; overflow: hidden;
            transition: transform 0.2s, box-shadow 0.2s;
            animation: fadeUp 0.5s ease both;
        }
        .stat-card:hover { transform: translateY(-3px); box-shadow: 0 12px 32px rgba(5,150,102,0.12); }
        .stat-card::before {
            content: ''; position: absolute;
            top: 0; left: 0; right: 0; height: 3px;
            background: linear-gradient(90deg, var(--m400), var(--m300));
        }
        .stat-card .sc-icon { font-size: 1.6rem; margin-bottom: 10px; }
        .stat-card .sc-num {
            font-family: 'Playfair Display', serif;
            font-size: 2rem; font-weight: 800;
            color: var(--m600); line-height: 1;
        }
        .stat-card .sc-label {
            font-size: 0.75rem; color: var(--muted);
            margin-top: 4px; font-weight: 500;
            text-transform: uppercase; letter-spacing: 0.5px;
        }
        .stat-card:nth-child(1){animation-delay:0.05s}
        .stat-card:nth-child(2){animation-delay:0.10s}
        .stat-card:nth-child(3){animation-delay:0.15s}
        .stat-card:nth-child(4){animation-delay:0.20s}
        .stat-card:nth-child(5){animation-delay:0.25s}

        @keyframes fadeUp {
            from{opacity:0;transform:translateY(20px)}
            to{opacity:1;transform:translateY(0)}
        }

        /* SECTION */
        .section { margin-bottom: 48px; animation: fadeUp 0.6s ease both; }
        .section:nth-child(2){animation-delay:0.10s}
        .section:nth-child(3){animation-delay:0.18s}
        .section:nth-child(4){animation-delay:0.26s}
        .section:nth-child(5){animation-delay:0.34s}
        .section:nth-child(6){animation-delay:0.42s}

        .section-head {
            display: flex; align-items: center;
            gap: 14px; margin-bottom: 18px;
        }
        .section-icon {
            width: 42px; height: 42px; border-radius: 12px;
            background: linear-gradient(135deg, var(--m300), var(--m600));
            display: flex; align-items: center; justify-content: center;
            font-size: 1.2rem;
            box-shadow: 0 4px 14px rgba(14,185,129,0.25); flex-shrink: 0;
        }
        .section-info h3 {
            font-family: 'Playfair Display', serif;
            font-size: 1.2rem; color: var(--text);
        }
        .section-info p { font-size: 0.75rem; color: var(--muted); margin-top: 1px; }
        .section-actions { margin-left: auto; }
        .tag {
            font-size: 0.75rem; padding: 4px 12px;
            border-radius: 999px; background: var(--m100);
            color: var(--m700); font-weight: 600; border: 1px solid var(--m200);
        }

        /* TABLE */
        .table-card {
            background: var(--card); border-radius: 20px;
            overflow: hidden; border: 1px solid var(--line);
            box-shadow: 0 2px 20px rgba(5,150,102,0.06);
        }
        table { width: 100%; border-collapse: collapse; }
        thead tr { background: linear-gradient(90deg, var(--m700), var(--m500)); }
        thead th {
            padding: 14px 20px; text-align: left;
            color: rgba(255,255,255,0.9);
            font-size: 0.75rem; font-weight: 600;
            letter-spacing: 0.8px; text-transform: uppercase;
        }
        tbody tr { border-bottom: 1px solid var(--line); transition: all 0.18s; }
        tbody tr:last-child { border-bottom: none; }
        tbody tr:hover { background: linear-gradient(90deg, var(--m50), transparent); }
        tbody td { padding: 13px 20px; font-size: 0.9rem; color: var(--text); vertical-align: middle; }

        /* BADGES */
        .b {
            display: inline-flex; align-items: center;
            padding: 4px 11px; border-radius: 8px;
            font-size: 0.78rem; font-weight: 700; letter-spacing: 0.3px;
        }
        .b-id    { background: var(--m100); color: var(--m800); border: 1px solid var(--m200); }
        .b-price { background: #ecfdf5; color: #065f46; border: 1px solid #a7f3d0; }
        .b-qty   { background: #fffbeb; color: #92400e; border: 1px solid #fde68a; }
        .b-country { background: #eff6ff; color: #1e40af; border: 1px solid #bfdbfe; font-size: 0.72rem; }

        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-thumb { background: var(--m300); border-radius: 3px; }
    </style>
</head>
<body>

<?php
$cnt = [];
$tables = ['NHASANXUAT','HANGHOA','KHACHHANG','HOADON','TONKHO'];
foreach ($tables as $t) {
    $r = mysqli_query($conn, "SELECT COUNT(*) as c FROM $t");
    $cnt[$t] = $r ? mysqli_fetch_assoc($r)['c'] : 0;
}
?>

<!-- SIDEBAR -->
<aside class="sidebar">
    <div class="sidebar-brand">
        <div class="logo">🛒</div>
        <h2>Quản Lý<br>Cửa Hàng</h2>
        <p>quanly_cuahang</p>
    </div>
    <nav class="sidebar-nav">
        <div class="nav-label">Danh mục</div>
        <a href="#nsx" class="nav-link"><span class="icon">🏭</span> Nhà Sản Xuất <span class="count"><?= $cnt['NHASANXUAT'] ?></span></a>
        <a href="#hh"  class="nav-link"><span class="icon">💻</span> Hàng Hóa <span class="count"><?= $cnt['HANGHOA'] ?></span></a>
        <a href="#kh"  class="nav-link"><span class="icon">👤</span> Khách Hàng <span class="count"><?= $cnt['KHACHHANG'] ?></span></a>
        <a href="#hd"  class="nav-link"><span class="icon">🧾</span> Hóa Đơn <span class="count"><?= $cnt['HOADON'] ?></span></a>
        <a href="#tk"  class="nav-link"><span class="icon">📦</span> Tồn Kho <span class="count"><?= $cnt['TONKHO'] ?></span></a>
    </nav>
    <div class="sidebar-footer">© 2025 Quản Lý Cửa Hàng</div>
</aside>

<!-- MAIN -->
<div class="main">
    <div class="topbar">
        <div class="topbar-title">Tổng quan <span>Dữ liệu</span></div>
        <div class="topbar-stats">
            <div class="stat-pill"><div class="dot"></div> Đang kết nối</div>
            <div class="stat-pill">🗄️ quanly_cuahang</div>
        </div>
    </div>

    <div class="content">

        <!-- STATS -->
        <div class="stats-grid">
            <div class="stat-card"><div class="sc-icon">🏭</div><div class="sc-num"><?= $cnt['NHASANXUAT'] ?></div><div class="sc-label">Nhà Sản Xuất</div></div>
            <div class="stat-card"><div class="sc-icon">💻</div><div class="sc-num"><?= $cnt['HANGHOA'] ?></div><div class="sc-label">Hàng Hóa</div></div>
            <div class="stat-card"><div class="sc-icon">👤</div><div class="sc-num"><?= $cnt['KHACHHANG'] ?></div><div class="sc-label">Khách Hàng</div></div>
            <div class="stat-card"><div class="sc-icon">🧾</div><div class="sc-num"><?= $cnt['HOADON'] ?></div><div class="sc-label">Hóa Đơn</div></div>
            <div class="stat-card"><div class="sc-icon">📦</div><div class="sc-num"><?= $cnt['TONKHO'] ?></div><div class="sc-label">Tồn Kho</div></div>
        </div>

        <!-- 1. NHÀ SẢN XUẤT -->
        <?php $r1 = mysqli_query($conn, "SELECT * FROM NHASANXUAT"); ?>
        <div class="section" id="nsx">
            <div class="section-head">
                <div class="section-icon">🏭</div>
                <div class="section-info"><h3>Nhà Sản Xuất</h3><p>Danh sách đối tác sản xuất hàng hóa</p></div>
                <div class="section-actions"><span class="tag"><?= $cnt['NHASANXUAT'] ?> bản ghi</span></div>
            </div>
            <div class="table-card"><table>
                <thead><tr><th>Mã NSX</th><th>Tên Nhà Sản Xuất</th><th>Quốc Gia</th></tr></thead>
                <tbody>
                <?php while ($row = mysqli_fetch_assoc($r1)): ?>
                <tr>
                    <td><span class="b b-id"><?= $row['mansx'] ?></span></td>
                    <td><?= $row['tennsx'] ?></td>
                    <td><span class="b b-country">🌐 <?= $row['quocgia'] ?></span></td>
                </tr>
                <?php endwhile; ?>
                </tbody>
            </table></div>
        </div>

        <!-- 2. HÀNG HÓA -->
        <?php $r2 = mysqli_query($conn, "SELECT HANGHOA.*, NHASANXUAT.tennsx FROM HANGHOA INNER JOIN NHASANXUAT ON HANGHOA.mansx = NHASANXUAT.mansx"); ?>
        <div class="section" id="hh">
            <div class="section-head">
                <div class="section-icon">💻</div>
                <div class="section-info"><h3>Hàng Hóa</h3><p>Toàn bộ danh mục hàng hóa kinh doanh</p></div>
                <div class="section-actions"><span class="tag"><?= $cnt['HANGHOA'] ?> bản ghi</span></div>
            </div>
            <div class="table-card"><table>
                <thead><tr><th>Mã Hàng</th><th>Tên Hàng</th><th>Nhà Sản Xuất</th><th>Năm SX</th><th>Giá</th></tr></thead>
                <tbody>
                <?php while ($row = mysqli_fetch_assoc($r2)): ?>
                <tr>
                    <td><span class="b b-id"><?= $row['mahang'] ?></span></td>
                    <td><?= $row['tenhang'] ?></td>
                    <td><?= $row['tennsx'] ?></td>
                    <td><?= $row['namsx'] ?></td>
                    <td><span class="b b-price">$<?= number_format($row['gia']) ?></span></td>
                </tr>
                <?php endwhile; ?>
                </tbody>
            </table></div>
        </div>

        <!-- 3. KHÁCH HÀNG -->
        <?php $r3 = mysqli_query($conn, "SELECT * FROM KHACHHANG"); ?>
        <div class="section" id="kh">
            <div class="section-head">
                <div class="section-icon">👤</div>
                <div class="section-info"><h3>Khách Hàng</h3><p>Danh sách khách hàng của cửa hàng</p></div>
                <div class="section-actions"><span class="tag"><?= $cnt['KHACHHANG'] ?> bản ghi</span></div>
            </div>
            <div class="table-card"><table>
                <thead><tr><th>Mã KH</th><th>Tên KH</th><th>Năm Sinh</th><th>Điện Thoại</th><th>Địa Chỉ</th></tr></thead>
                <tbody>
                <?php while ($row = mysqli_fetch_assoc($r3)): ?>
                <tr>
                    <td><span class="b b-id"><?= $row['makh'] ?></span></td>
                    <td><?= $row['tenkh'] ?></td>
                    <td><?= $row['namsinh'] ?></td>
                    <td><?= $row['dienthoai'] ?></td>
                    <td><?= $row['diachi'] ?></td>
                </tr>
                <?php endwhile; ?>
                </tbody>
            </table></div>
        </div>

        <!-- 4. HÓA ĐƠN -->
        <?php $r4 = mysqli_query($conn, "SELECT HOADON.*, KHACHHANG.tenkh, HANGHOA.tenhang FROM HOADON INNER JOIN KHACHHANG ON HOADON.makh = KHACHHANG.makh INNER JOIN HANGHOA ON HOADON.mahang = HANGHOA.mahang"); ?>
        <div class="section" id="hd">
            <div class="section-head">
                <div class="section-icon">🧾</div>
                <div class="section-info"><h3>Hóa Đơn</h3><p>Lịch sử giao dịch mua bán</p></div>
                <div class="section-actions"><span class="tag"><?= $cnt['HOADON'] ?> bản ghi</span></div>
            </div>
            <div class="table-card"><table>
                <thead><tr><th>Mã HD</th><th>Khách Hàng</th><th>Hàng Hóa</th><th>Số Lượng</th><th>Thành Tiền</th></tr></thead>
                <tbody>
                <?php while ($row = mysqli_fetch_assoc($r4)): ?>
                <tr>
                    <td><span class="b b-id"><?= $row['mahd'] ?></span></td>
                    <td><?= $row['tenkh'] ?></td>
                    <td><?= $row['tenhang'] ?></td>
                    <td><span class="b b-qty">×<?= $row['soluong'] ?></span></td>
                    <td><span class="b b-price">$<?= number_format($row['thanhtien']) ?></span></td>
                </tr>
                <?php endwhile; ?>
                </tbody>
            </table></div>
        </div>

        <!-- 5. TỒN KHO -->
        <?php $r5 = mysqli_query($conn, "SELECT * FROM TONKHO"); ?>
        <div class="section" id="tk">
            <div class="section-head">
                <div class="section-icon">📦</div>
                <div class="section-info"><h3>Tồn Kho</h3><p>Số lượng hàng hóa hiện có trong kho</p></div>
                <div class="section-actions"><span class="tag"><?= $cnt['TONKHO'] ?> bản ghi</span></div>
            </div>
            <div class="table-card"><table>
                <thead><tr><th>Mã Hàng</th><th>Tên Hàng</th><th>Mã NSX</th><th>Năm SX</th><th>Giá</th><th>Tồn Kho</th></tr></thead>
                <tbody>
                <?php while ($row = mysqli_fetch_assoc($r5)): ?>
                <tr>
                    <td><span class="b b-id"><?= $row['mahang'] ?></span></td>
                    <td><?= $row['tenhang'] ?></td>
                    <td><?= $row['mansx'] ?></td>
                    <td><?= $row['namsx'] ?></td>
                    <td><span class="b b-price">$<?= number_format($row['gia']) ?></span></td>
                    <td><span class="b b-qty">📦 <?= $row['soluong'] ?></span></td>
                </tr>
                <?php endwhile; ?>
                </tbody>
            </table></div>
        </div>

    </div>
</div>

<script>
const sections = document.querySelectorAll('.section[id]');
const navLinks = document.querySelectorAll('.nav-link');
window.addEventListener('scroll', () => {
    let current = '';
    sections.forEach(s => { if (window.scrollY >= s.offsetTop - 120) current = s.id; });
    navLinks.forEach(l => {
        l.classList.remove('active');
        if (l.getAttribute('href') === '#' + current) l.classList.add('active');
    });
});
</script>
</body>
</html>

<!-- http://localhost/l-p-tr-nh-web/Chuong6/index.php -->