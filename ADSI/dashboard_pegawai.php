<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'pegawai') {
    header("Location: login.php");
    exit();
}
?>

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
                <h2>BELVA</h2>
                <p class="role">Pegawai</p>
            </div>
            <ul class="menu">
                <li class="active"><a href="dashboard_pegawai.php">Dashboard</a></li>
                <li><a href="daftaraset_pegawai.php">Daftar Aset</a></li>
                <li><a href="#">Laporan Kondisi Aset</a></li>
            </ul>
        </aside>
        <main class="main-content">
            <img src="img/dashboardpegawai.jpg" alt="" width="1000px">
        </main>
    </div>
</body>
</html>
