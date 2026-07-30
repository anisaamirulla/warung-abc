<?php
include 'include/cek_session.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard - Warung ABC</title>
</head>
<body>
    <h1>Selamat datang, <?php echo $_SESSION['nama_lengkap'];?></h1>
    <p>Anda Login sebagai: <?php echo $_SESSION['role']; ?></p>
    <a href="logout.php">Logout</a>
</body>
</html>