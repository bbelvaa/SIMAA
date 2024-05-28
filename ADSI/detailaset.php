<?php
include 'koneksi.php'; 

$id = $_GET['id']; 
$query = "SELECT * FROM aset WHERE id_aset = '$id'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $nama_aset = $row['nama'];
    $gambar_aset = $row['gambar'];
    $deskripsi_aset = $row['deskripsi'];
} else {
    echo "Aset tidak ditemukan.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>SIMAA</title>
    <link rel="stylesheet" type="text/css" href="styles/dashboard_pegawai.css">
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
                <h2>BELVA</h2>
                <p class="role">Pegawai</p>
            </div>
            <ul class="menu">
                <li><a href="dashboard_pegawai.php">Dashboard</a></li>
                <li class="active"><a href="daftaraset_pegawai.php">Daftar Aset</a></li>
                <li><a href="laporanaset_pegawai.php">Laporan Kondisi Aset</a></li>
            </ul>
        </aside>
        <main class="main-content">
            <div class="asset-detail">
            <h2>Detail Informasi Aset</h2>
                <h3><?php echo $nama_aset; ?></h3>
                <img src="gambar_aset/<?php echo $gambar_aset; ?>" alt="<?php echo $nama_aset; ?>" class="gambar-aset">
                <p><?php echo $deskripsi_aset; ?></p>
                <button onclick="goBack()">Kembali</button>
            </div>
        </main>
    </div>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>
