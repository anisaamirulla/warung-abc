<?php
include 'include/cek_session.php';
include 'config/koneksi.php';

if(!isset($_SESSION['keranjang'])) {
    $_SESSION['keranjang']=array();
}

$daftar_barang = mysqli_query($koneksi, "SELECT * FROM tbl_barang WHERE stok > 0");
$total = 0;
foreach ($_SESSION['keranjang'] as $item) {
    $total += $item['subtotal'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Transaksi - Warung ABC</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Transaksi Penjualan</h1>

    <?php if (isset($_SESSION['pesan_error'])) {
        echo '<p>' . $_SESSION['pesan_error'] . '</p>';
        unset($_SESSION['pesan_error']);
    } ?>

    <h3>Pilih Barang</h3>
    <form action="proses_tambah_keranjang.php" method="post">
        <select name="id_barang" required>
            <?php while ($b = mysqli_fetch_assoc($daftar_barang)) { ?>
            <option value="<?php echo $b['id_barang']; ?>">
                <?php echo $b['nama_barang'] . ' (Stok: ' . $b['stok'] . ')'; ?>
            </option>
            <?php } ?>
        </select>
        Jumlah: <input type="number" name="jumlah" min="1" required>
        <input type="submit" value="Tambah ke Keranjang">
    </form>

    <h3>Keranjang</h3>
    <table border ="1" cellpadding="6">
        <tr><th>Nama Barang</th><th>Harga</th><th>Jumlah</th><th>Subtotal</th><th>Aksi</th></tr>
        <?php foreach ($_SESSION['keranjang'] as $id_barang => $item) { ?>
    
        <tr>
            <td><?php echo $item['nama_barang']; ?></td>
            <td><?php echo number_format($item['harga'], 0, ',', '.'); ?></td>
            <td><?php echo $item['jumlah']; ?></td>
            <td><?php echo number_format($item['subtotal'], 0, ',', '.'); ?></td>
            <td><a href="hapus_keranjang.php?id=<?php echo $id_barang; ?>">Hapus</a></td>
        </tr>
        <?php } ?>
        <tr><td colspan="3">Total</td>
            <td colspan="2"><?php echo number_format($total, 0,',', '.'); ?></td></tr>
    </table>

    <form action="proses_simpan_transaksi.php" method="post">
        <input type="submit" value="Simpan Transaksi">
    </form>
    <p><a href="dashboard.php">Kembali ke Dashboard</a></p>
</body>
</html>