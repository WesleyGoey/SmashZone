<?php
session_start();
require_once __DIR__ . '/CRUD/Controller.php';

// Ambil tanggal dari GET, jika ada simpan ke session. Jika tidak ada, ambil dari session. Jika tidak ada juga, default hari ini.
if (isset($_GET['date'])) {
    $_SESSION['admin_selected_date'] = $_GET['date'];
    $selectedDate = $_GET['date'];
} elseif (isset($_SESSION['admin_selected_date'])) {
    $selectedDate = $_SESSION['admin_selected_date'];
} else {
    $selectedDate = date('Y-m-d');
    $_SESSION['admin_selected_date'] = $selectedDate;
}

// Ambil semua bookings
$bookings = readBookings();

// Filter hanya booking di tanggal yang dipilih
$selectedBookings = array_filter($bookings, function ($b) use ($selectedDate) {
    return isset($b['booking_date']) && $b['booking_date'] === $selectedDate;
});

// Sort by booking_date and start_time
usort($selectedBookings, function ($a, $b) {
    $dateA = $a['booking_date'] . ' ' . $a['start_time'];
    $dateB = $b['booking_date'] . ' ' . $b['start_time'];
    return strcmp($dateA, $dateB);
});
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>SmashZone Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-green-50">
    <!-- Navigation Bar -->
    <header>
        <nav class="bg-green-800 text-white w-full flex items-center justify-between px-6 md:px-8 py-6 md:py-6 relative z-20">
            <div class="flex items-center gap-3">
                <img src="logo.png" alt="Logo Admin SmashZone"
                    class="w-10 h-10 md:w-12 md:h-12 rounded-full object-cover" />
                <a href="AdminDashboard.php" class="text-2xl font-bold">SmashZone Admin</a>
            </div>
            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center gap-8">
                <div class="flex gap-10 text-xl">
                    <a href="AdminDashboard.php" class="hover:underline underline-offset-8">Dashboard</a>
                    <a href="AdminSchedule.php" class="underline underline-offset-8 hover:underline">Schedule</a>
                    <a href="AdminPendingPayments.php" class="hover:underline underline-offset-8">Pending Payments</a>
                    <a href="AdminFeedback.php" class="hover:underline underline-offset-8">Feedback</a>
                </div>
                <a href="AdminProfile.php" class="flex items-center justify-center w-10 h-10 rounded-full bg-white hover:bg-green-700 transition">
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
                <a href="AdminProfile.php" class="flex items-center justify-center w-10 h-10 rounded-full bg-white hover:bg-green-700 transition">
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
                    <a href="AdminDashboard.php" class="block py-2 hover:underline">Dashboard</a>
                    <a href="AdminSchedule.php" class="block py-2 hover:underline">Schedule</a>
                    <a href="AdminPendingPayments.php" class="block py-2 hover:underline">Pending Payments</a>
                    <a href="AdminFeedback.php" class="block py-2 hover:underline">Feedback</a>
                </div>
            </div>
        </nav>
    </header>
    <!-- /Navigation Bar -->

    <main class="max-w-full md:max-w-4xl mx-auto mt-10 md:mt-24 bg-white p-4 md:p-8 rounded-lg shadow">
        <form method="get" class="mb-8 flex flex-col md:flex-row items-center gap-4 justify-center">
            <label for="date" class="font-semibold text-green-800">Select Date:</label>
            <input type="date" id="date" name="date" value="<?= htmlspecialchars($selectedDate) ?>" class="border px-2 py-1 rounded" required>
            <button type="submit" class="bg-green-700 text-white px-4 py-2 rounded hover:bg-green-900 transition">Show</button>
        </form>
        <h2 class="text-xl md:text-2xl font-bold mb-6 text-center">
            Field Bookings for <?= date('d M Y', strtotime($selectedDate)) ?>
        </h2>
        <?php if (count($selectedBookings) > 0): ?>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-green-200 rounded-lg shadow text-xs md:text-base">
                    <thead>
                        <tr class="bg-green-100 text-green-900">
                            <th class="py-2 px-2 md:px-4 border-b">Booking ID</th>
                            <th class="py-2 px-2 md:px-4 border-b">Order Name</th>
                            <th class="py-2 px-2 md:px-4 border-b">Field Name</th>
                            <th class="py-2 px-2 md:px-4 border-b">Booking Date</th>
                            <th class="py-2 px-2 md:px-4 border-b">Start Time</th>
                            <th class="py-2 px-2 md:px-4 border-b">End Time</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($selectedBookings as $booking): ?>
                            <?php
                            $fieldName = $booking['field_id'];
                            if (function_exists('getFieldID')) {
                                $field = getFieldID($booking['field_id']);
                                if ($field && isset($field['field_name'])) {
                                    $fieldName = $field['field_name'];
                                }
                            }
                            ?>
                            <tr class="text-center border-b hover:bg-green-50">
                                <td class="py-2 px-2 md:px-4"><?= htmlspecialchars($booking['booking_id']) ?></td>
                                <td class="py-2 px-2 md:px-4"><?= htmlspecialchars($booking['order_name']) ?></td>
                                <td class="py-2 px-2 md:px-4"><?= htmlspecialchars($fieldName) ?></td>
                                <td class="py-2 px-2 md:px-4"><?= htmlspecialchars($booking['booking_date']) ?></td>
                                <td class="py-2 px-2 md:px-4"><?= htmlspecialchars($booking['start_time']) ?></td>
                                <td class="py-2 px-2 md:px-4"><?= htmlspecialchars($booking['end_time']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="text-center text-gray-500 text-sm md:text-base">No bookings for this date.</div>
        <?php endif; ?>
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