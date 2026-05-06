<?php
include '../config/koneksi.php';

$judul = $_POST['judul'];
$penulis = $_POST['penulis'];
$tahun = $_POST['tahun'];

mysqli_query($conn, "INSERT INTO buku 
VALUES(NULL, '$judul', '$penulis', '$tahun')");

header("Location: ../pages/buku.php");
?>