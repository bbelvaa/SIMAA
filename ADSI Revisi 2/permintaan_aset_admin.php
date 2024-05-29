<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

include 'koneksi.php';

// Query untuk mengambil data permintaan aset
$query = "
SELECT 
    p.id_permintaan, 
    a.nama AS nama_karyawan, 
    aset.nama AS nama_aset, 
    aset.jenis, 
    p.alasan, 
    p.tanggal 
FROM 
    permintaan p
JOIN 
    akun a ON p.id = a.id
JOIN 
    aset ON p.id_aset = aset.id_aset
ORDER BY 
    p.tanggal DESC";

// Menjalankan query dan menangkap error
$result = mysqli_query($conn, $query);

if (!$result) {
    die('Error: ' . mysqli_error($conn));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Permintaan Aset - Admin</title>
    <link rel="stylesheet" type="text/css" href="styles/permintaan_aset_admin.css">
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
            <h2>RIO</h2>
            <p class="role">Administrator</p>
        </div>
        <ul class="menu">
            <li><a href="dashboard_admin.php">Dashboard</a></li>
            <li><a href="keloladaftaraset_admin.php">Kelola Daftar Aset</a></li>
            <li class="active"><a href="permintaan_aset_admin.php">Permintaan Aset</a></li>
        </ul>
    </aside>
    <main class="main-content">
        <h2>Daftar Permintaan Aset</h2>
        <table>
            <thead>
                <tr>
                    <th>Nama Karyawan</th>
                    <th>Nama Aset</th>
                    <th>Jenis Aset</th>
                    <th>Alasan</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>
                            <td>{$row['nama_karyawan']}</td>
                            <td>{$row['nama_aset']}</td>
                            <td>{$row['jenis']}</td>
                            <td>{$row['alasan']}</td>
                            <td>{$row['tanggal']}</td>
                            <td>
                                <a href='proses_persetujuan.php?id_permintaan={$row['id_permintaan']}&aksi=setuju'>✔️</a>
                                <a href='proses_persetujuan.php?id_permintaan={$row['id_permintaan']}&aksi=tolak'>❌</a>
                            </td>
                        </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>Tidak ada permintaan aset.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </main>
</div>
</body>
</html>