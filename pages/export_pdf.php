<?php

require '../vendor/autoload.php';

include '../config/koneksi.php';

use Dompdf\Dompdf;


// =====================================
// AMBIL DATA PEMINJAMAN
// =====================================

$query = mysqli_query($conn, "

SELECT peminjaman.*, buku.judul

FROM peminjaman

JOIN buku ON peminjaman.buku_id = buku.id

");


// =====================================
// HTML PDF
// =====================================

$html = '

<h1 style="text-align:center;">
Laporan Peminjaman Buku
</h1>

<table border="1" width="100%" cellspacing="0" cellpadding="8">

<tr>

    <th>No</th>

    <th>Nama</th>

    <th>Buku</th>

    <th>Tanggal Pinjam</th>

    <th>Tanggal Kembali</th>

    <th>Status</th>

    <th>Denda</th>

</tr>

';


// nomor
$no = 1;


// looping data
while($row = mysqli_fetch_assoc($query)){

    $html .= '

    <tr>

        <td>'.$no++.'</td>

        <td>'.$row['nama_peminjam'].'</td>

        <td>'.$row['judul'].'</td>

        <td>'.$row['tanggal_pinjam'].'</td>

        <td>'.$row['tanggal_kembali'].'</td>

        <td>'.$row['status'].'</td>

        <td>Rp '.number_format($row['denda']).'</td>

    </tr>

    ';

}


// tutup tabel
$html .= '</table>';


// =====================================
// GENERATE PDF
// =====================================

$dompdf = new Dompdf();

$dompdf->loadHtml($html);


// ukuran kertas
$dompdf->setPaper('A4', 'portrait');


// render pdf
$dompdf->render();


// tampilkan pdf
$dompdf->stream("laporan-peminjaman.pdf");

?>