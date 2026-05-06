<?php
include '../config/koneksi.php';

$id = $_POST['id'];
$judul = $_POST['judul'];
$penulis = $_POST['penulis'];
$tahun = $_POST['tahun'];

mysqli_query($conn, "UPDATE buku SET 
judul='$judul',
penulis='$penulis',
tahun='$tahun'
WHERE id='$id'");

header("Location: ../pages/buku.php");
?>