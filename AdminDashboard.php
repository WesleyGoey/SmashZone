<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>SmashZone Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <?php
    require_once __DIR__ . '/CRUD/Controller.php';
    // Get total bookings
    $bookingCount = count(readBookings());
    // Get total feedback
    $feedbackCount = count(readReviews());
    // Get total pending payments
    $pendingPayments = 0;
    $transactions = readTransactions();
    foreach ($transactions as $t) {
        if (isset($t['isPaid']) && $t['isPaid'] == 0) {
            $pendingPayments++;
        }
    }
    ?>
</head>

<body class="bg-green-50 min-h-screen flex flex-col justify-center">
    <!-- Navigation Bar -->
    <header>
        <nav class="bg-green-800 text-white w-full flex items-center justify-between px-4 md:px-8 py-4 md:py-6 relative z-20">
            <div class="flex items-center gap-3">
                <img src="logo.png" alt="Logo Admin SmashZone"
                    class="w-10 h-10 md:w-12 md:h-12 rounded-full object-cover" />
                <a href="AdminDashboard.php" class="text-xl md:text-2xl font-bold">SmashZone Admin</a>
            </div>
            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center gap-8">
                <div class="flex gap-6 md:gap-10 text-lg md:text-xl">
                    <a href="AdminDashboard.php" class="underline underline-offset-8">Dashboard</a>
                    <a href="AdminSchedule.php" class="hover:underline underline-offset-8">Schedule</a>
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
                class="mobile-menu absolute top-full left-0 w-full bg-green-800 text-white flex flex-col gap-2 px-6 py-4 hidden md:hidden z-50">
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

    <main class="max-w-full md:max-w-6xl mx-auto flex-1 flex flex-col justify-center bg-white p-4 md:p-10 md:p-16 rounded-2xl shadow-lg min-h-[70vh] my-8 md:my-20">
        <h2 class="text-2xl md:text-4xl font-bold mb-8 md:mb-12 text-center">Admin Dashboard</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 md:gap-12 mb-10 md:mb-16">
            <!-- Bookings Card -->
            <a href="AdminSchedule.php" class="bg-green-100 rounded-xl p-5 md:p-7 flex flex-col justify-center items-center shadow cursor-pointer hover:ring-4 hover:ring-green-300 transition min-h-[140px] md:min-h-[200px]">
                <div class="text-5xl md:text-7xl font-semibold text-green-800 mb-2 md:mb-4 text-center">
                    <?php echo isset($bookingCount) ? $bookingCount : '0'; ?>
                </div>
                <div class="text-lg md:text-xl font-semibold text-green-900 mb-1 md:mb-2 text-center">Total Bookings</div>
            </a>
            <!-- Feedback Card -->
            <a href="AdminFeedback.php" class="bg-yellow-100 rounded-xl p-5 md:p-7 flex flex-col justify-center items-center shadow cursor-pointer hover:ring-4 hover:ring-yellow-200 transition min-h-[140px] md:min-h-[200px]">
                <div class="text-5xl md:text-7xl font-semibold text-yellow-800 mb-2 md:mb-4 text-center">
                    <?php echo isset($feedbackCount) ? $feedbackCount : '0'; ?>
                </div>
                <div class="text-lg md:text-xl font-semibold text-yellow-900 mb-1 md:mb-2 text-center">User Feedback</div>
            </a>
            <!-- Pending Payments Card -->
            <a href="AdminPendingPayments.php" class="bg-red-100 rounded-xl p-5 md:p-7 flex flex-col justify-center items-center shadow cursor-pointer hover:ring-4 hover:ring-red-200 transition min-h-[140px] md:min-h-[200px]">
                <div class="text-5xl md:text-7xl font-semibold text-red-800 mb-2 md:mb-4 text-center">
                    <?php echo isset($pendingPayments) ? $pendingPayments : '0'; ?>
                </div>
                <div class="text-lg md:text-xl font-semibold text-red-900 mb-1 md:mb-2 text-center">Pending Payments</div>
            </a>
        </div>
        <p class="text-center text-gray-600 text-base md:text-lg mt-6 md:mt-8">Welcome to the admin dashboard. Select a menu above to manage the system.</p>
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