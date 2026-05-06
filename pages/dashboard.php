<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("Location: ../index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6">

<h1 class="text-2xl font-bold mb-4">Dashboard</h1>

<a href="buku.php" class="bg-blue-500 text-white px-4 py-2 rounded">
    Kelola Buku
</a>

</body>
</html>