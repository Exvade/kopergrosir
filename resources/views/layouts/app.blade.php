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
    <script defer src="https://unpkg.com/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
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

        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</head>

<body class="bg-gray-50 text-slate-800">

    <nav class="bg-white/80 backdrop-blur-md sticky top-0 z-50 border-b border-gray-100" x-data="{ open: false }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20 items-center relative z-50">
                <div class="flex items-center">
                    <a href="#home" class="flex items-center gap-2">
                        <img src="{{ asset('logo.png') }}" alt="KoperGrosir Logo"
                            class="h-10 md:h-12 w-auto object-contain">
                        <div class="hidden sm:block font-bold text-xl tracking-tighter text-slate-900">
                            KOPER<span class="text-gray-400">GROSIR.</span>
                        </div>
                    </a>
                </div>

                <div class="hidden md:flex space-x-8 text-sm font-medium">
                    <a href="#home" class="hover:text-gray-400 transition">Home</a>
                    <a href="#about" class="hover:text-gray-400 transition">Tentang Kami</a>
                    <a href="#paket" class="hover:text-gray-400 transition">Paket Bundling</a>
                    <a href="#katalog" class="hover:text-gray-400 transition">Katalog</a>
                    <a href="#testimoni" class="hover:text-gray-400 transition">Testimoni</a>
                </div>

                <div class="flex items-center gap-4">
                    <a href="https://wa.me/{{ $waNumber->value ?? '' }}" target="_blank"
                        class="hidden sm:block bg-slate-800 text-white px-6 py-2.5 rounded-full text-sm font-semibold hover:bg-slate-700 transition">
                        Hubungi Kami
                    </a>

                    <button @click="open = !open" class="md:hidden p-2 text-slate-600 focus:outline-none relative z-50">
                        <svg class="w-6 h-6 transition-transform duration-300"
                            :class="open ? 'rotate-90 scale-0' : 'rotate-0 scale-100'" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16m-7 6h7"></path>
                        </svg>
                        <svg class="w-6 h-6 absolute top-2 left-2 transition-transform duration-300"
                            :class="open ? 'rotate-0 scale-100' : '-rotate-90 scale-0'" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" x-cloak>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <div x-show="open" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 -translate-y-10" x-transition:enter-end="opacity-100 translate-y-0"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 translate-y-0"
            x-transition:leave-end="opacity-0 -translate-y-10"
            class="absolute top-full left-0 w-full bg-white border-b border-gray-100 z-40 md:hidden shadow-2xl overflow-hidden"
            @click.away="open = false" x-cloak>
            <div class="px-6 py-8 space-y-4">
                <a href="#home" @click="open = false"
                    class="block text-xl font-bold text-slate-900 hover:text-gray-400 transition">Home</a>
                <a href="#about" @click="open = false"
                    class="block text-xl font-bold text-slate-900 hover:text-gray-400 transition">Tentang Kami</a>
                <a href="#paket" @click="open = false"
                    class="block text-xl font-bold text-slate-900 hover:text-gray-400 transition">Paket Bundling</a>
                <a href="#katalog" @click="open = false"
                    class="block text-xl font-bold text-slate-900 hover:text-gray-400 transition">Katalog</a>

                <div class="pt-6 border-t border-gray-100">
                    <a href="https://wa.me/{{ $waNumber->value ?? '' }}" target="_blank"
                        class="flex items-center justify-center w-full bg-slate-900 text-white px-6 py-4 rounded-2xl font-bold shadow-lg shadow-gray-200">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
                        </svg>
                        Hubungi WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </nav>

    @yield('content')

    <footer class="bg-white border-t border-gray-100 pt-16 pb-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-16">

                <div class="flex flex-col items-start space-y-4">
                    <div
                        class="w-20 h-20 md:w-24 md:h-24 bg-gray-50 rounded-2xl overflow-hidden border border-gray-100 flex items-center justify-center p-2 shadow-sm transition-transform hover:scale-105 duration-300">
                        <img src="{{ asset('logo.png') }}" alt="KoperGrosir Logo"
                            class="w-full h-full object-contain">
                    </div>
                    <div class="font-bold text-xl tracking-tighter text-slate-900">
                        KOPER<span class="text-gray-400">GROSIR.</span>
                    </div>
                    <p class="text-gray-500 text-xs leading-relaxed max-w-[200px]">
                        Pusat distribusi perlengkapan travel, Haji, dan Umroh terpercaya.
                    </p>
                </div>

                <div>
                    <h4 class="font-bold text-slate-900 mb-6 uppercase text-[10px] tracking-[0.2em]">Navigasi</h4>
                    <ul class="space-y-3">
                        <li><a href="#home"
                                class="text-sm text-gray-500 hover:text-slate-900 transition">Beranda</a></li>
                        <li><a href="#about" class="text-sm text-gray-500 hover:text-slate-900 transition">Tentang
                                Kami</a></li>
                        <li><a href="#paket" class="text-sm text-gray-500 hover:text-slate-900 transition">Paket
                                Bundling</a></li>
                        <li><a href="#katalog" class="text-sm text-gray-500 hover:text-slate-900 transition">Katalog
                                Produk</a></li>
                        <li><a href="#testimoni"
                                class="text-sm text-gray-500 hover:text-slate-900 transition">Testimoni</a></li>

                    </ul>
                </div>

                <div>
                    <h4 class="font-bold text-slate-900 mb-6 uppercase text-[10px] tracking-[0.2em]">Koleksi Utama</h4>
                    <ul class="space-y-3">
                        @foreach ($categories as $cat)
                            <li><a href="#katalog"
                                    class="text-sm text-gray-500 hover:text-slate-900 transition">{{ $cat->name }}</a>
                            </li>
                        @endforeach
                        <li><a href="#paket"
                                class="text-sm font-bold text-slate-900 underline decoration-slate-200 underline-offset-4">Paket
                                Distributor</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="font-bold text-slate-900 mb-6 uppercase text-[10px] tracking-[0.2em]">Hubungi Kami</h4>
                    <div class="space-y-4">
                        <div class="flex items-start gap-3">
                            <svg class="w-4 h-4 text-slate-400 mt-1 shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z">
                                </path>
                            </svg>
                            <span class="text-sm text-gray-500 leading-relaxed">

                                Jl. Anggrek Rosliana VII No.2, RT.13/RW.6, Palmerah, Kec. Palmerah, Kota Jakarta Barat,

                                Daerah Khusus Ibukota Jakarta 11480

                            </span>
                        </div>
                        <div class="flex items-center gap-3">
                            <svg class="w-4 h-4 text-slate-400 shrink-0" fill="none" stroke="currentColor"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z">
                                </path>
                            </svg>
                            <span class="text-xs text-gray-500">+{{ $waNumber->value ?? '' }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="pt-8 border-t border-gray-100 flex flex-col md:flex-row justify-between items-center gap-6">
                <p class="text-gray-400 text-[10px] font-bold uppercase tracking-widest">
                    &copy; 2025 DANOVADIGITAL. All rights reserved.
                </p>
                <div class="flex space-x-5">
                    <a href="https://www.instagram.com/akmjakarta.id/" target="_blank"
                        class="text-slate-400 hover:text-slate-900 transition"><svg class="w-5 h-5"
                            fill="currentColor" viewBox="0 0 24 24">
                            <path
                                d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                        </svg></a>
                </div>
            </div>
        </div>
    </footer>


    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://unpkg.com/@alpinejs/intersect@3.x.x/dist/cdn.min.js" defer></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init({
                duration: 800, // Kecepatan animasi (ms)
                once: true, // Animasi hanya jalan sekali saat scroll ke bawah
                easing: 'ease-out-quad'
            });
        });
    </script>
</body>

</html>
