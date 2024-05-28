<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'manager') {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>SIMAA</title>
    <link rel="stylesheet" type="text/css" href="styles/dashboard_manager.css">
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
                <h2>Irfan</h2>
                <p class="role">Manager</p>
            </div>
            <ul class="menu">
                <li class="active"><a href="dashboard_manager.php">Dashboard</a></li>
                <li><a href="laporankondisi_manager.php">Laporan Aset</a></li>
            </ul>
        </aside>
        <main class="main-content">
            <img src="img/dashboardpegawai.jpg" alt="" width="1000px">
        </main>
    </div>
</body>
</html>
