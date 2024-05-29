<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}

include 'koneksi.php';

if (!isset($_GET['id_permintaan']) || !isset($_GET['aksi'])) {
    header("Location: permintaan_aset_admin.php");
    exit();
}

$id_permintaan = $_GET['id_permintaan'];
$aksi = $_GET['aksi'];
$aksi_text = ($aksi == 'setuju') ? 'menyetujui' : 'menolak';

$query = "
SELECT 
    p.id_permintaan, 
    a.nama AS nama_karyawan, 
    aset.nama AS nama_aset 
FROM 
    permintaan p
JOIN 
    akun a ON p.id = a.id
JOIN 
    aset ON p.id_aset = aset.id_aset
WHERE 
    p.id_permintaan = '$id_permintaan'";

$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);

if (!$row) {
    die('Error: Data permintaan tidak ditemukan.');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($aksi == 'setuju') {
        $update_query = "UPDATE permintaan SET status = 'disetujui' WHERE id_permintaan = '$id_permintaan'";
    } else {
        $update_query = "UPDATE permintaan SET status = 'ditolak' WHERE id_permintaan = '$id_permintaan'";
    }

    if (mysqli_query($conn, $update_query)) {
        header("Location: permintaan_aset_admin.php");
        exit();
    } else {
        die('Error: ' . mysqli_error($conn));
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Proses Persetujuan</title>
    <link rel="stylesheet" type="text/css" href="styles/proses_persetujuan.css">
</head>
<body>
<div class="modal">
    <div class="modal-content">
        <h2>Konfirmasi</h2>
        <p>Anda yakin ingin <?php echo $aksi_text; ?> permintaan aset ini?</p>
        <p><strong>Karyawan:</strong> <?php echo $row['nama_karyawan']; ?></p>
        <p><strong>Aset:</strong> <?php echo $row['nama_aset']; ?></p>
        <form method="POST">
            <button type="submit" class="button setuju">SETUJU</button>
            <a href="permintaan_aset_admin.php" class="button kembali">KEMBALI</a>
        </form>
    </div>
</div>
</body>
</html>
