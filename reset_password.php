<?php
require('koneksi.php');

if (isset($_POST['reset_password'])) {
  // Cek apakah email tersedia di database
  $query = "SELECT * FROM `register_user` WHERE `email` = ?";
  $stmt = mysqli_prepare($connect, $query);
  mysqli_stmt_bind_param($stmt, "s", $_POST['email']);
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);

  if (mysqli_num_rows($result) == 1) {
    // Generate kode reset password
    $reset_code = md5(time() . $_POST['email']);

    // Simpan kode reset password ke database
    $query = "UPDATE `register_user` SET `reset_code` = ? WHERE `email` = ?";
    $stmt = mysqli_prepare($connect, $query);
    mysqli_stmt_bind_param($stmt, "ss", $reset_code, $_POST['email']);
    mysqli_stmt_execute($stmt);

    // Kirim email dengan kode reset password
    $to = $_POST['email'];
    $subject = 'Midman.In Reset Password';
    $message = 'Berikut adalah kode reset password Anda: ' . $reset_code;
    $headers = 'From: admin@midman.in';
    mail($to, $subject, $message, $headers);

    // Tampilkan pesan berhasil
    echo "
      <script>
      alert('Kode reset password telah dikirim ke email Anda');
      window.location.href='index.php';
      </script>";
  } else {
    // Tampilkan pesan gagal
    echo "
      <script>
      alert('Email tidak ditemukan');
      window.location.href='index.php';
      </script>";
  }
}
