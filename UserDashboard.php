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
                <a href="UserDashboard.php" class="underline underline-offset-8">Home</a>
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

    <!-- Home -->
    <section
        class="flex flex-col md:flex-row items-center justify-between px-8 py-16 bg-white rounded-lg shadow mt-32 mb-28 max-w-5xl mx-auto">
        <div class="flex-1 md:mb-0 md:mr-12">
            <h1 class="text-4xl md:text-5xl font-bold text-green-800 mb-4">Welcome to SmashZone!</h1>
            <p class="text-lg text-gray-700 mb-6">
                The best place to book badminton courts, share your experiences, and give feedback. Start your passion
                for badminton here!
            </p>
            <a href="Booking.php"
                class="inline-block bg-green-700 text-white px-6 py-3 rounded-full font-semibold shadow hover:bg-green-800 transition">
                Book Now
            </a>
        </div>
        <div class="w-full md:w-[384px] aspect-video rounded-lg shadow-lg overflow-hidden flex-shrink-0">
            <img src="home.jpg" alt="Badminton Court" class="w-full h-full object-cover" />
        </div>
    </section>
    <!-- /Home -->

    <!-- Facilities -->
    <section class="max-w-5xl mx-auto mt-12 mb-12 py-4">
        <h2 class="text-4xl font-bold text-green-800 mb-12 text-center">Our Facilities</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center">
                <img src="court.jpg" class="w-48 aspect-video mb-3 mt-2 rounded-lg object-cover" alt="Court" />
                <h3 class="font-bold text-xl text-green-700">Premium Courts</h3>
                <p class="text-gray-600 text-center">High-quality badminton courts with professional flooring.</p>
            </div>
            <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center">
                <img src="lockerroom.jpg" class="w-48 aspect-video mb-3 mt-2 rounded-lg object-cover"
                    alt="Locker Room" />
                <h3 class="font-bold text-xl text-green-700">Locker Rooms</h3>
                <p class="text-gray-600 text-center">Clean and secure locker rooms for your convenience.</p>
            </div>
            <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center">
                <img src="equipment.jpeg" class="w-48 aspect-video mb-3 mt-2 rounded-lg object-cover"
                    alt="Equipment Rental" />
                <h3 class="font-bold text-xl text-green-700">Equipment Rental</h3>
                <p class="text-gray-600 text-center">Racket and shuttlecock rental available for all players.</p>
            </div>
            <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center">
                <img src="cafe.jpg" class="w-48 aspect-video mb-3 mt-2 rounded-lg object-cover" alt="Cafe" />
                <h3 class="font-bold text-xl text-green-700">Cafe & Refreshments</h3>
                <p class="text-gray-600 text-center">Enjoy snacks and drinks at our cozy cafe after your game.</p>
            </div>
            <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center">
                <img src="wifi.avif" class="w-48 aspect-video mb-3 mt-2 rounded-lg object-cover" alt="Free WiFi" />
                <h3 class="font-bold text-xl text-green-700">Free WiFi</h3>
                <p class="text-gray-600 text-center">Stay connected with complimentary high-speed internet.</p>
            </div>
            <div class="bg-white rounded-lg shadow p-6 flex flex-col items-center">
                <img src="parking.jpg" class="w-48 aspect-video mb-3 mt-2 rounded-lg object-cover" alt="Parking" />
                <h3 class="font-bold text-xl text-green-700">Spacious Parking</h3>
                <p class="text-gray-600 text-center">Ample and secure parking space for all visitors.</p>
            </div>
        </div>
    </section>
    <!-- /Facilities -->

    <!-- Find Us -->
    <section class="max-w-5xl mx-auto mb-12 px-4 min-h-[70vh] flex flex-col justify-center py-10">
        <h2 class="text-4xl font-bold text-green-800 mb-12 text-center">Find Us</h2>
        <div class="flex flex-col md:flex-row gap-12 items-center">
            <div class="flex-1 rounded-lg overflow-hidden shadow-lg aspect-video min-h-[340px]">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3957.633059190508!2d112.65803017477114!3d-7.282524771571229!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fd2228064fc3%3A0xd1c829ec9b890a7b!2sGOR%20Glx%20Badminton!5e0!3m2!1sen!2sid!4v1748495558721!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                    width="100%" height="340" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
            <div class="flex-1 text-center md:text-left">
                <h3 class="text-3xl font-semibold text-green-700 mb-4">Our Address</h3>
                <p class="text-xl text-gray-700 leading-relaxed mb-6">
                    Jl. Raya Lontar No.51, Lontar, Kec. Sambikerep,<br> Kota SBY, Jawa Timur 60216 Surabaya,<br> Prop. Jawa Timur, Jawa Timur 60216
                </p>
                <p class="mt-4 text-gray-600 text-2xl">Open: 08.00 - 22.00 WIB</p>
            </div>
        </div>
    </section>
    <!-- /Find Us -->

    <!-- Footer -->
    <footer class="bg-green-800 text-white py-8 mt-16">
        <div class="max-w-full mx-auto flex flex-col md:flex-row items-center justify-between gap-6 px-6">
            <div class="text-lg font-semibold mb-4 md:mb-0">© 2025 SmashZone. All rights reserved.</div>
            <div class="flex gap-6 text-2xl">
                <a href="https://wa.me/yourwhatsapplink" target="_blank" aria-label="WhatsApp"
                    class="hover:text-green-400 transition">
                    <!-- WhatsApp Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                        class="bi bi-whatsapp" viewBox="0 0 16 16">
                        <path
                            d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232" />
                    </svg>
                </a>
                <a href="https://line.me/ti/p/yourlineid" target="_blank" aria-label="Line"
                    class="hover:text-green-300 transition">
                    <!-- Line Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                        class="bi bi-line" viewBox="0 0 16 16">
                        <path
                            d="M8 0c4.411 0 8 2.912 8 6.492 0 1.433-.555 2.723-1.715 3.994-1.678 1.932-5.431 4.285-6.285 4.645-.83.35-.734-.197-.696-.413l.003-.018.114-.685c.027-.204.055-.521-.026-.723-.09-.223-.444-.339-.704-.395C2.846 12.39 0 9.701 0 6.492 0 2.912 3.59 0 8 0M5.022 7.686H3.497V4.918a.156.156 0 0 0-.155-.156H2.78a.156.156 0 0 0-.156.156v3.486c0 .041.017.08.044.107v.001l.002.002.002.002a.15.15 0 0 0 .108.043h2.242c.086 0 .155-.07.155-.156v-.56a.156.156 0 0 0-.155-.157m.791-2.924a.156.156 0 0 0-.156.156v3.486c0 .086.07.155.156.155h.562c.086 0 .155-.07.155-.155V4.918a.156.156 0 0 0-.155-.156zm3.863 0a.156.156 0 0 0-.156.156v2.07L7.923 4.832l-.013-.015v-.001l-.01-.01-.003-.003-.011-.009h-.001L7.88 4.79l-.003-.002-.005-.003-.008-.005h-.002l-.003-.002-.01-.004-.004-.002-.01-.003h-.002l-.003-.001-.009-.002h-.006l-.003-.001h-.004l-.002-.001h-.574a.156.156 0 0 0-.156.155v3.486c0 .086.07.155.156.155h.56c.087 0 .157-.07.157-.155v-2.07l1.6 2.16a.2.2 0 0 0 .039.038l.001.001.01.006.004.002.008.004.007.003.005.002.01.003h.003a.2.2 0 0 0 .04.006h.56c.087 0 .157-.07.157-.155V4.918a.156.156 0 0 0-.156-.156zm3.815.717v-.56a.156.156 0 0 0-.155-.157h-2.242a.16.16 0 0 0-.108.044h-.001l-.001.002-.002.003a.16.16 0 0 0-.044.107v3.486c0 .041.017.08.044.107l.002.003.002.002a.16.16 0 0 0 .108.043h2.242c.086 0 .155-.07.155-.156v-.56a.156.156 0 0 0-.155-.157H11.81v-.589h1.525c.086 0 .155-.07.155-.156v-.56a.156.156 0 0 0-.155-.157H11.81v-.589h1.525c.086 0 .155-.07.155-.156Z" />
                    </svg>
                </a>
                <a href="https://instagram.com/yourinstagram" target="_blank" aria-label="Instagram"
                    class="hover:text-pink-400 transition">
                    <!-- Instagram Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                        class="bi bi-instagram" viewBox="0 0 16 16">
                        <path
                            d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.9 3.9 0 0 0-1.417.923A3.9 3.9 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.9 3.9 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.9 3.9 0 0 0-.923-1.417A3.9 3.9 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599s.453.546.598.92c.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.5 2.5 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.5 2.5 0 0 1-.92-.598 2.5 2.5 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233s.008-2.388.046-3.231c.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92s.546-.453.92-.598c.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92m-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217m0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334" />
                    </svg>
                </a>
                <a href="mailto:yourmail@gmail.com" aria-label="Gmail" class="hover:text-red-400 transition">
                    <!-- Gmail Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                        class="bi bi-envelope" viewBox="0 0 16 16">
                        <path
                            d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z" />
                    </svg>
                </a>
            </div>
        </div>
    </footer>
    <!-- /Footer -->

</body>

</html>