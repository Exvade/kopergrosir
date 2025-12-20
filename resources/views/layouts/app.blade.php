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
                    <a href="#about" class="hover:text-gray-400 transition">Tentang Kami</a>
                    <a href="#katalog" class="hover:text-gray-400 transition">Katalog</a>
                    <a href="#paket" class="hover:text-gray-400 transition">Paket Bundling</a>
                </div>
                <a href="https://wa.me/{{ $waNumber->value ?? '' }}" target="_blank"
                    class="bg-slate-800 text-white px-6 py-2.5 rounded-full text-sm font-semibold hover:bg-slate-700 transition">
                    Hubungi Kami
                </a>
            </div>
        </div>
    </nav>

    @yield('content')

    <footer class="bg-white border-t border-gray-100 pt-20 pb-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-16">

                <div class="space-y-6">
                    <div class="font-bold text-2xl tracking-tighter text-slate-900">
                        KOPER<span class="text-gray-400">GROSIR.</span>
                    </div>
                    <p class="text-gray-500 text-sm leading-relaxed">
                        Pusat distribusi perlengkapan travel, Haji, dan Umroh terpercaya di Indonesia. Kami menyediakan
                        produk berkualitas tinggi dengan harga grosir untuk mitra bisnis dan retail.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#"
                            class="w-10 h-10 bg-gray-50 rounded-full flex items-center justify-center text-slate-400 hover:bg-slate-900 hover:text-white transition shadow-sm">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                            </svg>
                        </a>
                        <a href="#"
                            class="w-10 h-10 bg-gray-50 rounded-full flex items-center justify-center text-slate-400 hover:bg-slate-900 hover:text-white transition shadow-sm">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                            </svg>
                        </a>
                    </div>
                </div>

                <div>
                    <h4 class="font-bold text-slate-900 mb-6 uppercase text-xs tracking-widest">Informasi</h4>
                    <ul class="space-y-4">
                        <li><a href="#home" class="text-sm text-gray-500 hover:text-slate-900 transition">Beranda</a>
                        </li>
                        <li><a href="#about" class="text-sm text-gray-500 hover:text-slate-900 transition">Tentang
                                Kami</a></li>
                        <li><a href="#katalog" class="text-sm text-gray-500 hover:text-slate-900 transition">Katalog
                                Produk</a></li>
                        <li><a href="#paket" class="text-sm text-gray-500 hover:text-slate-900 transition">Paket
                                Bundling</a></li>
                        <li><a href="#" class="text-sm text-gray-500 hover:text-slate-900 transition">Syarat &
                                Ketentuan</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold text-slate-900 mb-6 uppercase text-xs tracking-widest">Koleksi Kami</h4>
                    <ul class="space-y-4">
                        @foreach ($categories as $cat)
                            <li><a href="#katalog"
                                    class="text-sm text-gray-500 hover:text-slate-900 transition">{{ $cat->name }}</a>
                            </li>
                        @endforeach
                        <li><a href="#paket"
                                class="text-sm text-gray-500 hover:text-slate-900 transition font-semibold text-slate-900 underline decoration-gray-200 underline-offset-4">Paket
                                Distributor</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold text-slate-900 mb-6 uppercase text-xs tracking-widest">Hubungi Kami</h4>
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <svg class="w-5 h-5 text-slate-400 mr-3 mt-0.5 shrink-0" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                </path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span class="text-sm text-gray-500 leading-relaxed">
                                Jl. Anggrek Rosliana VII No.2, RT.13/RW.6, Palmerah, Kec. Palmerah, Kota Jakarta Barat,
                                Daerah Khusus Ibukota Jakarta 11480
                            </span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-slate-400 mr-3" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                </path>
                            </svg>
                            <span class="text-sm text-gray-500">+62 {{ $waNumber->value ?? '8xx xxxx xxxx' }}</span>
                        </li>
                        <li class="flex items-center">
                            <svg class="w-5 h-5 text-slate-400 mr-3" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                            <span class="text-sm text-gray-500 italic">halo@kopergrosir.com</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="pt-8 border-t border-gray-100 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-gray-400 text-[10px] font-bold uppercase tracking-widest">
                    &copy; 2025 KoperGrosir. All rights reserved.
                </p>

            </div>
        </div>
    </footer>

</body>

</html>
