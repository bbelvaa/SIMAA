<!DOCTYPE html>
<html lang="en">
<head>
    <title>SIMAA</title>
    <link rel="stylesheet" type="text/css" href="dashboard_pegawai.css">
</head>
<body>
    <header>
        <h1>SIMAA</h1>
    </header>
    <nav>
        <ul>
            <li class="icon">
                <img src="img/user.svg" alt="Icon">
                <i class="arrow down"></i>
            </li>
        </ul>
    </nav>
    <div class="container">
        <aside class="sidebar">
            <div class="profile">
                <img src="img/user.svg" alt="User Icon" class="profile-icon">
                <h2>RIO</h2>
                <p class="role">Administrator</p>
            </div>
            <ul class="menu">
                <li><a href="dashboard_pegawai.html">Dashboard</a></li>
                <li><a href="daftaraset_pegawai.html">Daftar Aset</a></li>
                <li><a href="#">Laporan Kondisi Aset</a></li>
            </ul>
        </aside>
        <main class="main-content">
            <div class="asset-detail">
                <h2>Detail Informasi Aset</h2>
                <h3>Epson EcoTank L3210</h3>
                <img src="img/epson_ecotank_l3210.jpg" alt="Epson EcoTank L3210">
                <p>Epson EcoTank L3210 adalah printer multifungsi yang dirancang untuk menghemat biaya cetak dan meningkatkan produktivitas. Printer ini bisa menghasilkan cetak dokumen putih hitam hingga 4500 halaman dan warna hingga 7500 halaman.</p>
                <button onclick="goBack()">Kembali</button>
            </div>
        </main>
    </div>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>
