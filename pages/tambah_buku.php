<!DOCTYPE html>
<html>
<head>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6">

<form action="../proses/tambah_buku_proses.php"

method="POST"

enctype="multipart/form-data"

class="w-96">

<input type="text" name="judul" placeholder="Judul"
class="w-full p-2 border mb-2">

<input type="text" name="penulis" placeholder="Penulis"
class="w-full p-2 border mb-2">

<input type="number" name="tahun" placeholder="Tahun"
class="w-full p-2 border mb-2">


<!-- input stok buku -->
<input type="number" name="stok" placeholder="Stok Buku"
class="w-full p-2 border mb-2">

<!-- upload cover buku -->
<input type="file"

name="cover"

class="w-full p-2 border mb-2">

<button class="bg-blue-500 text-white px-4 py-2 rounded">
Tambah
</button>

</form>

</body>
</html>