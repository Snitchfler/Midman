<?php
session_start();
require('koneksi.php');

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$username = $_SESSION['username'];
$query = "SELECT * FROM register_user WHERE username='$username'";
$result = mysqli_query($connect, $query);
$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <h2>Midman.In</h2>
        <nav>
            <a href="#">Home</a>
            <a href="#">Tentang</a>
            <a href="#">Cara Kerja</a>
            <a href="#">FAQ</a>
        </nav>
        <div class='sign-in-up'>
            <span>Selamat datang, <?php echo $user['fullname']; ?></span>
            <a href="index.php">Logout</a>
        </div>
    </header>
    <main>
        <h1>Selamat datang di halaman setelah login</h1>
        <p>Halaman ini hanya dapat diakses setelah user berhasil login.</p>
    </main>
</body>

</html>