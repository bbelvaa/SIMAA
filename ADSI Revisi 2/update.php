<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $jenis = $_POST['jenis'];
    $kondisi = $_POST['kondisi'];
    $jumlah = $_POST['jumlah'];
    $deskripsi = $_POST['deskripsi'];

    $query = "UPDATE aset SET nama='$nama', jenis='$jenis' , kondisi='$kondisi' , jumlah='$jumlah' , deskripsi='$deskripsi' WHERE id=$id";
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Data aset berhasil dirubah'); window.location='keloladaftaraset_admin.php';</script>";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>