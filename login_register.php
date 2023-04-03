<?php
require('koneksi.php');

if (isset($_POST['register'])) {
    $user_exist_query = "SELECT * FROM `register_user` WHERE `username` = ? OR `email` = ?";
    $stmt = mysqli_prepare($connect, $user_exist_query);
    mysqli_stmt_bind_param($stmt, "ss", $_POST['username'], $_POST['email']);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $result_fetch = mysqli_fetch_assoc($result);
            if ($result_fetch['username'] == $_POST['username']) {
                echo "
                <script>
                alert('$result_fetch[username] - username already taken');
                window.location.href='index.php';
                </script>";
            } else {
                echo "
                <script>
                alert('$result_fetch[email] - email already taken');
                window.location.href='index.php';
                </script>";
            }
        } else {
            $query = "INSERT INTO register_user(fullname,username,email,password) VALUES (?, ?, ?, ?)";
            $stmt = mysqli_prepare($connect, $query);
            mysqli_stmt_bind_param($stmt, "ssss", $_POST['fullname'], $_POST['username'], $_POST['email'], $_POST['password']);
            if (mysqli_stmt_execute($stmt)) {
                echo "
                <script>
                alert('Registrasi Berhasil');
                window.location.href='index.php';
                </script>";
            } else {
                echo "
                <script>
                alert('Registrasi Gagal');
                window.location.href='index.php';
                </script>";
            }
        }
    } else {
        echo "
        <script>
        alert('fail connect');
        window.location.href='index.php';
        </script>";
    }
}
