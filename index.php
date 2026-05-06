<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">

<form action="proses/login_proses.php" method="POST" 
class="bg-white p-6 rounded shadow-md w-80">

    <h2 class="text-xl font-bold mb-4 text-center">Login</h2>

    <input type="text" name="username" placeholder="Username"
    class="w-full p-2 border mb-3 rounded" required>

    <input type="password" name="password" placeholder="Password"
    class="w-full p-2 border mb-3 rounded" required>

    <button class="bg-blue-500 text-white w-full p-2 rounded">
        Login
    </button>

</form>

</body>
</html>