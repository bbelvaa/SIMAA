<?php 
	include "koneksi.php";
    include "update.php";
	$id = $_GET['id'];
	$query = "SELECT * FROM aset where id='$id'";
    $result = mysqli_query($conn, $query);
	while($row = mysqli_fetch_assoc($result)){
	?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>SIMAA - Edit Aset</title>
    <link rel="stylesheet" type="text/css" href="styles/tambahaset.css">
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
        <div class="sidebar">
            <div class="profile">
                <img src="img/user.svg" alt="Profile Icon" class="profile-icon">
                <h2>RAFLI</h2>
                <p class="role">Administrator</p>
            </div>
            <ul class="menu">
                <li><a href="dashboard_admin.php">Dashboard</a></li>
                <li class="active"><a href="keloladaftaraset_admin.php">Kelola Daftar Aset</a></li>
                <li><a href="permintaanaset_admin">Permintaan Aset</a></li>
            </ul>
        </div>
        <main class="main-content">
            <div class="form-container">
                <h2>EDIT ASET</h2>
                <form action="update.php" method="post">
                    <input type="text" name="id" value="<?php echo $row['id'] ?>" hidden>
                    <input type="text" name="nama" value="<?php echo $row['nama'] ?>" required>
                    <input type="text" name="jenis" value="<?php echo $row['jenis'] ?>"required>
                    <input type="text" name="kondisi" value="<?php echo $row['kondisi'] ?>"required>
                    <input type="number" name="jumlah" value="<?php echo $row['jumlah'] ?>"required>
                    <input type="text" name="deskripsi" value="<?php echo $row['deskripsi'] ?>">
                    <button type="submit" name="submit" class="submit-button">TAMBAH</button>
                </form>
            </div>
        </main>
    </div>
</body>
</html>
<?php } ?>

