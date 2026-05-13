<?php

session_start();

include '../config/koneksi.php';


// =====================================
// AMBIL DATA FORM
// =====================================

$user_id = $_SESSION['id'];

$buku_id = $_POST['buku_id'];

$tgl_pinjam = $_POST['tgl_pinjam'];

$tgl_kembali = $_POST['tgl_kembali'];


// =====================================
// AMBIL USERNAME
// =====================================

$username = $_SESSION['username'];


// =====================================
// CEK STOK
// =====================================

$cek = mysqli_query($conn, "

SELECT * FROM buku

WHERE id='$buku_id'

");

$buku = mysqli_fetch_assoc($cek);


// kalau stok habis
if($buku['stok'] <= 0){

    die("Stok buku habis");

}


// =====================================
// SIMPAN PEMINJAMAN
// =====================================

mysqli_query($conn, "

INSERT INTO peminjaman

(nama_peminjam, buku_id, tanggal_pinjam, tanggal_kembali, status, denda, user_id)

VALUES

('$username', '$buku_id', '$tgl_pinjam', '$tgl_kembali', 'dipinjam', 0, '$user_id')

");


// =====================================
// KURANGI STOK
// =====================================

mysqli_query($conn, "

UPDATE buku

SET stok = stok - 1

WHERE id='$buku_id'

");


// kembali
header("Location: ../pages/history_user.php");

?>