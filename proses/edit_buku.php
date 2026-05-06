<?php
include '../config/koneksi.php';

$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM buku WHERE id='$id'");
$row = mysqli_fetch_assoc($data);
?>

<!DOCTYPE html>
<html>
<head>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6">

<h1 class="text-xl font-bold mb-4">Edit Buku</h1>

<form action="../proses/edit_buku_proses.php" method="POST" class="w-96">

<input type="hidden" name="id" value="<?= $row['id']; ?>">

<input type="text" name="judul" value="<?= $row['judul']; ?>"
class="w-full p-2 border mb-2">

<input type="text" name="penulis" value="<?= $row['penulis']; ?>"
class="w-full p-2 border mb-2">

<input type="number" name="tahun" value="<?= $row['tahun']; ?>"
class="w-full p-2 border mb-2">

<button class="bg-blue-500 text-white px-4 py-2 rounded">
Update
</button>

</form>

</body>
</html>