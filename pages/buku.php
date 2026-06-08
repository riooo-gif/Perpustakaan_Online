<?php

session_start();

include '../config/koneksi.php';

// =====================================
// PAGINATION
// =====================================

// jumlah data per halaman
$batas = 5;


// ambil halaman aktif
$halaman = isset($_GET['halaman'])

? $_GET['halaman']

: 1;


// hitung posisi data awal
$awal_data = ($halaman - 1) * $batas;


// =====================================
// SEARCH
// =====================================

$search = isset($_GET['search'])

? $_GET['search']

: '';


// =====================================
// QUERY DATA
// =====================================

$data = mysqli_query($conn, "

SELECT * FROM buku

WHERE judul LIKE '%$search%'

LIMIT $awal_data, $batas

");


// =====================================
// TOTAL DATA
// =====================================

$total_data = mysqli_num_rows(

    mysqli_query($conn, "

    SELECT * FROM buku

    WHERE judul LIKE '%$search%'

")

);


// hitung total halaman
$total_halaman = ceil($total_data / $batas);
?>




<!DOCTYPE html>
<html>
<head>
<script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">

<?php include 'layout/sidebar.php'; ?>

<div class="ml-64 p-6">
<div class="max-w-5xl mx-auto mt-10 bg-white p-6 rounded-lg shadow">

    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">📚 Data Buku</h1>

        <a href="tambah_buku.php" 
        class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">
            + Tambah Buku
        </a>
    </div>

    <form method="GET" class="mb-4">

           <input
    type="text"
    name="search"
    id="search"
    placeholder="Cari buku..."
    class="border p-2 rounded w-64 mb-4">
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">
                Cari

            </button>

    </form>

    <table class="w-full border border-gray-200 rounded overflow-hidden">
        <thead class="bg-gray-200">
            <tr>
                <th class="p-3 text-left">Judul</th>
                <th class="p-3 text-left">Penulis</th>
                <th class="p-3 text-left">Tahun</th>
                <th class="p-3 text-center">Aksi</th>
                <th class="p-3 text-left">Stok</th>
                <th class="p-3">Cover</th>
            </tr>
        </thead>

        <tbody id="hasil-search">
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
                <td class="p-3"><?= $row['stok']; ?></td>

                <td class="p-3">

                    <img src="../uploads/<?= $row['cover']; ?>"

                    width="70"

                    class="rounded shadow">

                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

    <!-- PAGINATION -->
<div class="flex gap-2 mt-6">


<?php for($i = 1; $i <= $total_halaman; $i++) { ?>


    <a href="?halaman=<?= $i; ?>&search=<?= $search; ?>"

    class="px-4 py-2 border rounded

    <?= ($halaman == $i)

    ? 'bg-blue-500 text-white'

    : 'bg-white'; ?>">

        <?= $i; ?>

        </a>


        <?php } ?>


        </div>

        </div>
<script>

const search = document.getElementById('search');

search.addEventListener('keyup', function(){

    let keyword = this.value;

    let xhr = new XMLHttpRequest();

    xhr.open(
        'GET',
        'ajax_buku.php?search=' + keyword,
        true
    );

    xhr.onload = function(){

        document.getElementById(
            'hasil-search'
        ).innerHTML = this.responseText;

    }

    xhr.send();

});

</script>
</div>

</body>
</html>


</body>
</html>
