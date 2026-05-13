<?php

include '../config/koneksi.php';


// =====================================
// AMBIL DATA FORM
// =====================================

$judul = $_POST['judul'];

$penulis = $_POST['penulis'];

$tahun = $_POST['tahun'];

$stok = $_POST['stok'];


// =====================================
// UPLOAD COVER
// =====================================

// ambil nama file
$cover = $_FILES['cover']['name'];

// ambil file sementara
$tmp = $_FILES['cover']['tmp_name'];


// pindahkan file ke folder uploads
move_uploaded_file($tmp, "../uploads/" . $cover);


// =====================================
// SIMPAN KE DATABASE
// =====================================

mysqli_query($conn, "

INSERT INTO buku

(judul, penulis, tahun, stok, cover)

VALUES

('$judul', '$penulis', '$tahun', '$stok', '$cover')

");


// kembali ke halaman buku
header("Location: ../pages/buku.php");

?>