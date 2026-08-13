<?php
include 'include/cek_session.php';
include 'config/koneksi.php';

$sql = "SELECT t.id_transaksi, t.no_transaksi, t.tanggal, t.total_bayar,";
$sql .= " u.nama_lengkap AS nama_kasir";
$sql .= " FROM tbl_transaksi t";
$sql .= " JOIN tbl_user u ON t.id_kasir = u.id_user";
$sql .= " ORDER BY t.tanggal DESC";
$hasil = mysqli_query($koneksi, $sql);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Riwayat Transaksi - Warung ABC</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Riwayat Transaksi</h1>
    <table border="1" cellpadding="6">
        <tr><th>No.Transaksi</th><th>Tanggal</th><th>Kasir</th>
        <th>Total Bayar</th><th>Aksi</th></tr>
        <?php while ($row = mysqli_fetch_assoc($hasil)) { ?>
        <tr> 
            <td><?php echo $row['no_transaksi']; ?></td>
            <td><?php echo $row['tanggal']; ?></td>
            <td><?php echo $row['nama_kasir']; ?></td>
            <td><?php echo number_format($row['total_bayar'], 0, ',', '.'); ?></td>
            <td><a href="struk.php?id=<?php echo $row['id_transaksi']; ?>">Cetak</a></td>
        </tr>
        <?php } ?> 
    </table>
    <p><a href="dashboard.php">Kembali ke Dashboard</a></p>
</body>
</html>