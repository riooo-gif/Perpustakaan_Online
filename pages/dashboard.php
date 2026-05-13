<?php

session_start();

if(!isset($_SESSION['login'])){

    header("Location: ../index.php");

}

include '../config/koneksi.php';


// =====================================
// HITUNG TOTAL BUKU
// =====================================

$buku = mysqli_query($conn, "

SELECT * FROM buku

");

$totalBuku = mysqli_num_rows($buku);


// =====================================
// HITUNG TOTAL PEMINJAMAN
// =====================================

$pinjam = mysqli_query($conn, "

SELECT * FROM peminjaman

");

$totalPinjam = mysqli_num_rows($pinjam);

?>

<?php

// =====================================
// TOTAL DIPINJAM
// =====================================

$dipinjam = mysqli_query($conn, "

SELECT * FROM peminjaman

WHERE status='dipinjam'

");

$totalDipinjam = mysqli_num_rows($dipinjam);


// =====================================
// TOTAL KEMBALI
// =====================================

$kembali = mysqli_query($conn, "

SELECT * FROM peminjaman

WHERE status='kembali'

");

$totalKembali = mysqli_num_rows($kembali);

?>

<!DOCTYPE html>
<html>
<head>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.tailwindcss.com"></script>

</head>


<body id="body" class="bg-gray-100 transition-all duration-300">


<!-- SIDEBAR -->
<?php include 'layout/sidebar.php'; ?>


<!-- NAVBAR -->
<?php include 'layout/navbar.php'; ?>


<!-- CONTENT -->
<div class="ml-64 p-6">

    
    <!-- CARD -->
    <div class="grid grid-cols-2 gap-6">

        
        <!-- total buku -->
        <div class="bg-white p-6 rounded shadow">

            <h2 class="text-gray-500">

                Total Buku

            </h2>

            <p class="text-4xl font-bold mt-2">

                <?= $totalBuku; ?>

            </p>

        </div>



        <!-- total peminjaman -->
        <div class="bg-white p-6 rounded shadow">

            <h2 class="text-gray-500">

                Total Peminjaman

            </h2>

            <p class="text-4xl font-bold mt-2">

                <?= $totalPinjam; ?>

            </p>

        </div>

        <!-- CHART -->
        <div class="bg-white p-6 rounded shadow mt-6">

            <h2 class="text-xl font-bold mb-4">

                Statistik Peminjaman

            </h2>

            <canvas id="myChart"></canvas>

        </div>

    </div>

</div>

<script>

const ctx = document.getElementById('myChart');

new Chart(ctx, {

    type: 'bar',

    data: {

        labels: ['Dipinjam', 'Kembali'],

        datasets: [{

            label: 'Jumlah Buku',

            data: [

                <?= $totalDipinjam; ?>,

                <?= $totalKembali; ?>

            ],

            borderWidth: 1

        }]

    },

    options: {

        responsive: true

    }

});

</script>

<script>

function toggleDark(){

    const body = document.getElementById('body');

    body.classList.toggle('bg-gray-900');

    body.classList.toggle('text-black');

}

</script>

</body>
</html> 