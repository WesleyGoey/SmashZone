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
                    <a href="AdminSchedule.php" class="hover:underline underline-offset-8">Schedule</a>
                    <a href="AdminPendingPayments.php" class="hover:underline underline-offset-8">Pending Payments</a>
                    <a href="AdminFeedback.php" class="underline underline-offset-8 hover:underline">Feedback</a>
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

    <!-- Admin Content Placeholder -->
    <main class="max-w-full md:max-w-4xl mx-auto mt-10 md:mt-24 bg-white p-4 md:p-8 rounded-lg shadow">
        <h2 class="text-xl md:text-2xl font-bold mb-6 text-center">User Reviews & Feedback</h2>
        <?php
        // Use CRUD/Controller.php to fetch reviews
        require_once __DIR__ . '/CRUD/Controller.php';

        // Use the correct function name from Controller.php
        // getReviewID should be called with a review_id, so to display all reviews, use readReviews()
        $reviews = function_exists('readReviews') ? readReviews() : [];

        if ($reviews && count($reviews) > 0) {
            echo "<div class='grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6'>";
            foreach ($reviews as $row) {
                // Get username from Users table using user_id
                $username = "Unknown";
                if (function_exists('getUserID')) {
                    $user = getUserID($row['user_id']);
                    if ($user && isset($user['username'])) {
                        $username = $user['username'];
                    }
                }
                $stars = str_repeat('★', intval($row['rating'])) . str_repeat('☆', 5 - intval($row['rating']));
                echo "<div class='bg-green-50 border border-green-200 rounded-xl shadow p-4 md:p-6 flex flex-col h-full'>
                    <div class='flex flex-col sm:flex-row sm:items-center sm:justify-between mb-2 gap-1'>
                        <span class='font-semibold text-green-800 text-base md:text-lg'>" . htmlspecialchars($username) . "</span>
                        <span class='text-yellow-500 text-lg md:text-xl'>" . $stars . "</span>
                    </div>
                    <div class='text-gray-700 mb-3 italic text-sm md:text-base'>\"" . nl2br(htmlspecialchars($row['comment'])) . "\"</div>
                    <div class='text-gray-400 text-xs text-right mt-auto'>" . htmlspecialchars($row['review_date']) . "</div>
                </div>";
            }
            echo "</div>";
        } else {
            echo "<div class='text-center text-gray-500 text-sm md:text-base'>No feedback found.</div>";
        }
        ?>
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