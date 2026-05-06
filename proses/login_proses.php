<?php
session_start();
include '../config/koneksi.php';

$username = $_POST['username'];
$password = md5($_POST['password']);

$query = mysqli_query($conn, "SELECT * FROM admin 
WHERE username='$username' AND password='$password'");

$data = mysqli_fetch_assoc($query);

if ($data) {
    $_SESSION['login'] = true;
    header("Location: ../pages/dashboard.php");
} else {
    echo "Login gagal";
}
?>