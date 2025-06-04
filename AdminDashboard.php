<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>SmashZone Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        html, body {
            height: 100%;
            overflow: hidden;
        }
        body {
            min-height: 100vh;
        }
    </style>
</head>

<body class="bg-green-50 min-h-screen flex flex-col justify-center">
    <!-- Navigation Bar -->
    <header>
        <nav class="bg-green-800 text-white w-full flex items-center justify-between px-6 md:px-8 py-6 md:py-6 relative z-20">
            <div class="flex items-center gap-3">
                <img src="logo.png" alt="Logo Admin SmashZone"
                    class="w-10 h-10 md:w-12 md:h-12 rounded-full object-cover" />
                <a href="AdminDashboard.php" class="text-2xl font-bold">SmashZone Admin</a>
            </div>

            <div class="hidden md:flex gap-10 text-xl">
                <a href="AdminDashboard.php" class="underline underline-offset-8">Dashboard</a>
                <a href="AdminSchedule.php" class="hover:underline underline-offset-8">Schedule</a>
                <a href="AdminPendingPayments.php" class="hover:underline underline-offset-8">Pending Payments</a>
                <a href="AdminFeedback.php" class="hover:underline underline-offset-8">Feedback</a>
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
                <a href="AdminHome.php" class="block py-2 underline">Dashboard</a>
                <a href="#" class="block py-2 hover:underline">Schedule</a>
                <a href="#" class="block py-2 hover:underline">Pending Payments</a>
                <a href="#" class="block py-2 hover:underline">Feedback</a>
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
    </header>
    <!-- /Navigation Bar -->

    <!-- Admin Content Placeholder -->
    <main class="max-w-6xl mx-auto flex-1 flex flex-col justify-center bg-white p-10 md:p-16 rounded-2xl shadow-lg min-h-[70vh] my-20">
        <h2 class="text-4xl font-bold mb-12 text-center">Admin Dashboard</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-12 mb-16">
            <!-- Bookings Card -->
            <a href="AdminSchedule.php" class="bg-green-100 rounded-xl p-7 flex flex-col justify-center items-center shadow cursor-pointer hover:ring-4 hover:ring-green-300 transition min-h-[200px]">
                <div class="text-7xl font-semibold text-green-800 mb-4 text-center">
                    <?php
                    // Replace with actual query to count bookings
                    // Example: $bookingCount = ...;
                    echo isset($bookingCount) ? $bookingCount : '12';
                    ?>
                </div>
                <div class="text-xl font-semibold text-green-900 mb-2 text-center">Total Bookings</div>
            </a>
            <!-- Feedback Card -->
            <a href="AdminFeedback.php" class="bg-yellow-100 rounded-xl p-7 flex flex-col justify-center items-center shadow cursor-pointer hover:ring-4 hover:ring-yellow-200 transition min-h-[200px]">
                <div class="text-7xl font-semibold text-yellow-800 mb-4 text-center">
                    <?php
                    // Replace with actual query to count feedback
                    // Example: $feedbackCount = ...;
                    echo isset($feedbackCount) ? $feedbackCount : '5';
                    ?>
                </div>
                <div class="text-xl font-semibold text-yellow-900 mb-2 text-center">User Feedback</div>
            </a>
            <!-- Pending Payments Card -->
            <a href="AdminPendingPayments.php" class="bg-red-100 rounded-xl p-7 flex flex-col justify-center items-center shadow cursor-pointer hover:ring-4 hover:ring-red-200 transition min-h-[200px]">
                <div class="text-7xl font-semibold text-red-800 mb-4 text-center">
                    <?php
                    // Replace with actual query to count pending payments
                    // Example: $pendingPayments = ...;
                    echo isset($pendingPayments) ? $pendingPayments : '3';
                    ?>
                </div>
                <div class="text-xl font-semibold text-red-900 mb-2 text-center">Pending Payments</div>
            </a>
        </div>
        <p class="text-center text-gray-600 text-lg mt-8">Welcome to the admin dashboard. Select a menu above to manage the system.</p>
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