<?php
// koneksi ke database
include '../config/koneksi.php';

// ambil data peminjaman + gabung ke tabel buku
$query = mysqli_query($conn, "
SELECT peminjaman.*, buku.judul 
FROM peminjaman 
JOIN buku ON peminjaman.buku_id = buku.id
");
?>

<!DOCTYPE html>
<html>
<head>
<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<div class="max-w-5xl mx-auto mt-10 bg-white p-6 rounded shadow">

<h1 class="text-xl font-bold mb-4">Data Peminjaman</h1>

<!-- tombol menuju form tambah -->
<a href="tambah_peminjaman.php" 
class="bg-green-500 text-white px-4 py-2 rounded">
+ Pinjam Buku
</a>

<table class="w-full mt-4 border">
<tr class="bg-gray-200">
    <th class="p-2">Nama</th>
    <th class="p-2">Buku</th>
    <th class="p-2">Tgl Pinjam</th>
    <th class="p-2">Tgl Kembali</th>
    <th class="p-2">Status</th>
</tr>

<?php while($row = mysqli_fetch_assoc($query)) { ?>
<tr class="border-t">
    <!-- tampilkan nama peminjam -->
    <td class="p-2"><?= $row['nama_peminjam']; ?></td>

    <!-- hasil JOIN: ambil judul dari tabel buku -->
    <td class="p-2"><?= $row['judul']; ?></td>

    <!-- tanggal pinjam -->
    <td class="p-2"><?= $row['tanggal_pinjam']; ?></td>

    <!-- tanggal kembali -->
    <td class="p-2"><?= $row['tanggal_kembali']; ?></td>

    <!-- status pinjaman -->
    <td class="p-2"><?= $row['status']; ?></td>
    
</tr>

<tr class="bg-gray-200">
    <th>Nama</th>
    <th>Buku</th>
    <th>Tgl Pinjam</th>
    <th>Tgl Kembali</th>
    <th>Status</th>
    <th>Denda</th>
    <th>Aksi</th>
</tr>
<?php } ?>


</table>

</div>
</body>
</html>

