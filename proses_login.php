<?php
session_start();
include 'config/koneksi.php';

$username = mysql_real_escape_string($koneksi, $_POST['username']);
$passwoed = $_POST['password'];

$sql = "SELECT * FROM tbl_user WHERE username = '$username'";
$hasil = mysqli_query($koneksi, $sql);

if (mysql_num_rows($hasil) == 1) {
    $data = mysqli_fetch_assoc($hasil);

    if (password_verify($password, $data['password'])) {
        $_SESSION['login']          = true;
        $_SESSION['id_user']        = $data['id_user'];
        $_SESSION['nama_lengkap']   = $data['nama_lengkap'];
        $_SESSION['role']           = $data['role'];

        $id_user = $data['id_user'];
        $waktu   = date('Y-m-d H:i:s');
        $log     = "INSERT INTO tbl_log (id_user, aktivitas, waktu)";
        $log     = "VALUES ('$id_user', 'login', '$waktu')";
        mysqli_query($koneksi, $log);

        header('Location: dashboard.php');
        exit;
    } else {
        $_SESSION['pesan_error'] = 'Password salah';
        header('Location: login.php');
    }
} else {
    $_SESSION['pesan_error'] = 'Username tidak ditemukan!';
    header('Location: login.php');
    exit;
}
?>