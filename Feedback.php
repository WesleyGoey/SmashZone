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
        <nav
            class="bg-green-800 text-white w-full flex items-center justify-between px-6 md:px-8 py-6 md:py-6 relative z-20">
            <div class="flex items-center gap-3">
                <img src="logo.png" alt="Logo Penyewa Badminton"
                    class="w-10 h-10 md:w-12 md:h-12 rounded-full object-cover" />
                <a href="UserDashboard.php" class="text-2xl font-bold">SmashZone</a>
            </div>

            <div class="hidden md:flex gap-10 text-xl">
                <a href="UserDashboard.php" class="hover:underline underline-offset-8">Home</a>
                <a href="Booking.php" class="hover:underline underline-offset-8">Booking</a>
                <a href="Feedback.php" class="underline underline-offset-8 hover:underline">Feedback</a>
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
                <a href="UserDashboard.html" class="block py-2 hover:underline">Home</a>
                <a href="Booking.html" class="block py-2 hover:underline">Booking</a>
                <a href="Feedback.html" class="block py-2 hover:underline">Feedback</a>
                <a href="index.php" class="flex items-center gap-2 text-red-400 hover:text-red-500 py-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" stroke="currentColor"
                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24">
                        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4" />
                        <polyline points="16 17 21 12 16 7" />
                        <line x1="21" y1="12" x2="9" y2="12" />
                    </svg>
                    Logout
                </a>
            </div>
        </nav>
    </header>
    <!-- /Navigation Bar -->

    <main class="max-w-lg mx-auto mt-24 bg-white p-8 rounded-lg shadow">
        <h2 class="text-2xl font-bold mb-6 text-center">Give Your Feedback</h2>
        <form>
            <label for="feedback" class="block mb-2 font-semibold">Your Feedback</label>
            <textarea id="feedback" name="feedback" rows="4" class="w-full border rounded p-2 mb-4"
                placeholder="Write your feedback here..."></textarea>

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

            <button type="submit"
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
    </script>
</body>

</html>