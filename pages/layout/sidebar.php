<div class="w-64 h-screen bg-lime-200 text-black fixed">

    
    <!-- LOGO -->
    <div class="p-6 text-2xl font-bold border-b border-gray-700">

        📚 Perpustakaan

    </div>



    <!-- MENU -->
    <div class="p-4 space-y-2">

        
        <!-- dashboard -->
        <a href="dashboard.php"

        class="block p-3 rounded hover:bg-gray-700">

            🏠 Dashboard

        </a>



        <!-- admin only -->
        <?php if($_SESSION['role'] == 'admin') { ?>

            <a href="buku.php"

            class="block p-3 rounded hover:bg-gray-700">

                📖 Kelola Buku

            </a>

        <?php } ?>



        <!-- peminjaman -->
        <a href="peminjaman.php"

        class="block p-3 rounded hover:bg-gray-700">

            📦 Peminjaman

        </a>



        <!-- user -->
        <?php if($_SESSION['role'] == 'user') { ?>

            <a href="history_user.php"

            class="block p-3 rounded hover:bg-gray-700">

                📜 History Saya

            </a>

        <?php } ?>



        <!-- logout -->
        <a href="../proses/logout.php"

        class="block p-3 rounded bg-red-500 hover:bg-red-600 mt-10">

            🚪 Logout

        </a>

    </div>

</div>