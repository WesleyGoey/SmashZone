<?php
include_once("CRUD/Controller.php");
session_start();

// Get court name from URL
$court = isset($_GET['court']) ? $_GET['court'] : '';

$fields = readFields();
$field_id = null;
$field_name = null;
$price_per_hour = null;

// Find field_id by court name
foreach ($fields as $field) {
    if ($field['field_name'] == $court) {
        $field_id = $field['field_id'];
        $field_name = $field['field_name'];
        $price_per_hour = $field['price_per_hour'];
        break;
    }
}

// Handle booking form submission
$message = '';
if (isset($_POST['book_submit'])) {
    $order_name = isset($_POST['order_name']) ? trim($_POST['order_name']) : '';
    $booking_date = isset($_POST['booking_date']) ? $_POST['booking_date'] : '';
    $start_time = isset($_POST['start_time']) ? $_POST['start_time'] : '';
    $end_time = isset($_POST['end_time']) ? $_POST['end_time'] : '';
    $status = 1;
    $booking_price = $price_per_hour;

    if ($field_id && $order_name != '' && $booking_date != '' && $start_time != '' && $end_time != '') {
        $result = createBookings($order_name, $field_id, $booking_date, $start_time, $end_time, $booking_price, $status);
        if ($result) {
            header("Location: Booking.php");
            exit();
        } else {
            $message = "<div class='text-red-700 font-bold mb-2'>Booking Failed!</div>";
        }
    } else {
        $message = "<div class='text-red-700 font-bold mb-2'>Please fill all fields!</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Booking Court - SmashZone</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-green-50">
    <!-- Navbar User -->
    <nav class="bg-green-800 text-white w-full flex items-center justify-between px-6 md:px-8 py-6 md:py-6 relative z-20">
        <div class="flex items-center gap-3">
            <img src="logo.png" alt="Logo Penyewa Badminton"
                class="w-10 h-10 md:w-12 md:h-12 rounded-full object-cover" />
            <a href="UserDashboard.php" class="text-2xl font-bold">SmashZone</a>
        </div>
        <div class="hidden md:flex gap-10 text-xl">
            <a href="UserDashboard.php" class="hover:underline underline-offset-8">Home</a>
            <a href="Booking.php" class="hover:underline underline-offset-8">Booking</a>
            <a href="Feedback.php" class="hover:underline underline-offset-8">Feedback</a>
            <a href="index.php" class="flex items-center gap-2 text-red-400 hover:text-red-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                    <polyline points="16 17 21 12 16 7" />
                    <line x1="21" y1="12" x2="9" y2="12" />
                </svg>
                Log out
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
            <a href="UserDashboard.php" class="block py-2 hover:underline">Home</a>
            <a href="Booking.php" class="block py-2 hover:underline">Booking</a>
            <a href="Feedback.php" class="block py-2 hover:underline">Feedback</a>
            <a href="index.php" class="flex items-center gap-2 text-red-400 hover:text-red-500 py-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                    <polyline points="16 17 21 12 16 7" />
                    <line x1="21" y1="12" x2="9" y2="12" />
                </svg>
                Log out
            </a>
        </div>
    </nav>
    <div class="max-w-xl mx-auto mt-12 bg-white p-8 rounded-lg shadow">
        <h2 class="text-2xl font-bold mb-4 text-green-800">Book a Court</h2>
        <?php if ($field_id): ?>
            <p class="mb-2"><strong>Court Name:</strong> <?= htmlspecialchars($field_name) ?></p>
            <p class="mb-4"><strong>Price per Hour:</strong> Rp <?= number_format($price_per_hour, 0, ',', '.') ?></p>
            <?= $message ?>
            <form method="POST" class="space-y-4">
                <p>Order Name: <input type="text" name="order_name" required class="border px-2 py-1 rounded"></p>
                <p>Booking Date: <input type="date" name="booking_date" required class="border px-2 py-1 rounded"></p>
                <p>Start Time: <input type="time" name="start_time" required class="border px-2 py-1 rounded" step="3600"></p>
                <p>End Time: <input type="time" name="end_time" required class="border px-2 py-1 rounded" step="3600"></p>
                <button type="submit" name="book_submit" class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-900">Book Now</button>
            </form>
        <?php else: ?>
            <div class="text-red-600 font-bold">Court not found.</div>
        <?php endif; ?>
        <div class="mt-6">
            <a href="Booking.php" class="text-green-700 hover:underline">&larr; Back to court list</a>
        </div>
    </div>
</body>
</html>