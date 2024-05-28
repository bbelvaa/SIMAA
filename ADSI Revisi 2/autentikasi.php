<?php
session_start();
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM akun WHERE username = '$username'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row['password'])) {
            $_SESSION['id'] = $row['id'];
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $row['role'];
            if ($row['role'] == 'admin') {
                header("Location: dashboard_admin.php");
            } else if ($row['role'] == 'pegawai'){
                header("Location: dashboard_pegawai.php");
            }else{
                header("Location: dashboard_manager.php");

            }
            exit();
        } else {
            echo "Password salah";
        }
    } else {
        echo "Username tidak ditemukan";
    }
}
?>
