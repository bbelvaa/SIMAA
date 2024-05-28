<?php
if (isset($_POST['submit'])) {
    include 'koneksi.php';

    $nama = $_POST['nama'];
    $jenis = $_POST['jenis'];
    $kondisi = $_POST['kondisi'];
    $jumlah = $_POST['jumlah'];
    $deskripsi = $_POST['deskripsi'];

    // Mengatur direktori tujuan upload
    $target_dir = "gambar_aset/";
    $temp_file = $_FILES["fileToUpload"]["tmp_name"];
    $file_name = $_FILES["fileToUpload"]["name"];
    $target_file = $target_dir . basename($file_name);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Cek apakah file adalah gambar sebenarnya
    $check = getimagesize($temp_file);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File bukan gambar.";
        $uploadOk = 0;
    }

    // Hanya izinkan format file tertentu
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        echo "Maaf, hanya file JPG, JPEG, PNG & GIF yang diperbolehkan.";
        $uploadOk = 0;
    }

    // Cek apakah $uploadOk bernilai 0 karena error
    if ($uploadOk == 0) {
        echo "Maaf, file anda tidak ter-upload.";
    } else {
        if (move_uploaded_file($temp_file, $target_file)) {
            echo "File ". htmlspecialchars($file_name). " berhasil di-upload.";

            // Simpan data aset ke database
            $query = "INSERT INTO aset (nama, jenis, kondisi, jumlah, deskripsi, gambar) VALUES ('$nama', '$jenis', '$kondisi', '$jumlah', '$deskripsi', '$file_name')";

            if (mysqli_query($conn, $query)) {
                echo "<script>alert('Data aset berhasil ditambahkan'); window.location='keloladaftaraset_admin.php';</script>";
            } else {
                echo "Error: " . $query . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "Maaf, terjadi kesalahan saat mengupload file anda.";
        }
    }

    mysqli_close($conn);
}
?>