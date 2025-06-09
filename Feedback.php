<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>SmashZone</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <?php
    session_start();
    require_once __DIR__ . '/CRUD/Controller.php';
    $feedbackSuccess = null;
    $feedbackError = null;

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['feedback_submit'])) {
        $user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
        $comment = trim($_POST['feedback']);
        $rating = intval($_POST['rating']);
        $review_date = date('Y-m-d H:i:s');
        if ($user_id && $comment && $rating > 0) {
            $result = createReviews($user_id, $rating, $comment, $review_date);
            if ($result) {
                $feedbackSuccess = "Thank you for your feedback!";
            } else {
                $feedbackError = "Failed to submit feedback. Please try again.";
            }
        } else {
            $feedbackError = "Please provide feedback and a rating.";
        }
    }
    ?>
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
                    <a href="Booking.php" class="hover:underline underline-offset-8">Booking</a>
                    <a href="Feedback.php" class="underline underline-offset-8 hover:underline">Feedback</a>
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
    </header>
    <!-- /Navigation Bar -->

    <main class="max-w-lg mx-auto mt-24 bg-white p-8 rounded-lg shadow">
        <h2 class="text-2xl font-bold mb-6 text-center">Give Your Feedback</h2>
        <?php if (isset($feedbackSuccess)): ?>
            <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-2 text-center"><?= $feedbackSuccess ?></div>
        <?php elseif (isset($feedbackError)): ?>
            <div class="bg-red-100 text-red-800 px-4 py-2 rounded mb-2 text-center"><?= $feedbackError ?></div>
        <?php endif; ?>
        <form method="POST" action="">
            <label for="feedback" class="block mb-2 font-semibold">Your Feedback</label>
            <textarea id="feedback" name="feedback" rows="4" class="w-full border rounded p-2 mb-4"
                placeholder="Write your feedback here..." required></textarea>

            <label class="block mb-2 font-semibold text-center w-full">Rating</label>
            <div class="flex justify-center mb-6">
                <div id="star-rating" class="flex items-center gap-1">
                    <button type="button" class="star text-3xl text-gray-300 hover:text-yellow-400 transition">&#9733;</button>
                    <button type="button" class="star text-3xl text-gray-300 hover:text-yellow-400 transition">&#9733;</button>
                    <button type="button" class="star text-3xl text-gray-300 hover:text-yellow-400 transition">&#9733;</button>
                    <button type="button" class="star text-3xl text-gray-300 hover:text-yellow-400 transition">&#9733;</button>
                    <button type="button" class="star text-3xl text-gray-300 hover:text-yellow-400 transition">&#9733;</button>
                </div>
            </div>
            <input type="hidden" name="rating" id="rating" value="0" />

            <button type="submit" name="feedback_submit"
                class="w-full bg-green-700 text-white py-2 rounded hover:bg-green-900 transition">Submit</button>
        </form>
    </main>

    <script>
        // Star rating logic
        const stars = document.querySelectorAll('.star');
        const ratingInput = document.getElementById('rating');
        stars.forEach((star, idx) => {
            star.addEventListener('click', () => {
                ratingInput.value = idx + 1;
                stars.forEach((s, i) => {
                    s.classList.toggle('text-yellow-400', i <= idx);
                    s.classList.toggle('text-gray-300', i > idx);
                });
            });
        });

        // Hamburger menu toggle
        const hamburger = document.getElementById('hamburger');
        const mobileMenu = document.getElementById('mobileMenu');
        hamburger.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    </script>
</body>

</html>