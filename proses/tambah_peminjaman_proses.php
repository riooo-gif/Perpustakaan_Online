<?php
include '../config/koneksi.php';

// ambil data dari form (POST)
$nama = $_POST['nama'];
$buku_id = $_POST['buku_id'];
$tgl_pinjam = $_POST['tgl_pinjam'];
$tgl_kembali = $_POST['tgl_kembali'];

// query insert ke tabel peminjaman
mysqli_query($conn, "INSERT INTO peminjaman 
VALUES(NULL, '$nama', '$buku_id', '$tgl_pinjam', '$tgl_kembali', 'dipinjam')");

// redirect kembali ke halaman data peminjaman
header("Location: ../pages/peminjaman.php");
?>