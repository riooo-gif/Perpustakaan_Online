<?php

include '../config/koneksi.php';


// ambil keyword
$search = $_GET['search'];


// query pencarian
$query = mysqli_query($conn, "

SELECT * FROM buku

WHERE judul LIKE '%$search%'

");


// looping data
while($row = mysqli_fetch_assoc($query)) {

?>

<tr class="text-center">

    
    <!-- cover -->
    <td class="p-3 border">

        <img src="../uploads/<?= $row['cover']; ?>"

        width="70"

        class="mx-auto rounded">

    </td>


    <!-- judul -->
    <td class="p-3 border">

        <?= $row['judul']; ?>

    </td>


    <!-- penulis -->
    <td class="p-3 border">

        <?= $row['penulis']; ?>

    </td>


    <!-- tahun -->
    <td class="p-3 border">

        <?= $row['tahun']; ?>

    </td>


    <!-- stok -->
    <td class="p-3 border">

        <?= $row['stok']; ?>

    </td>

</tr>

<?php } ?>