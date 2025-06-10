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
$profile_picture = isset($user['profile_picture']) && $user['profile_picture'] ? $user['profile_picture'] : 'logo.png';
$message = '';

// Handle profile picture upload
if (isset($_POST['upload_picture']) && isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] == 0) {
    $target_dir = "uploads/";
    if (!is_dir($target_dir)) {
        mkdir($target_dir, 0777, true);
    }
    $ext = strtolower(pathinfo($_FILES['profile_picture']['name'], PATHINFO_EXTENSION));
    $allowed = ['jpg', 'jpeg', 'png', 'gif'];
    if (in_array($ext, $allowed)) {
        $new_filename = "profile_" . $_SESSION['user_id'] . "_" . time() . "." . $ext;
        $target_file = $target_dir . $new_filename;
        if (move_uploaded_file($_FILES['profile_picture']['tmp_name'], $target_file)) {
            updateUserProfilePicture($_SESSION['user_id'], $target_file);
            $profile_picture = $target_file;
            $message = "<div class='text-green-700 font-bold mb-2'>Profile picture updated!</div>";
        } else {
            $message = "<div class='text-red-700 font-bold mb-2'>Failed to upload image.</div>";
        }
    } else {
        $message = "<div class='text-red-700 font-bold mb-2'>Invalid file type.</div>";
    }
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

if (isset($_POST['delete_account'])) {
    // Hapus user dari database
    $user_id = $_SESSION['user_id'];
    if (deleteUsers($user_id)) {
        session_destroy();
        header("Location: index.php");
        exit();
    } else {
        $message = "<div class='text-red-700 font-bold mb-2'>Failed to delete account.</div>";
    }
}

function updateUserProfilePicture($user_id, $profile_picture_path)
{
    $result = false;
    if ($user_id != "" && $profile_picture_path != "") {
        $conn = my_connectDB();
        $profile_picture_path_sql = mysqli_real_escape_string($conn, $profile_picture_path);
        $sql_query = "UPDATE Users SET profile_picture='$profile_picture_path_sql' WHERE user_id='$user_id'";
        $result = mysqli_query($conn, $sql_query) or die(mysqli_error($conn));
        my_closeDB($conn);
    }
    return $result;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Profile - SmashZone</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-green-50 min-h-screen">
    <!-- Navbar -->
    <nav class="bg-green-800 text-white w-full flex items-center justify-between px-6 md:px-8 py-6 md:py-6 relative z-20">
        <div class="flex items-center gap-3">
            <img src="<?= htmlspecialchars($profile_picture) ?>" alt="Profile Picture"
                class="w-10 h-10 md:w-12 md:h-12 rounded-full object-cover border-2 border-white" />
            <a href="Dashboard.php" class="text-2xl font-bold">SmashZone</a>
        </div>
        <!-- Desktop Menu -->
        <div class="hidden md:flex items-center gap-8">
            <div class="flex gap-10 text-xl">
                <a href="Dashboard.php" class="hover:underline underline-offset-8">Home</a>
                <a href="Booking.php" class="hover:underline underline-offset-8">Booking</a>
                <a href="Feedback.php" class="hover:underline underline-offset-8">Feedback</a>
            </div>
            <a href="Profile.php" class="flex items-center justify-center w-10 h-10 rounded-full bg-white hover:bg-green-700 transition ml-4">
                <img src="<?= htmlspecialchars($profile_picture) ?>" alt="Profile Picture"
                    class="w-8 h-8 rounded-full object-cover" />
            </a>
        </div>
        <!-- Mobile Right: Hamburger + Profile -->
        <div class="flex items-center gap-3 md:hidden">
            <button id="hamburger" class="block focus:outline-none">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="white" viewBox="0 0 16 16">
                    <path fill-rule="evenodd"
                        d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5m0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5" />
                </svg>
            </button>
            <a href="Profile.php" class="flex items-center justify-center w-10 h-10 rounded-full bg-white hover:bg-green-700 transition">
                <img src="<?= htmlspecialchars($profile_picture) ?>" alt="Profile Picture"
                    class="w-8 h-8 rounded-full object-cover" />
            </a>
        </div>
        <!-- Mobile Menu -->
        <div id="mobileMenu"
            class="mobile-menu absolute top-full left-0 w-full bg-green-800 text-white flex flex-col gap-2 px-8 py-4 hidden md:hidden z-50">
            <a href="Dashboard.php" class="block py-2 hover:underline">Home</a>
            <a href="Booking.php" class="block py-2 hover:underline">Booking</a>
            <a href="Feedback.php" class="block py-2 hover:underline">Feedback</a>
        </div>
    </nav>
    <!-- End Navbar -->

    <main class="flex flex-col items-center justify-center min-h-[80vh] px-2 py-8">
        <div class="bg-white rounded-xl shadow-lg w-full max-w-md p-8 mt-8">
            <div class="flex flex-col items-center mb-6">
                <img src="<?= htmlspecialchars($profile_picture) ?>" alt="Profile Picture"
                    class="w-24 h-24 rounded-full object-cover border-2 border-green-700 mb-2" />
                <span class="text-2xl font-bold text-green-800 mb-2"><?= htmlspecialchars($username) ?></span>
                <span class="text-gray-600"><?= htmlspecialchars($email) ?></span>
                <span class="text-gray-600"><?= htmlspecialchars($phone) ?></span>
            </div>
            <?= $message ?>
            <form method="POST" enctype="multipart/form-data" class="mb-6 flex flex-col items-center gap-2">
                <label class="block font-semibold mb-1">Change Profile Picture</label>
                <input type="file" name="profile_picture" accept="image/*" class="mb-2" required>
                <button type="submit" name="upload_picture" class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-900">Upload</button>
            </form>
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
            <div class="flex flex-col items-start gap-2">
                <form method="POST">
                    <button type="submit" name="logout" class="text-red-600 hover:underline font-semibold">Logout</button>
                </form>
                <form method="POST">
                    <button type="submit" name="delete_account" class="text-red-600 hover:underline font-semibold">Delete My Account</button>
                </form>
            </div>
            <div class="mt-4">
                <a href="Dashboard.php" class="text-green-700 hover:underline">&larr; Back to Dashboard</a>
            </div>
        </div>
    </main>
    <script>
        // Hamburger menu toggle
        const hamburger = document.getElementById('hamburger');
        const mobileMenu = document.getElementById('mobileMenu');
        hamburger.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</body>
</html>