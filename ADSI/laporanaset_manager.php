<?php
include 'koneksi.php'; 
include 'search.php';
include 'pagination.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>SIMAA</title>
    <link rel="stylesheet" type="text/css" href="styles/laporanaset_manager.css">
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
                <h2>Irfan</h2>
                <p class="role">Manager</p>
            </div>
            <ul class="menu">
                <li><a href="dashboard_pegawai.php">Dashboard</a></li>
                <li class="active"><a href="laporankondisi_manager.php">Laporan Aset</a></li>
            </ul>
        </aside>
        <main class="main-content">
            <div class="table-container">
                <h2>Daftar Aset</h2>
                <div class="search-container">
                <form method="GET" action="daftaraset_pegawai.php">
                        <input type="text" name="search" placeholder="Cari aset" class="search-bar" value="<?php echo htmlspecialchars($search); ?>">
                        <button type="submit" class="search-button">Cari</button>
                    </form>
                </div>
                <table border="1">
                    <thead>
                        <tr>
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
                                echo "<td>" . $row["nama"] . "</td>";
                                echo "<td>" . $row["jenis"] . "</td>";
                                echo "<td>" . $row["kondisi"] . "</td>";
                                echo "<td>" . $row["jumlah"] . "</td>";
                                echo "<td>" . $row["deskripsi"] . "</td>";
                                echo '<td>
                                        <a href="detailaset.php?id=' . $row["id"] . '"><img src="img/info.svg" 
                                        alt="Info Icon" class="info-icon"></a>
                                        <a href="permintaan_pegawai.php?id=' . $row["id"] . '" class="request-button">Permintaan</a>
                                      </td>';
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6'>Tidak ada data</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
                <div class="pagination">
                    <?php if($page > 1): ?>
                        <a href="?page=<?php echo $page - 1; ?>">Previous</a>
                    <?php endif; ?>

                    <?php for($i = 1; $i <= $total_pages; $i++): ?>
                        <a href="?page=<?php echo $i; ?>" <?php if($i == $page) echo 'class="active"'; ?>><?php echo $i; ?></a>
                    <?php endfor; ?>

                    <?php if($page < $total_pages): ?>
                        <a href="?page=<?php echo $page + 1; ?>">Next</a>
                    <?php endif; ?>
                </div>
            </div>
        </main>
    </div>
</body>
</html>

