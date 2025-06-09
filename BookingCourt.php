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
            // Get the last inserted booking_id using a new connection
            $conn = my_connectDB();
            $booking_id = null;
            $get_id_query = "SELECT booking_id FROM Bookings WHERE order_name='$order_name' AND field_id='$field_id' AND booking_date='$booking_date' AND start_time='$start_time' AND end_time='$end_time' ORDER BY booking_id DESC LIMIT 1";
            $get_id_result = mysqli_query($conn, $get_id_query);
            if ($get_id_result && $row = mysqli_fetch_assoc($get_id_result)) {
                $booking_id = $row['booking_id'];
            }

            // Calculate duration in hours
            $start = strtotime($start_time);
            $end = strtotime($end_time);
            $hours = ($end - $start) / 3600;
            if ($hours < 1) $hours = 1; // Minimum 1 hour

            // Create transaction for this booking
            $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
            $order_date = date('Y-m-d H:i:s');
            $amount = $booking_price * $hours;
            $isPaid = 0;
            if ($user_id && $booking_id) {
                // Insert NULL for payment_method and payment_date using direct SQL
                $sql = "INSERT INTO Transactions (user_id, booking_id, order_date, amount, payment_method, payment_date, isPaid) 
                        VALUES ('$user_id', '$booking_id', '$order_date', '$amount', NULL, NULL, '$isPaid')";
                mysqli_query($conn, $sql);
            }
            my_closeDB($conn);

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
            <a href="Dashboard.php" class="text-2xl font-bold">SmashZone</a>
        </div>
        <!-- Desktop Menu -->
        <div class="hidden md:flex items-center gap-8">
            <div class="flex gap-10 text-xl">
                <a href="Dashboard.php" class="hover:underline underline-offset-8">Home</a>
                <a href="Booking.php" class="hover:underline underline-offset-8">Booking</a>
                <a href="Feedback.php" class="hover:underline underline-offset-8">Feedback</a>
            </div>
            <a href="Profile.php" class="flex items-center justify-center w-10 h-10 rounded-full bg-white hover:bg-green-700 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-green-800 hover:text-white transition" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                    <circle cx="12" cy="8" r="4" />
                    <path d="M4 20c0-4 8-4 8-4s8 0 8 4" />
                </svg>
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
                <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-green-800 hover:text-white transition" fill="none" stroke="currentColor"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                    <circle cx="12" cy="8" r="4" />
                    <path d="M4 20c0-4 8-4 8-4s8 0 8 4" />
                </svg>
            </a>
        </div>
        <!-- Mobile Menu -->
        <div id="mobileMenu"
            class="mobile-menu absolute top-full left-0 w-full bg-green-800 text-white flex flex-col gap-2 px-8 py-4 hidden md:hidden z-50">
            <div class="flex flex-col gap-1">
                <a href="Dashboard.php" class="block py-2 hover:underline">Home</a>
                <a href="Booking.php" class="block py-2 hover:underline">Booking</a>
                <a href="Feedback.php" class="block py-2 hover:underline">Feedback</a>
            </div>
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
    <script>
        const hamburger = document.getElementById('hamburger');
        const mobileMenu = document.getElementById('mobileMenu');
        hamburger.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</body>
</html>