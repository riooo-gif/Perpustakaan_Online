<?php
include '../config/koneksi.php';

// ambil data form
$nama = $_POST['nama'];
$buku_id = $_POST['buku_id'];
$tgl_pinjam = $_POST['tgl_pinjam'];
$tgl_kembali = $_POST['tgl_kembali'];


// ==========================
// CEK STOK BUKU
// ==========================

// ambil data buku berdasarkan id
$buku = mysqli_query($conn, "SELECT * FROM buku WHERE id='$buku_id'");
$dataBuku = mysqli_fetch_assoc($buku);

// cek apakah stok habis
if($dataBuku['stok'] <= 0){

    // hentikan program kalau stok habis
    die("Stok buku habis");

}


// ==========================
// SIMPAN PEMINJAMAN
// ==========================

mysqli_query($conn, "INSERT INTO peminjaman
(nama_peminjam, buku_id, tanggal_pinjam, tanggal_kembali, status, denda)

VALUES

('$nama', '$buku_id', '$tgl_pinjam', '$tgl_kembali', 'dipinjam', 0)
");


// ==========================
// KURANGI STOK
// ==========================

mysqli_query($conn, "UPDATE buku SET stok = stok - 1 WHERE id='$buku_id'");


// kembali ke halaman peminjaman
header("Location: ../pages/peminjaman.php");
?>