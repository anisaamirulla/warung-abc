<?php include 'include/cek_session.php'; ?>
<!DOCTYPE html>
<html>
<head><title>Tambah Pelanggan - Warung ABC</title></head>
<body>
    <h1>Tambah Pelanggan</h1>
    <form action= "proses_tambah_pelanggan.php" method="POST">
        <table>
            <tr><td>Nama Pelanggan</td><td>:</td>
                <td><input type="text" name="nama_pelanggan" required></td></tr>
            <tr><td>No HP</td><td>:</td>
                <td><input type="text" name="no_hp"></td></tr>
            <tr><td>Alamat</td><td>:</td>
                <td><input type="text" name="alamat"></td></tr>
            <tr><td colspan= "3"><input type="submit" value="simpan"></td></tr>
</table>
</form>
<p><a href="data_pelanggan.php">Kembali</a></p>
</body>
</html>