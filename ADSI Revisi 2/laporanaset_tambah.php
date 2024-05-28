<?php
session_start();
if (isset($_POST['submit'])) {
    include 'koneksi.php';
    $id = $_SESSION['id'];
    $nama_aset = $_POST['nama_aset'];
    $jenis_aset = $_POST['jenis_aset'];
    $permasalahan = $_POST['permasalahan'];
    $tanggal = $_POST['tanggal'];

    $query = "INSERT INTO laporan (id, nama_aset, jenis_aset, permasalahan, tanggal) 
    VALUES ('$id', '$nama_aset', '$jenis_aset', '$permasalahan', '$tanggal')";

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Aset berhasil dilaporkan.'); window.location='laporanaset_pegawai.php';</script>";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>