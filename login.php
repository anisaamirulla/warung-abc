<!DOCTYPE html>
<html lang="en">
<head>
    <title>Warung ABC</title>
     <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Login aplikasi kasir Warung ABC</h1>

    <?php
    session_start();
    if (isset($_SESSION['pesan_error'])) {
        echo '<p>'. $_SESSION['pesan_error']. '</p>';
        unset($_SESSION['pesan_error']);
    }
    ?>

    <form action="proses_login.php" method= "POST">
        <table>
            <tr>
                <td>Username</td>
                <td>:</td>
                <td><input type="text" name="username" required></td>
            </tr>
            <tr>
                <td>Password</td>
                <td>:</td>
                <td><input type="password" name="password" required></td>
            </tr>
            <tr>
                <td colspan="3">
                    <input type="submit" value="Login">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>