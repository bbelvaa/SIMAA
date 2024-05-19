<?php
include 'koneksi.php'; 

$query = "SELECT * FROM aset";
$result = mysqli_query($conn, $query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>SIMAA</title>
    <link rel="stylesheet" type="text/css" href="daftaraset_pegawai.css">
</head>
<body>
<header>
        <h1>SIMAA</h1>
    </header>
    <nav>
        <ul>
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
                <h2>ALDI</h2>
                <p class="role">Karyawan</p>
            </div>
            <ul class="menu">
                <li><a href="dashboard_pegawai.php">Dashboard</a></li>
                <li class="active"><a href="daftaraset_pegawai.php">Daftar Aset</a></li>
                <li><a href="#">Laporan Kondisi Aset</a></li>
            </ul>
        </aside>
        <main class="main-content">
            <div class="table-container">
                <h2>Daftar Aset</h2>
                <input type="text" placeholder="Cari aset" class="search-bar">
                <table border="1">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nama Aset</th>
                            <th>Jenis Aset</th>
                            <th>Kondisi Aset</th>
                            <th>Jumlah</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $row["id"] . "</td>";
                                echo "<td>" . $row["nama"] . "</td>";
                                echo "<td>" . $row["jenis"] . "</td>";
                                echo "<td>" . $row["kondisi"] . "</td>";
                                echo "<td>" . $row["jumlah"] . "</td>";
                                echo "<td>" . $row["deskripsi"] . "</td>";
                                echo '<td>
                                
                                        <img src="img/info.svg" alt="Info Icon" class="info-icon">
                                        <button class="request-button">Permintaan</button>
                                      </td>';
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='7'>Tidak ada data</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</body>
</html>
