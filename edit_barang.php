<?php
session_start();
include 'includes/cek_session.php';
include 'config/koneksi.php';

$id = $_GET['id'];
$sql ="SELECT * FROM tbl_barang WHERE id_barang = '$id'";
$hasil = mysqli_query($koneksi, $sql);
$data  = mysqli_fetch_assoc($hasil);
?>
<!DOCTYPE html>
<html>
<head><title>Edit Barang - Warung ABC</title></head>
<body>
    <h1>Edit Barang</h1>
    <form action="proses_edit_barang.php" method="POST">
        <input type="hidden" name="id_barang" value="<?php echo $data['id_barang']; ?>">
        <table>
            <tr><td>Kode Barang</td><td>:</td>
                <td><input type="text" name="kode_barang" value="<?php echo $data['kode_barang']; ?>" required></td></tr>
            <tr><td>Nama Barang</td><td>:</td>
                <td><input type="text" name="nama_barang" value="<?php echo $data['nama_barang']; ?>" required></td></tr>
            <tr><td>Harga Satuan</td><td>:</td>
                <td><input type="number" name="harga_satuan" step="0.01" value="<?php echo $data['harga satuan']; ?>" required></td></tr>
            <tr><td>Stok</td><td>:</td>
                <td><input type="number" name="stok" value="<?php echo $data['stok']; ?>" required></td></tr>
            <tr><td>Tanggal Kadaluarsa</td><td>:</td>
                <td><input type="date" name="tanggal_kadaluasrsa" value="<?php echo $data['tanggal_kadaluarsa']; ?>" required></td></tr>
            <tr><td colspan="3"><input type="submit" value="Update"></td></tr>
</table>
</form>
</body>
</html>