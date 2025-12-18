<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="KoperGrosir - Distributor resmi koper premium, perlengkapan Haji & Umroh, serta aksesoris travel terlengkap dengan harga grosir terbaik.">
    <meta name="keywords"
        content="distributor koper, grosir koper murah, perlengkapan haji umroh, paket koper umroh, kain ihram grosir, mukena travel">
    <meta name="author" content="KoperGrosir">

    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:title" content="KoperGrosir | Distributor Perlengkapan Travel & Ibadah">
    <meta property="og:description"
        content="Pusat grosir koper dan perlengkapan travel. Melayani pengadaan partai besar untuk biro perjalanan dan retail.">
    <meta property="og:image" content="{{ asset('path-to-your-logo-or-hero-image.jpg') }}">

    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:title" content="KoperGrosir | Distributor Perlengkapan Travel & Ibadah">
    <title>Distributor Perlengkapan Travel & Ibadah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700&display=swap"
        rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        .soft-shadow {
            shadow-sm shadow-gray-200/50;
        }

        html {
            scroll-behavior: smooth;
        }

        section[id] {
            scroll-margin-top: 80px;
            /* Sesuaikan dengan tinggi navbar Anda (h-20 = 80px) */
        }
    </style>
</head>

<body class="bg-gray-50 text-slate-800">

    <nav class="bg-white/80 backdrop-blur-md sticky top-0 z-50 border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center">
                <div class="font-bold text-2xl tracking-tighter text-slate-900">
                    KOPER<span class="text-gray-400">GROSIR.</span>
                </div>
                <div class="hidden md:flex space-x-8 text-sm font-medium">
                    <a href="#home" class="hover:text-gray-400 transition">Home</a>
                    <a href="#katalog" class="hover:text-gray-400 transition">Katalog</a>
                    <a href="#paket" class="hover:text-gray-400 transition">Paket Bundling</a>
                    <a href="#about" class="hover:text-gray-400 transition">Tentang Kami</a>
                </div>
                <a href="https://wa.me/{{ $waNumber->value ?? '' }}"
                    class="bg-slate-800 text-white px-6 py-2.5 rounded-full text-sm font-semibold hover:bg-slate-700 transition">
                    Hubungi Kami
                </a>
            </div>
        </div>
    </nav>

    @yield('content')

    <footer class="bg-white border-t border-gray-100 py-12">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p class="text-gray-400 text-sm">&copy; 2025 KoperGrosir Distributor. All rights reserved.</p>
        </div>
    </footer>

</body>

</html>
