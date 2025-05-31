<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login / Register - SmashZone</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-green-50 min-h-screen flex items-center justify-center">
    <div class="bg-white rounded-xl shadow-lg w-full max-w-md p-8">
        <div class="flex flex-col items-center mb-8">
            <div class="bg-green-800 rounded-full p-3 mb-2 flex items-center justify-center">
                <img src="logo.png" alt="SmashZone Logo" class="w-16 h-16 object-cover" />
            </div>
            <span class="text-2xl font-bold text-green-800 tracking-wide">SmashZone</span>
        </div>
        <div class="flex justify-center mb-6">
            <button id="loginTab" class="flex-1 py-2 text-lg font-semibold text-green-800 border-b-2 border-green-800 focus:outline-none transition" onclick="showTab('login')">Login</button>
            <button id="registerTab" class="flex-1 py-2 text-lg font-semibold text-green-800 border-b-2 border-transparent focus:outline-none transition" onclick="showTab('register')">Register</button>
        </div>
        <!-- Login -->
        <form id="loginForm" class="space-y-5">
            <div>
                <label for="login_username" class="block text-green-900 font-semibold mb-1">Username</label>
                <input type="text" id="login_username" name="login_username" class="w-full border border-green-200 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-800 bg-green-50" required>
            </div>
            <div>
                <label for="login_password" class="block text-green-900 font-semibold mb-1">Password</label>
                <input type="password" id="login_password" name="login_password" class="w-full border border-green-200 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-green-800 bg-green-50" required>
            </div>
            <button type="submit" class="w-full bg-green-800 hover:bg-green-900 text-white font-bold py-2 rounded transition">Login</button>
        </form>
        <!-- /Login -->

        <!-- Register -->
        <form id="registerForm" class="space-y-5 hidden">
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
            <button type="submit" class="w-full bg-green-800 hover:bg-green-900 text-white font-bold py-2 rounded transition">Register</button>
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