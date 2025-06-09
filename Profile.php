<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}
require_once "CRUD/Controller.php";
$user = getUserID($_SESSION['user_id']);
$username = isset($user['username']) ? $user['username'] : '';
$email = isset($user['email']) ? $user['email'] : '';
$phone = isset($user['phone']) ? $user['phone'] : '';
$password = isset($user['password']) ? $user['password'] : '';
$message = '';

if (isset($_POST['logout'])) {
    session_destroy();
    header("Location: index.php");
    exit();
}

// Handle update profile
if (isset($_POST['update_profile'])) {
    $new_username = trim($_POST['username']);
    $new_password = trim($_POST['password']);
    $new_email = trim($_POST['email']);
    $new_phone = trim($_POST['phone']);
    $user_id = $_SESSION['user_id'];

    if ($new_username && $new_email && $new_phone && $new_password) {
        $result = updateUsers($user_id, $new_username, $new_email, $new_password, $new_phone, $user['isAdmin']);
        if ($result) {
            $message = "<div class='text-green-700 font-bold mb-2'>Profile updated successfully!</div>";
            // Refresh user data
            $user = getUserID($user_id);
            $username = $user['username'];
            $email = $user['email'];
            $phone = $user['phone'];
            $password = $user['password'];
        } else {
            $message = "<div class='text-red-700 font-bold mb-2'>Failed to update profile.</div>";
        }
    } else {
        $message = "<div class='text-red-700 font-bold mb-2'>All fields are required.</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Profile - SmashZone</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-green-50 min-h-screen flex items-center justify-center">
    <!-- Navbar -->
    <nav class="bg-green-800 text-white w-full flex items-center justify-between px-6 md:px-8 py-6 md:py-6 relative z-20">
        <div class="flex items-center gap-3">
            <img src="logo.png" alt="Logo SmashZone"
                class="w-10 h-10 md:w-12 md:h-12 rounded-full object-cover" />
            <a href="Dashboard.php" class="text-2xl font-bold">SmashZone</a>
        </div>
        <div class="hidden md:flex gap-10 text-xl">
            <a href="Dashboard.php" class="hover:underline underline-offset-8">Home</a>
            <a href="Booking.php" class="hover:underline underline-offset-8">Booking</a>
            <a href="Feedback.php" class="hover:underline underline-offset-8">Feedback</a>
            <a href="Profile.php" class="flex items-center gap-2 text-green-200 hover:text-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                    <circle cx="12" cy="8" r="4" />
                    <path d="M4 20c0-4 8-4 8-4s8 0 8 4" />
                </svg>
                Profile
            </a>
        </div>
        <button id="hamburger" class="md:hidden block focus:outline-none">
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="white" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5" />
            </svg>
        </button>
        <div id="mobileMenu"
            class="mobile-menu absolute top-full left-0 w-full bg-green-800 text-white flex-col gap-5 px-8 py-4 hidden md:hidden">
            <a href="Dashboard.php" class="block py-2 hover:underline">Home</a>
            <a href="Booking.php" class="block py-2 hover:underline">Booking</a>
            <a href="Feedback.php" class="block py-2 hover:underline">Feedback</a>
            <a href="Profile.php" class="flex items-center gap-2 text-green-200 hover:text-white py-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                    <circle cx="12" cy="8" r="4" />
                    <path d="M4 20c0-4 8-4 8-4s8 0 8 4" />
                </svg>
                Profile
            </a>
        </div>
    </nav>
    <!-- End Navbar -->

    <div class="bg-white rounded-xl shadow-lg w-full max-w-md p-8">
        <div class="flex flex-col items-center mb-6">
            <span class="text-2xl font-bold text-green-800 mb-2"><?= htmlspecialchars($username) ?></span>
            <span class="text-gray-600"><?= htmlspecialchars($email) ?></span>
            <span class="text-gray-600"><?= htmlspecialchars($phone) ?></span>
        </div>
        <?= $message ?>
        <form method="POST" class="space-y-4 mb-6">
            <div>
                <label class="block font-semibold mb-1">Username</label>
                <input type="text" name="username" value="<?= htmlspecialchars($username) ?>" class="w-full border px-3 py-2 rounded" required>
            </div>
            <div>
                <label class="block font-semibold mb-1">Password</label>
                <input type="text" name="password" value="<?= htmlspecialchars($password) ?>" class="w-full border px-3 py-2 rounded" required>
            </div>
            <div>
                <label class="block font-semibold mb-1">Email</label>
                <input type="email" name="email" value="<?= htmlspecialchars($email) ?>" class="w-full border px-3 py-2 rounded" required>
            </div>
            <div>
                <label class="block font-semibold mb-1">Phone</label>
                <input type="text" name="phone" value="<?= htmlspecialchars($phone) ?>" class="w-full border px-3 py-2 rounded" required>
            </div>
            <button type="submit" name="update_profile" class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-900 w-full">Update Profile</button>
        </form>
        <form method="POST" class="flex flex-col items-center">
            <button type="submit" name="logout" class="bg-red-600 hover:bg-red-800 text-white px-6 py-2 rounded font-semibold transition">Logout</button>
        </form>
        <div class="mt-6 text-center">
            <a href="Dashboard.php" class="text-green-700 hover:underline">&larr; Back to Dashboard</a>
        </div>
    </div>
</body>
</html>