<?php
include 'koneksi.php'; 
include 'search.php';
include 'pagination.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>SIMAA - Kelola Daftar Aset</title>
    <link rel="stylesheet" type="text/css" href="styles/keloladaftaraset_admin.css">
</head>
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
        <div class="sidebar">
            <div class="profile">
                <img src="img/user.svg" alt="Profile Icon" class="profile-icon">
                <h2>RAFLI</h2>
                <p class="role">Administrator</p>
            </div>
            <ul class="menu">
                <li><a href="dashboard_admin.php">Dashboard</a></li>
                <li class="active"><a href="keloladaftaraset_admin.php">Kelola Daftar Aset</a></li>
                <li><a href="permintaanaset_admin.php">Permintaan Aset</a></li>
            </ul>
        </div>
        <main class="main-content">
            <div class="table-container">
                <h2>Daftar Aset</h2>
                <a href="tambahaset.php">
                    <button class="add-asset-button">TAMBAH ASET BARU</button>
                </a>
                <div class="search-container">
                <form method="GET" action="keloladaftaraset_admin.php">
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
                                        <a href="editaset.php?id=' . $row["id_aset"] . '"><img src="img/edit.svg" 
                                        alt="Edit Icon" class="info-icon"></a>
                                        <a href="deleteaset.php?id=' . $row["id_aset"] . '"><img src="img/delete.svg" 
                                        alt="Delete Icon" class="info-icon"></a>
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