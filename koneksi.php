<?php
$connect = mysqli_connect("localhost", "root", "", "midman");
if (mysqli_connect_error()) {
    echo "<script>alert('fail connect db');</script>";
    exit();
}
