<?php

// koneksi database
include '../config/koneksi.php';


// ==========================
// AMBIL ID TRANSAKSI
// ==========================

// ambil id dari URL
$id = $_GET['id'];


// ==========================
// AMBIL DATA PEMINJAMAN
// ==========================

// ambil data transaksi berdasarkan id
$data = mysqli_query($conn, "SELECT * FROM peminjaman WHERE id='$id'");

// ubah jadi array
$row = mysqli_fetch_assoc($data);


// ==========================
// HITUNG DENDA
// ==========================

// tanggal hari ini
$today = date('Y-m-d');

// tanggal batas pengembalian
$tgl_kembali = $row['tanggal_kembali'];


// hitung selisih hari
$telat = (strtotime($today) - strtotime($tgl_kembali)) / (60*60*24);


// default denda = 0
$denda = 0;


// kalau telat
if($telat > 0){

    // denda 5000 per hari
    $denda = $telat * 5000;

}


// ==========================
// UPDATE STATUS PEMINJAMAN
// ==========================

mysqli_query($conn, "UPDATE peminjaman SET

status='kembali',
denda='$denda'

WHERE id='$id'
");


// ==========================
// TAMBAH STOK BUKU
// ==========================

// ambil id buku dari transaksi
$buku_id = $row['buku_id'];


// tambah stok buku
mysqli_query($conn, "UPDATE buku SET stok = stok + 1 WHERE id='$buku_id'");


// ==========================
// KEMBALI KE HALAMAN
// ==========================

header("Location: ../pages/peminjaman.php");

?>