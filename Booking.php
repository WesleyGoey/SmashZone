<?php
session_start();
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>SmashZone</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-green-50">
    <!-- Navigation Bar -->
    <header>
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
                    <a href="Booking.php" class="underline underline-offset-8 hover:underline">Booking</a>
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
            <div class="flex items-center gap-4 md:hidden">
                <button id="hamburger" class="block focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="white" viewBox="0 0 16 16">
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
    </header>
    <!-- /Navigation Bar -->

    <!-- Court List -->
    <main class="max-w-6xl mx-auto px-2 py-8">
        <h2 class="text-2xl font-bold mb-6 text-center">Court List</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">

            <div class="bg-white rounded-lg shadow p-3 flex flex-col items-center">
                <div class="w-full aspect-video mb-3 overflow-hidden rounded">
                    <img src="court.jpg" alt="Court A" class="w-full h-full object-cover" />
                </div>
                <h3 class="text-lg font-semibold mb-1">Court A</h3>
                <p class="text-green-700 font-bold mb-2 text-sm">Rp 100,000 / hour</p>
                <a href="BookingCourt.php?court=Court%20A" class="bg-green-700 text-white px-3 py-1 rounded hover:bg-green-900 text-sm transition">See Detail</a>
            </div>

            <div class="bg-white rounded-lg shadow p-3 flex flex-col items-center">
                <div class="w-full aspect-video mb-3 overflow-hidden rounded">
                    <img src="court.jpg" alt="Court B" class="w-full h-full object-cover" />
                </div>
                <h3 class="text-lg font-semibold mb-1">Court B</h3>
                <p class="text-green-700 font-bold mb-2 text-sm">Rp 100,000 / hour</p>
                <a href="BookingCourt.php?court=Court%20B" class="bg-green-700 text-white px-3 py-1 rounded hover:bg-green-900 text-sm transition">See Detail</a>
            </div>

            <div class="bg-white rounded-lg shadow p-3 flex flex-col items-center">
                <div class="w-full aspect-video mb-3 overflow-hidden rounded">
                    <img src="court.jpg" alt="Court C" class="w-full h-full object-cover" />
                </div>
                <h3 class="text-lg font-semibold mb-1">Court C</h3>
                <p class="text-green-700 font-bold mb-2 text-sm">Rp 100,000 / hour</p>
                <a href="BookingCourt.php?court=Court%20C" class="bg-green-700 text-white px-3 py-1 rounded hover:bg-green-900 text-sm transition">See Detail</a>
            </div>

            <div class="bg-white rounded-lg shadow p-3 flex flex-col items-center">
                <div class="w-full aspect-video mb-3 overflow-hidden rounded">
                    <img src="court.jpg" alt="Court D" class="w-full h-full object-cover" />
                </div>
                <h3 class="text-lg font-semibold mb-1">Court D</h3>
                <p class="text-green-700 font-bold mb-2 text-sm">Rp 100,000 / hour</p>
                <a href="BookingCourt.php?court=Court%20D" class="bg-green-700 text-white px-3 py-1 rounded hover:bg-green-900 text-sm transition">See Detail</a>
            </div>

            <div class="bg-white rounded-lg shadow p-3 flex flex-col items-center">
                <div class="w-full aspect-video mb-3 overflow-hidden rounded">
                    <img src="court.jpg" alt="Court E" class="w-full h-full object-cover" />
                </div>
                <h3 class="text-lg font-semibold mb-1">Court E</h3>
                <p class="text-green-700 font-bold mb-2 text-sm">Rp 100,000 / hour</p>
                <a href="BookingCourt.php?court=Court%20E" class="bg-green-700 text-white px-3 py-1 rounded hover:bg-green-900 text-sm transition">See Detail</a>
            </div>

            <div class="bg-white rounded-lg shadow p-3 flex flex-col items-center">
                <div class="w-full aspect-video mb-3 overflow-hidden rounded">
                    <img src="court.jpg" alt="Court F" class="w-full h-full object-cover" />
                </div>
                <h3 class="text-lg font-semibold mb-1">Court F</h3>
                <p class="text-green-700 font-bold mb-2 text-sm">Rp 100,000 / hour</p>
                <a href="BookingCourt.php?court=Court%20F" class="bg-green-700 text-white px-3 py-1 rounded hover:bg-green-900 text-sm transition">See Detail</a>
            </div>
        </div>
    </main>
    <!-- /Court List -->

    <!-- Current Bookings Section -->
    <section class="max-w-4xl mx-auto my-16 bg-white p-8 rounded-lg shadow">
        <h2 class="text-2xl font-bold mb-6 text-center text-green-800">Your Current Bookings</h2>
        <?php
        require_once __DIR__ . '/CRUD/Controller.php';
        $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
        $user_transactions = [];
        if ($user_id) {
            // Find transactions where user_id matches the logged-in user and is not paid
            $all_transactions = readTransactions();
            foreach ($all_transactions as $transaction) {
                if (
                    isset($transaction['user_id']) && $transaction['user_id'] == $user_id &&
                    isset($transaction['isPaid']) && $transaction['isPaid'] == 0
                ) {
                    $user_transactions[] = $transaction;
                }
            }
        }
        if ($user_id && count($user_transactions) > 0): ?>
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-green-200 rounded-lg shadow">
                    <thead>
                        <tr class="bg-green-100 text-green-900">
                            <th class="py-2 px-4 border-b">Booking ID</th>
                            <th class="py-2 px-4 border-b">Order Name</th>
                            <th class="py-2 px-4 border-b">Field Name</th>
                            <th class="py-2 px-4 border-b">Booking Date</th>
                            <th class="py-2 px-4 border-b">Start Time</th>
                            <th class="py-2 px-4 border-b">End Time</th>
                            <th class="py-2 px-4 border-b">Status</th>
                            <th class="py-2 px-4 border-b">Paid</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($user_transactions as $transaction): ?>
                            <?php
                                // Get booking info
                                $booking = function_exists('getBookingID') ? getBookingID($transaction['booking_id']) : null;
                                $order_name = $booking && isset($booking['order_name']) ? $booking['order_name'] : '-';
                                $fieldName = $booking && isset($booking['field_id']) ? $booking['field_id'] : '-';
                                if ($booking && function_exists('getFieldID')) {
                                    $field = getFieldID($booking['field_id']);
                                    if ($field && isset($field['field_name'])) {
                                        $fieldName = $field['field_name'];
                                    }
                                }
                                $booking_date = $booking && isset($booking['booking_date']) ? $booking['booking_date'] : '-';
                                $start_time = $booking && isset($booking['start_time']) ? $booking['start_time'] : '-';
                                $end_time = $booking && isset($booking['end_time']) ? $booking['end_time'] : '-';
                                $status = $booking && isset($booking['status']) ? $booking['status'] : '-';
                                $isPaid = isset($transaction['isPaid']) && $transaction['isPaid'] ? 'Yes' : 'No';
                            ?>
                            <tr class="text-center border-b hover:bg-green-50">
                                <td class="py-2 px-4"><?= htmlspecialchars($transaction['booking_id']) ?></td>
                                <td class="py-2 px-4"><?= htmlspecialchars($order_name) ?></td>
                                <td class="py-2 px-4"><?= htmlspecialchars($fieldName) ?></td>
                                <td class="py-2 px-4"><?= htmlspecialchars($booking_date) ?></td>
                                <td class="py-2 px-4"><?= htmlspecialchars($start_time) ?></td>
                                <td class="py-2 px-4"><?= htmlspecialchars($end_time) ?></td>
                                <td class="py-2 px-4"><?= htmlspecialchars($status) ?></td>
                                <td class="py-2 px-4"><?= htmlspecialchars($isPaid) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php elseif ($user_id): ?>
            <div class="text-center text-gray-500">You have no bookings yet.</div>
        <?php else: ?>
            <div class="text-center text-gray-500">Please log in to see your bookings.</div>
        <?php endif; ?>
    </section>

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