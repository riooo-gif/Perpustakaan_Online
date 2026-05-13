<?php

session_start();

include '../config/koneksi.php';


// =====================================
// CEK LOGIN USER
// =====================================

if($_SESSION['role'] != 'user'){

    die("Akses ditolak");

}


// =====================================
// AMBIL DATA BUKU
// =====================================

$id = $_GET['id'];

$query = mysqli_query($conn, "

SELECT * FROM buku

WHERE id='$id'

");

$buku = mysqli_fetch_assoc($query);

?>

<!DOCTYPE html>
<html>
<head>

<script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-gray-100">


<div class="max-w-md mx-auto mt-10 bg-white p-6 rounded shadow">

    
    <h1 class="text-2xl font-bold mb-6">

        Pinjam Buku

    </h1>


    <!-- COVER -->
    <img src="../uploads/<?= $buku['cover']; ?>"

    class="h-72 w-full object-cover rounded">


    <!-- DETAIL -->
    <h2 class="text-xl font-bold mt-4">

        <?= $buku['judul']; ?>

    </h2>

    <p class="text-gray-600">

        <?= $buku['penulis']; ?>

    </p>


    <!-- FORM -->
    <form action="../proses/pinjam_user_proses.php"

    method="POST"

    class="mt-6">


        <!-- kirim id buku -->
        <input type="hidden"

        name="buku_id"

        value="<?= $buku['id']; ?>">


        <!-- tanggal pinjam -->
        <label>Tanggal Pinjam</label>

        <input type="date"

        name="tgl_pinjam"

        class="w-full border p-2 rounded mb-3">


        <!-- tanggal kembali -->
        <label>Tanggal Kembali</label>

        <input type="date"

        name="tgl_kembali"

        class="w-full border p-2 rounded mb-3">


        <!-- tombol -->
        <button

        class="w-full bg-green-500 hover:bg-green-600 text-white py-2 rounded">

            Pinjam Sekarang

        </button>

    </form>

</div>

</body>
</html>