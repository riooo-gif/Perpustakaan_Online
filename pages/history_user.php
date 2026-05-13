<?php

session_start();

include '../config/koneksi.php';


// ambil id user login
$user_id = $_SESSION['id'];


// ambil history user
$query = mysqli_query($conn, "

SELECT peminjaman.*, buku.judul

FROM peminjaman

JOIN buku ON peminjaman.buku_id = buku.id

WHERE peminjaman.user_id = '$user_id'

");

?>

<!DOCTYPE html>
<html>
<head>

<script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-gray-100">


<div class="max-w-5xl mx-auto mt-10 bg-white p-6 rounded shadow">

    <h1 class="text-2xl font-bold mb-6">

        📚 History Peminjaman

    </h1>


    <table class="w-full border">

        <tr class="bg-gray-200">

            <th class="p-3 border">Judul Buku</th>

            <th class="p-3 border">Tanggal Pinjam</th>

            <th class="p-3 border">Tanggal Kembali</th>

            <th class="p-3 border">Status</th>

            <th class="p-3 border">Denda</th>

        </tr>


        <?php while($row = mysqli_fetch_assoc($query)) { ?>

        <tr class="text-center">

            <td class="p-3 border">

                <?= $row['judul']; ?>

            </td>

            <td class="p-3 border">

                <?= $row['tanggal_pinjam']; ?>

            </td>

            <td class="p-3 border">

                <?= $row['tanggal_kembali']; ?>

            </td>

            <td class="p-3 border">

                <?= $row['status']; ?>

            </td>

            <td class="p-3 border">

                Rp <?= number_format($row['denda']); ?>

            </td>

        </tr>

        <?php } ?>

    </table>

</div>

</body>
</html>