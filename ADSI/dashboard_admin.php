<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>SIMAA</title>
    <link rel="stylesheet" type="text/css" href="styles/dashboard_admin.css">
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
        <aside class="sidebar">
            <div class="profile">
                <img src="img/user.svg" alt="User Icon" class="profile-icon">
                <h2>RAFLI</h2>
                <p class="role">Administrator</p>
            </div>
            <ul class="menu">
                <li class="active"><a href="dashboard_admin.php">Dashboard</a></li>
                <li><a href="keloladaftaraset_admin.php">Kelola Daftar Aset</a></li>
                <li><a href="permintaan_aset.php">Permintaan Aset</a></li>
            </ul>
        </aside>
        <main class="main-content">
            <section class="stats">
                <div class="stat-box">
                    <p>Total Karyawan</p>
                    <h3>781</h3>
                </div>
                <div class="stat-box">
                    <p>Total Aset</p>
                    <h3>275</h3>
                </div>
                <div class="stat-box">
                    <p>Total Aset Pending</p>
                    <h3>12</h3>
                </div>
            </section>
            <section class="chart">
                <h3>Jumlah Permintaan</h3>
                <img src="img/chart.png" alt="Chart Image">
            </section>
        </main>
    </div>
</body>
</html>
