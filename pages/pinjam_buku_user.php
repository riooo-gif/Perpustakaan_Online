<?php

session_start();

include '../config/koneksi.php';


// =====================================
// CEK ROLE USER
// =====================================

if($_SESSION['role'] != 'user'){

    die("Akses ditolak");

}


// =====================================
// AMBIL DATA BUKU
// =====================================

$data = mysqli_query($conn, "

SELECT * FROM buku

WHERE stok > 0

");

?>

<!DOCTYPE html>
<html>
<head>

<script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-gray-100">


<div class="max-w-6xl mx-auto mt-10">

    <h1 class="text-2xl font-bold mb-6">

        📚 Daftar Buku

    </h1>



    <!-- GRID BUKU -->
    <div class="grid grid-cols-3 gap-6">

    <?php while($row = mysqli_fetch_assoc($data)) { ?>

        
        <div class="bg-white p-4 rounded shadow">

            
            <!-- cover -->
            <img src="../uploads/<?= $row['cover']; ?>"

            class="h-60 w-full object-cover rounded">


            <!-- judul -->
            <h2 class="text-lg font-bold mt-3">

                <?= $row['judul']; ?>

            </h2>


            <!-- penulis -->
            <p class="text-gray-600">

                <?= $row['penulis']; ?>

            </p>


            <!-- stok -->
            <p class="mt-2">

                Stok: <?= $row['stok']; ?>

            </p>


            <!-- tombol pinjam -->
            <a href="form_pinjam_user.php?id=<?= $row['id']; ?>"

            class="block text-center bg-green-500 hover:bg-green-600 text-white py-2 rounded mt-4">

                Pinjam Buku

            </a>

        </div>

    <?php } ?>

    </div>

</div>

</body>
</html>