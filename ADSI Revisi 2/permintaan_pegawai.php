<?php
include 'koneksi.php'; 
include 'proses_permintaan.php';

$id_aset = $_GET['id']; 
$query = "SELECT * FROM aset WHERE id_aset = '$id_aset'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $nama_aset = $row['nama'];
} else {
    echo "Aset tidak ditemukan.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>SIMAA</title>
    <link rel="stylesheet" type="text/css" href="styles/permintaan_pegawai.css">
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
                <p class="role">Karyawan</p>
            </div>
            <ul class="menu">
                <li><a href="dashboard_pegawai.php">Dashboard</a></li>
                <li class="active"><a href="daftaraset_pegawai.php">Daftar Aset</a></li>
                <li><a href="laporanaset_pegawai.php">Laporan Kondisi Aset</a></li>
            </ul>
        </aside>
        <main class="main-content">
            <div class="request-form">
                <h2>Permintaan Aset</h2>
                <form action="permintaan_pegawai.php" method="post">
                    <input type="hidden" name="id_aset" value="<?php echo $row['id_aset']; ?>">
                    <input type="text" name="nama_aset" value="<?php echo $row['nama'] ?>"readonly>
                    <input type="text" name="alasan" placeholder="Alasan" required>
                    <button type="submit" name="submit" class="submit-button">Ajukan Permintaan</button>
                </form>
            </div>
        </main>
    </div>
</body>
</html>
