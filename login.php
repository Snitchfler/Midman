<?php
require('koneksi.php');

if (isset($_POST['login'])) {
    $email_username = $_POST['email_username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM `register_user` WHERE (`username` = ? OR `email` = ?) AND `password` = ?";
    $stmt = mysqli_prepare($connect, $query);
    mysqli_stmt_bind_param($stmt, "sss", $email_username, $email_username, $password);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            // login berhasil
            session_start();
            $user = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            header('location: dashboard.php');
        } else {
            // login gagal
            echo "
            <script>
            alert('Username or Email atau Password Salah');
            window.location.href='index.php';
            </script>";
        }
    } else {
        // terjadi kesalahan
        echo "
        <script>
        alert('Terjadi Kesalahan');
        window.location.href='index.php';
        </script>";
    }
}
