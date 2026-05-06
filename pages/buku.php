<?php
include '../config/koneksi.php';
$data = mysqli_query($conn, "SELECT * FROM buku");
?>

<!DOCTYPE html>
<html>
<head>
<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<div class="max-w-5xl mx-auto mt-10 bg-white p-6 rounded-lg shadow">

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">📚 Data Buku</h1>

        <a href="tambah_buku.php" 
        class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">
            + Tambah Buku
        </a>
    </div>

    <table class="w-full border border-gray-200 rounded overflow-hidden">
        <thead class="bg-gray-200">
            <tr>
                <th class="p-3 text-left">Judul</th>
                <th class="p-3 text-left">Penulis</th>
                <th class="p-3 text-left">Tahun</th>
                <th class="p-3 text-center">Aksi</th>
            </tr>
        </thead>

        <tbody>
        <?php while($row = mysqli_fetch_assoc($data)) { ?>
            <tr class="border-t hover:bg-gray-50">
                <td class="p-3"><?= $row['judul']; ?></td>
                <td class="p-3"><?= $row['penulis']; ?></td>
                <td class="p-3"><?= $row['tahun']; ?></td>
                <td class="p-3 text-center space-x-2">

                    <a href="../proses/edit_buku.php?id=<?= $row['id']; ?>" 
                    class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded">
                        Edit
                    </a>

                    <a href="../proses/hapus_buku.php?id=<?= $row['id']; ?>" 
                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded"
                    onclick="return confirm('Yakin hapus?')">
                        Hapus
                    </a>

                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

</div>

</body>
</html>