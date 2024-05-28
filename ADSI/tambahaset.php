<?php
include 'koneksi.php';
include 'tambah.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>SIMAA - Tambah Aset Baru</title>
    <link rel="stylesheet" type="text/css" href="styles/tambahaset.css">
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
                <h2>RAFLI</h2>
                <p class="role">Administrator</p>
            </div>
            <ul class="menu">
                <li><a href="dashboard_admin.php">Dashboard</a></li>
                <li class="active"><a href="keloladaftaraset_admin.php">Kelola Daftar Aset</a></li>
                <li><a href="permintaanaset_admin">Permintaan Aset</a></li>
            </ul>
        </div>
        <main class="main-content">
            <div class="form-container">
                <h2>TAMBAHKAN ASET BARU</h2>
                <form action="tambahaset.php" method="post" enctype="multipart/form-data">
                    <input type="text" name="nama" placeholder="Nama Aset" required>
                    <input type="text" name="jenis" placeholder="Jenis Aset" required>
                    <input type="text" name="kondisi" placeholder="Kondisi Aset" required>
                    <input type="number" name="jumlah" placeholder="Jumlah" required>
                    <input type="text" name="deskripsi" placeholder="Deskripsi">
                    <input type="file" name="fileToUpload" id="fileToUpload"><br>
                    <button type="submit" name="submit" class="submit-button">TAMBAH</button>
                </form>
            </div>
        </main>
    </div>
</body>
</html>

