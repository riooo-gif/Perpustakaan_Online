<?php

// mulai session
session_start();

// koneksi database
include '../config/koneksi.php';


// =====================================
// AMBIL DATA LOGIN
// =====================================

$username = $_POST['username'];

$password = md5($_POST['password']);


// =====================================
// CEK USER
// =====================================

$query = mysqli_query($conn, "

SELECT * FROM users

WHERE username='$username'

AND password='$password'

");


// ambil data user
$data = mysqli_fetch_assoc($query);


// =====================================
// VALIDASI LOGIN
// =====================================

if($data){

    // simpan session login
    $_SESSION['login'] = true;

    // simpan username
    $_SESSION['username'] = $data['username'];

    // simpan role
    $_SESSION['role'] = $data['role'];

    $_SESSION['id'] = $data['id'];


    // arahkan ke dashboard
    header("Location: ../pages/dashboard.php");

}else{

    echo "Username atau password salah";

}

?>