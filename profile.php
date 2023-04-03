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

if (isset($_POST['submit'])) {
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $update_query = "UPDATE register_user SET fullname='$fullname', email='$email', password='$password' WHERE username='$username'";
    mysqli_query($connect, $update_query);
    header("Location: profile.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Setting</title>
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
            <div class="dropdown">
                <button class="dropbtn">Settings</button>
                <div class="dropdown-content">
                    <a href="#">Profile</a>
                    <a href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </header>
    <main>
        <h1>Profile Setting</h1>
        <form method="POST">
            <label for="fullname">Full Name:</label>
            <input type="text" id="fullname" name="fullname" value="<?php echo $user['fullname']; ?>">

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>">

            <label for="password">Password:</label>
            <input type="password" id="password" name="password">

            <button type="submit" name="submit">Save Changes</button>
        </form>
    </main>
</body>

</html>