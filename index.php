<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login / Register - SmashZone</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <?php
    session_start();
    $registerSuccess = null;
    $registerError = null;
    $loginError = null;

    require_once __DIR__ . '/CRUD/Controller.php';

    // Handle registration
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['register_submit'])) {
        $username = trim($_POST['register_username']);
        $email = trim($_POST['register_email']);
        $password = trim($_POST['register_password']);
        $phone = trim($_POST['register_phone']);
        $isAdmin = 0; // Default to regular user

        if ($username && $email && $password && $phone) {
            $result = createUsers($username, $email, $password, $phone, $isAdmin);
            if ($result) {
                header("Location: Dashboard.php");
                exit();
            } else {
                $registerError = "Registration failed. Please try again.";
            }
        } else {
            $registerError = "All fields are required.";
        }
    }

    // Handle login
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login_submit'])) {
        $login_username = trim($_POST['login_username']);
        $login_password = trim($_POST['login_password']);
        $users = readUsers();
        $found = false;
        foreach ($users as $user) {
            if ($user['username'] === $login_username && $user['password'] === $login_password) {
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['isAdmin'] = $user['isAdmin'];
                $found = true;
                if ($user['isAdmin']) {
                    header("Location: AdminDashboard.php");
                } else {
                    header("Location: Dashboard.php");
                }
                exit();
            }
        }
        if (!$found) {
            $loginError = "Invalid username or password.";
        }
    }
    ?>
</head>

<body class="bg-green-50 min-h-screen flex items-center justify-center">
    <div class="bg-white rounded-xl shadow-lg w-full max-w-md p-8">
        <div class="flex flex-col items-center mb-6">
            <div class="bg-green-800 rounded-full p-3 mt-2 mb-4 flex items-center justify-center">
                <img src="logo.png" alt="SmashZone Logo" class="w-16 h-16 object-cover" />
            </div>
            <span class="text-4xl font-bold text-green-800 tracking-wide">SmashZone</span>
        </div>
        <div class="flex justify-center mb-6">
            <button id="loginTab" class="flex-1 py-2 text-lg font-semibold text-green-800 border-b-2 border-green-800 focus:outline-none transition" onclick="showTab('login')">Login</button>
            <button id="registerTab" class="flex-1 py-2 text-lg font-semibold text-green-800 border-b-2 border-transparent focus:outline-none transition" onclick="showTab('register')">Register</button>
        </div>
        <!-- Login -->
        <form id="loginForm" class="space-y-5" method="POST" action="">
            <?php if (isset($loginError)): ?>
                <div class="bg-red-100 text-red-800 px-4 py-2 rounded mb-2 text-center"><?= $loginError ?></div>
            <?php endif; ?>
            <div>
                <label for="login_username" class="block text-green-900 font-semibold mb-1">Username</label>
                <input type="text" id="login_username" name="login_username" class="w-full border border-green-200 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-800 bg-green-50" required>
            </div>
            <div>
                <label for="login_password" class="block text-green-900 font-semibold mb-1">Password</label>
                <input type="password" id="login_password" name="login_password" class="w-full border border-green-200 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-800 bg-green-50" required>
            </div>
            <button type="submit" name="login_submit" class="w-full bg-green-800 hover:bg-green-900 text-white font-bold py-2 rounded transition">Login</button>
        </form>
        <!-- /Login -->

        <!-- Register -->
        <form id="registerForm" class="space-y-5 hidden" method="POST" action="">
            <?php if (isset($registerSuccess)): ?>
                <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-2 text-center"><?= $registerSuccess ?></div>
            <?php elseif (isset($registerError)): ?>
                <div class="bg-red-100 text-red-800 px-4 py-2 rounded mb-2 text-center"><?= $registerError ?></div>
            <?php endif; ?>
            <div>
                <label for="register_username" class="block text-green-900 font-semibold mb-1">Username</label>
                <input type="text" id="register_username" name="register_username" class="w-full border border-green-200 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-800 bg-green-50" required>
            </div>
            <div>
                <label for="register_email" class="block text-green-900 font-semibold mb-1">Email</label>
                <input type="email" id="register_email" name="register_email" class="w-full border border-green-200 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-800 bg-green-50" required>
            </div>
            <div>
                <label for="register_password" class="block text-green-900 font-semibold mb-1">Password</label>
                <input type="password" id="register_password" name="register_password" class="w-full border border-green-200 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-800 bg-green-50" required>
            </div>
            <div>
                <label for="register_phone" class="block text-green-900 font-semibold mb-1">Phone</label>
                <input type="text" id="register_phone" name="register_phone" class="w-full border border-green-200 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-800 bg-green-50" required>
            </div>
            <button type="submit" name="register_submit" class="w-full bg-green-800 hover:bg-green-900 text-white font-bold py-2 rounded transition">Register</button>
        </form>
        <!-- /Register -->

    </div>
    <script>
        function showTab(tab) {
            const loginTab = document.getElementById('loginTab');
            const registerTab = document.getElementById('registerTab');
            const loginForm = document.getElementById('loginForm');
            const registerForm = document.getElementById('registerForm');
            if (tab === 'login') {
                loginTab.classList.add('border-green-800');
                loginTab.classList.remove('border-transparent');
                registerTab.classList.add('border-transparent');
                registerTab.classList.remove('border-green-800');
                loginForm.classList.remove('hidden');
                registerForm.classList.add('hidden');
            } else {
                registerTab.classList.add('border-green-800');
                registerTab.classList.remove('border-transparent');
                loginTab.classList.add('border-transparent');
                loginTab.classList.remove('border-green-800');
                registerForm.classList.remove('hidden');
                loginForm.classList.add('hidden');
            }
        }
    </script>
</body>

</html>