<?php
session_start();
include '../config/koneksi.php';


// =====================================
// KONEKSI DATABASE
// =====================================

// menghubungkan file koneksi.php


// =====================================
// AMBIL DATA PEMINJAMAN + JOIN BUKU
// =====================================

// JOIN digunakan untuk menggabungkan tabel peminjaman dan buku
// supaya judul buku bisa ditampilkan

$query = mysqli_query($conn, "

SELECT peminjaman.*, buku.judul

FROM peminjaman

JOIN buku ON peminjaman.buku_id = buku.id

");

?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Data Peminjaman</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-gray-100">

<?php include 'layout/sidebar.php'; ?>

<div class="ml-64 p-6">


<!-- ===================================== -->
<!-- CONTAINER -->
<!-- ===================================== -->

<div class="max-w-6xl mx-auto mt-10 bg-white p-6 rounded-lg shadow">

    
    <!-- ===================================== -->
    <!-- HEADER -->
    <!-- ===================================== -->

    <div class="flex justify-between items-center mb-6">

        <h1 class="text-2xl font-bold">
            📚 Data Peminjaman
        </h1>


        <!-- tombol menuju form tambah peminjaman -->
        <a href="tambah_peminjaman.php"
        class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">

            + Pinjam Buku

        </a>

    </div>


        
    <!-- ===================================== -->
    <!-- TABEL -->
    <!-- ===================================== -->

    <table class="w-full border border-gray-300">

        
        <!-- HEADER TABEL -->
        <thead class="bg-gray-200">

            <tr>

                <th class="p-3 border">No</th>

                <th class="p-3 border">Nama Peminjam</th>

                <th class="p-3 border">Judul Buku</th>

                <th class="p-3 border">Tanggal Pinjam</th>

                <th class="p-3 border">Tanggal Kembali</th>

                <th class="p-3 border">Status</th>

                <th class="p-3 border">Denda</th>

                <th class="p-3 border">Aksi</th>

            </tr>

        </thead>



        <!-- ISI TABEL -->
        <tbody>

        <?php

        // nomor urut
        $no = 1;

        // looping data dari database
        while($row = mysqli_fetch_assoc($query)) {

        ?>

            <tr class="text-center hover:bg-gray-100">

                
                <!-- nomor -->
                <td class="p-3 border">
                    <?= $no++; ?>
                </td>


                <!-- nama peminjam -->
                <td class="p-3 border">
                    <?= $row['nama_peminjam']; ?>
                </td>


                <!-- judul buku -->
                <td class="p-3 border">
                    <?= $row['judul']; ?>
                </td>


                <!-- tanggal pinjam -->
                <td class="p-3 border">
                    <?= $row['tanggal_pinjam']; ?>
                </td>


                <!-- tanggal kembali -->
                <td class="p-3 border">
                    <?= $row['tanggal_kembali']; ?>
                </td>


                <!-- status -->
                <td class="p-3 border">

                    <?php if(strtolower($row['status']) == 'dipinjam') { ?>

                        <span class="bg-yellow-400 text-white px-3 py-1 rounded">

                            Dipinjam

                        </span>

                    <?php } else { ?>

                        <span class="bg-green-500 text-white px-3 py-1 rounded">

                            Kembali

                        </span>

                    <?php } ?>

                </td>



                <!-- denda -->
                <td class="p-3 border">

                    Rp <?= number_format($row['denda']); ?>

                </td>



                <!-- tombol aksi -->
                <td class="p-3 border">


                    <?php if(strtolower($row['status']) == 'dipinjam') { ?>

                        
                        <!-- tombol kembalikan -->
                        <a href="../proses/kembalikan.php?id=<?= $row['id']; ?>"

                        class="bg-blue-500 hover:bg-blue-600 text-white px-3 py-1 rounded">

                            Kembalikan

                        </a>

                    <?php } else { ?>

                        
                        <!-- kalau sudah kembali -->
                        <span class="text-gray-500">

                            Sudah Kembali

                        </span>

                    <?php } ?>


                </td>

            </tr>

        <?php } ?>

        </tbody>

    </table>
    </div>

</body>
</html>

</div>

</body>
</html>