<div class="ml-64 bg-white shadow p-4 flex justify-between items-center">

    
    <!-- judul -->
    <h1 class="text-2xl font-bold">

        Dashboard

    </h1>



    <!-- user login -->
    <div>

        Login sebagai:

        <b><?= $_SESSION['username']; ?></b>

        (<?= $_SESSION['role']; ?>)

    </div>

    <button onclick="toggleDark()"

class="bg-gray-800 text-white px-4 py-2 rounded">

    🌙 Dark Mode

</button>

</div>