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

            <div class="hidden md:flex gap-10 text-xl">
                <a href="AdminDashboard.php" class="hover:underline underline-offset-8">Dashboard</a>
                <a href="AdminSchedule.php" class="hover:underline underline-offset-8">Schedule</a>
                <a href="AdminPendingPayments.php" class="underline underline-offset-8">Pending Payments</a>
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
    <main class="max-w-4xl mx-auto mt-24 bg-white p-8 rounded-lg shadow">
        <h2 class="text-2xl font-bold mb-6 text-center">Admin Dashboard</h2>
        <p class="text-center text-gray-600">Welcome to the admin dashboard. Select a menu above to manage the system.</p>
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