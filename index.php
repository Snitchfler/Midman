<?php
require('koneksi.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Midman In</title>
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
      <button type='button' onclick="popup('login-popup')">LOGIN</button>
      <button type='button' onclick="popup('register-popup')">REGISTER</button>
    </div>
  </header>

  <div class="popup-container" id="login-popup">
    <div class="popup">
      <form method="POST" action="login.php">
        <h2>
          <span>USER LOGIN</span>
          <button type="reset" onclick="popup('login-popup')">X</button>
        </h2>
        <input type="text" placeholder="E-mail or Username" name="email_username">
        <input type="password" placeholder="Password" name="password">
        <!-- <button type="button" onclick="popup('forgot-password-popup')">Lupa Password?</button> -->
        <button type="submit" class="login-btn" name="login">Login</button>
      </form>
    </div>
  </div>

  <div class="popup-container" id="register-popup">
    <div class="register popup">
      <form method="POST" action="login_register.php">
        <h2>
          <span>USER REGISTER</span>
          <button type="reset" onclick="popup('register-popup')">X</button>
        </h2>
        <input type="text" placeholder="Full Name" name="fullname">
        <input type="text" placeholder="Username" name="username">
        <input type="email" placeholder="E-mail" name="email">
        <input type="password" placeholder="Password" name="password">
        <button type="submit" class="register-btn" name="register">Register</button>
      </form>
    </div>
  </div>
  <!-- <div class="popup-container" id="forgot-password-popup" style="display:none;">
    <div class="popup">
      <form method="POST" action="forgot_password.php">
        <h2>
          <span>LUPA PASSWORD</span>
          <button type="reset" onclick="popup('forgot-password-popup')">X</button>
        </h2>
        <input type="text" placeholder="E-mail" name="email">
        <button type="submit" class="forgot-password-btn" name="forgot_password">Kirim Email</button>
      </form>
    </div>
  </div> -->

  <script>
    function popup(popup_name) {
      get_popup = document.getElementById(popup_name);
      if (get_popup.style.display == "flex") {
        get_popup.style.display = "none";
      } else {
        get_popup.style.display = "flex";
      }
    }
  </script>

</body>

</html>