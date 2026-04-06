<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include '../config/koneksi.php';

// ambil input
$username = mysqli_real_escape_string($conn, $_POST['username']);
$password = md5($_POST['password']); // sementara masih md5
$captcha  = $_POST['captcha'];

// cek captcha
if ($captcha != $_SESSION['captcha']) {
    header("Location: login.php?error=captcha");
    exit;
}

// cek user
$query = mysqli_query($conn, "SELECT * FROM staf WHERE username='$username' AND password='$password'");
$data = mysqli_fetch_assoc($query);

if ($data) {
    // simpan session lebih lengkap
    $_SESSION['admin'] = true;
    $_SESSION['username'] = $data['username'];
    $_SESSION['nama'] = $data['nama']; 

    header("Location: index.php?menu=dashboard");
} else {
    header("Location: login.php?error=login");
}
?>