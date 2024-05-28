<?php
session_start();
if (isset($_POST['submit'])) {
    include 'koneksi.php';
    $id = $_SESSION['id'];
    $alasan = $_POST['alasan'];
    $id_aset = $_POST['id_aset'];

    
    $query = "INSERT INTO permintaan (alasan, id, id_aset) VALUES ('$alasan', '$id', '$id_aset')";
    
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Permintaan berhasil diajukan.'); window.location='daftaraset_pegawai.php';</script>";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
    
    mysqli_close($conn);
}

?>