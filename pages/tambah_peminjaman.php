<?php
include '../config/koneksi.php';

// ambil semua data buku untuk dropdown
$buku = mysqli_query($conn, "SELECT * FROM buku");
?>

<!DOCTYPE html>
<html>
<head>
<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="p-6">

<form action="../proses/tambah_peminjaman_proses.php" method="POST"
class="max-w-md mx-auto bg-white p-6 rounded shadow">

<h2 class="text-lg font-bold mb-4">Pinjam Buku</h2>

<!-- input nama peminjam -->
<input type="text" name="nama" placeholder="Nama Peminjam"
class="w-full p-2 border mb-2">

<!-- dropdown pilih buku -->
<select name="buku_id" class="w-full p-2 border mb-2">
<?php while($b = mysqli_fetch_assoc($buku)) { ?>
    <!-- value = id buku, yang dikirim ke database -->
    <option value="<?= $b['id']; ?>">
        <?= $b['judul']; ?> <!-- yang ditampilkan -->
    </option>

    <td><?= $row['status']; ?></td>
<td><?= $row['denda']; ?></td>

<td>
<?php if($row['status'] == 'dipinjam') { ?>
    <!-- tombol kembalikan hanya muncul kalau masih dipinjam -->
    <a href="../proses/kembalikan.php?id=<?= $row['id']; ?>"
    class="bg-blue-500 text-white px-2 py-1 rounded">
        Kembalikan
    </a>
<?php } else { ?>
    -
<?php } ?>
</td>
<?php } ?>
</select>

<!-- tanggal pinjam -->
<input type="date" name="tgl_pinjam" class="w-full p-2 border mb-2">

<!-- tanggal kembali -->
<input type="date" name="tgl_kembali" class="w-full p-2 border mb-2">

<!-- tombol submit -->
<button class="bg-blue-500 text-white px-4 py-2 rounded">
Pinjam
</button>

</form>

</body>
</html>