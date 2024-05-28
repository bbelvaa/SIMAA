<?php
include 'koneksi.php';
include 'laporanaset_tambah.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>SIMAA - Laporan Kondisi Aset</title>
    <link rel="stylesheet" type="text/css" href="styles/laporanaset_pegawai.css">
</head>
<body>
    <header>
        <h1>SIMAA</h1>
    </header>
    <nav>
        <ul>
            <li class="logout">
                <a href="logout.php">Logout</a>
            </li>
            <li class="icon">
                <img src="img/user.svg" alt="Icon">
                <i class="arrow down"></i>
            </li>
        </ul>
    </nav>
    <div class="container">
        <div class="sidebar">
            <div class="profile">
                <img src="img/user.svg" alt="Profile Icon" class="profile-icon">
                <h2>BELVA</h2>
                <p class="role">Pegawai</p>
            </div>
            <ul class="menu">
                <li><a href="dashboard_pegawai.php">Dashboard</a></li>
                <li><a href="daftaraset_pegawai.php">Daftar Aset</a></li>
                <li class="active"><a href="laporanaset_pegawai.php">Laporan Kondisi Aset</a></li>
            </ul>
        </div>
        <main class="main-content">
        <h2>Laporan Kondisi Aset</h2>
            <div class="form-container">
                <h2>Masukkan Data Aset </h2>
                <form action="laporanaset_pegawai.php" method="post">
                    <input type="text" name="nama_aset" placeholder="Nama Aset" required>
                    <input type="text" name="jenis_aset" placeholder="Jenis Aset" required>
                    <input type="text" name="permasalahan" placeholder="Permasalahan" required>
                    <input type="date" name="tanggal" placeholder="tanggal" required>
                    <button type="submit" name="submit" class="submit-button">LAPORKAN</button>
                </form>
            </div>
        </main>
    </div>
</body>
</html>

