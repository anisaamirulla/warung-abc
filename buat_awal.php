<?php
include 'config/koneksi.php';

$nama = 'Administrator';
$username = 'admin2';
$password = password_hash('admin123', PASSWORD_DEFAULT);
$role = 'admin';

$sql = "INSERT INTO tbl_user (nama_lengkap, username, password, role) VALUES ('$nama', '$username', '$password', '$role')";

if (mysqli_query($koneksi, $sql)) {
    echo 'user admin berhasil dibuat. silahkan hapus file ini.';
} else {
    echo 'gagal memuat user: '. mysqli_error($koneksi);
}
?>