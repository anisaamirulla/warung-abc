<?php
include 'include/cek_session.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard - Warung ABC</title>
     <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Selamat datang, <?php echo $_SESSION['nama_lengkap'];?></h1>
    <p>Anda Login sebagai: <?php echo $_SESSION['role']; ?></p>

    <ul>
        <?php if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'gudang') { ?>
    <li><a href="data_barang.php">Data Barang</a></li>
<?php } ?>

<?php if ($_SESSION['role'] == 'admin' || $_SESSION['role'] == 'kasir') { ?>
    <li><a href="transaksi.php">Transaksi Kasir</a></li>
    <li><a href="riwayat_transaksi.php">Riwayat Transaksi</a></li>
    <li><a href="data_pelanggan.php">Data Pelanggan</a></li>
    <li><a href="laporan_harian.php">Laporan Harian</a></li>
    <li><a href="laporan_bulanan.php">Laporan Bulanan</a></li>
<?php } ?>
</ul>

    <a href="logout.php">Logout</a>
</body>
</html>