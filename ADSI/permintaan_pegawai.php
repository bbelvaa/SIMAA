<?php
include 'koneksi.php'; 

$query = "SELECT * FROM aset";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>SIMAA</title>
    <link rel="stylesheet" type="text/css" href="permintaan_pegawai.css">
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
                <h2>ALDI</h2>
                <p class="role">Karyawan</p>
            </div>
            <ul class="menu">
                <li><a href="dashboard_pegawai.php">Dashboard</a></li>
                <li class="active"><a href="daftaraset_pegawai.php">Daftar Aset</a></li>
                <li><a href="#">Laporan Kondisi Aset</a></li>
            </ul>
        </aside>
        <main class="main-content">
            <div class="request-form">
                <h2>Permintaan Aset</h2>
                <form action="proses_permintaan.php" method="post">
                    <input type="text" name="nama_aset" placeholder="Nama Aset" required>
                    <input type="number" name="jumlah" placeholder="Jumlah" required>
                    <input type="text" name="alasan" placeholder="Alasan" required>
                    <button type="submit" class="submit-button">Ajukan Permintaan</button>
                </form>
            </div>
        </main>
    </div>
</body>
</html>
