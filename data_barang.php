<?php
include 'includes/cek_sesion.php';
include 'config/koneksi.php';

$sql = "SELECT * FROM tbl_barang ORDER BY nama_barang ASC";
$hasil = mysqli_query($koneksi, $sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Barang - Warung ABC</title></head>
<body>
    <h1>Data Barang</h1>
    <p><a href="dashboard.php">Kembali ke Dashboard</a> | <a href="tambah_barang.php">Tambah Barang</a></p>
    <table border="1" cellpadding="6">
        <tr>
            <th>Kode</th><th>Nama Barang</th><th>Harga Satuan</th>
            <th>Stok</th><th>Kadaluarsa</th><th>Aksi</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($hasil)) { ?>
    <tr>
        <td><?php echo $row['kode_barang']; ?></td>
        <td><?php echo number_format($row['nama_barang'], 0, ',', '.'); ?></td>
        <td><?php echo $row['stok']; ?></td>
        <td><?php echo $row['tanggal_kadaluarsa']; ?></td>
        <td>
            <a href="edit_barang.php?id=<?php echo $row['id_barang']; ?>">Edit</a> |
            <a href="hapus_barang.php?id=<?php echo $row['id_barang']; ?>" onclik="return confirm('Yakin hapus barang ini?');">Hapus</a>
</td>
</tr>
<?php } ?>    
</table>   
</body>
</html>