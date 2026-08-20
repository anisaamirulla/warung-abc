<?php
session_start();
include 'include/cek_session.php';
include 'config/koneksi.php';

$id = $_POST['id_pelanggan'];
$nama = mysqli_real_escape_string($koneksi, $_POST['nama_pelanggan']);
$hp = mysqli_real_escape_string($koneksi, $_POST['no_hp']);
$alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);

$sql = "UPDATE tbl_pelanggan SET nama_pelanggan='$nama', no_hp='$hp', ";
$sql .= "alamat='$alamat' WHERE id_pelanggan = '$id'";

if (mysqli_query($koneksi, $sql)) {
    $id_user = $_SESSION['id_user'];
    $waktu = date('Y-m-d H:i:s');
    $aktivitas = "edit pelanggan: $nama";
    $log = "INSERT INTO tbl_log (id_user, aktivitas, waktu)";
    $log .= " VALUES ('$id_user', '$aktivitas', '$waktu')";
    mysqli_query($koneksi, $log);

    header('Location: data_pelanggan.php');
    exit;
} else {
    echo 'Gagal mengubah data: ' . mysqli_error($koneksi);

}
?>