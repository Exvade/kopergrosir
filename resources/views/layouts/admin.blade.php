<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Koper Showcase</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        /* x-cloak mencegah elemen Alpine muncul sebelum script siap */
        [x-cloak] {
            display: none !important;
        }

        /* Menghilangkan scrollbar pada sidebar jika menu terlalu banyak */
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</head>

<body class="bg-gray-50 text-gray-800" x-data="{ sidebarOpen: false }" x-init="sidebarOpen = (window.innerWidth >= 1024)">

    <div class="flex h-screen overflow-hidden">

        <div x-show="sidebarOpen" x-cloak @click="sidebarOpen = false"
            class="fixed inset-0 z-20 bg-black bg-opacity-50 lg:hidden transition-opacity">
        </div>

        <aside x-cloak :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
            class="fixed inset-y-0 left-0 z-30 w-64 bg-slate-900 text-white shrink-0 flex flex-col transition-transform duration-300 transform lg:translate-x-0 lg:static lg:inset-0 shadow-xl lg:shadow-none">

            <div class="p-6 text-center border-b border-slate-800 flex items-center justify-between">
                <h1 class="text-xl font-bold tracking-wider uppercase text-blue-400 mx-auto">Koper Admin</h1>
                <button @click="sidebarOpen = false" class="lg:hidden text-gray-400 hover:text-white">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                        </path>
                    </svg>
                </button>
            </div>

            <nav class="flex-1 mt-6 px-4 space-y-2 overflow-y-auto no-scrollbar">
                @php
                    // Ambil data menggunakan key 'wa_number' sesuai Controller Anda
                    $checkWa = \App\Models\Setting::where('key', 'wa_number')->first();
                @endphp

                @if (!$checkWa || empty($checkWa->value))
                    <div class="bg-amber-50 border-l-4 border-amber-400 p-4 mb-6 rounded-r-xl shadow-sm">
                        <div class="flex items-center">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-amber-400" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm text-amber-700 font-bold">Konfigurasi Belum Lengkap!</p>
                                <p class="text-xs text-amber-600">
                                    Nomor WhatsApp belum diisi di database.
                                    <a href="{{ route('admin.settings.index') }}"
                                        class="underline font-bold hover:text-amber-800">Atur Sekarang</a>
                                </p>
                            </div>
                        </div>
                    </div>
                @endif
                <a href="/admin/dashboard"
                    class="flex items-center p-3 {{ request()->is('admin/dashboard') ? 'bg-blue-600 text-white shadow-lg shadow-blue-900/50' : 'text-gray-300 hover:bg-slate-800' }} rounded-lg transition-all group">
                    <svg class="w-5 h-5 mr-3 {{ request()->is('admin/dashboard') ? 'text-white' : 'text-gray-400 group-hover:text-blue-400' }}"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                        </path>
                    </svg>
                    Dashboard
                </a>
                <a href="{{ route('banners.index') }}"
                    class="flex items-center p-3 text-gray-300 hover:bg-slate-800 rounded-lg">
                    <svg class="w-5 h-5 mr-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                    </svg>
                    Banner Promo
                </a>
                <a href="{{ route('admin.packages.index') }}"
                    class="flex items-center p-3 {{ request()->is('admin/packages*') ? 'bg-blue-600 text-white shadow-lg shadow-blue-900/50' : 'text-gray-300 hover:bg-slate-800' }} rounded-lg transition-all group">
                    <svg class="w-5 h-5 mr-3 {{ request()->is('admin/packages*') ? 'text-white' : 'text-gray-400 group-hover:text-blue-400' }}"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                    </svg>
                    Paket Bundling
                </a>
                <a href="{{ route('categories.index') }}"
                    class="flex items-center p-3 {{ request()->is('admin/categories*') ? 'bg-blue-600 text-white shadow-lg shadow-blue-900/50' : 'text-gray-300 hover:bg-slate-800' }} rounded-lg transition-all group">
                    <svg class="w-5 h-5 mr-3 {{ request()->is('admin/categories*') ? 'text-white' : 'text-gray-400 group-hover:text-blue-400' }}"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z">
                        </path>
                    </svg>
                    Kategori Produk
                </a>

                <a href="/admin/products"
                    class="flex items-center p-3 {{ request()->is('admin/products*') ? 'bg-blue-600 text-white shadow-lg shadow-blue-900/50' : 'text-gray-300 hover:bg-slate-800' }} rounded-lg transition-all group">
                    <svg class="w-5 h-5 mr-3 {{ request()->is('admin/products*') ? 'text-white' : 'text-gray-400 group-hover:text-blue-400' }}"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                    </svg>
                    Daftar Produk
                </a>

                <a href="/admin/settings"
                    class="flex items-center p-3 {{ request()->is('admin/settings') ? 'bg-blue-600 text-white shadow-lg shadow-blue-900/50' : 'text-gray-300 hover:bg-slate-800' }} rounded-lg transition-all group">
                    <svg class="w-5 h-5 mr-3 {{ request()->is('admin/settings') ? 'text-white' : 'text-gray-400 group-hover:text-blue-400' }}"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z">
                        </path>
                    </svg>
                    Settings
                </a>
            </nav>

            <div class="p-4 border-t border-slate-800 bg-slate-900/50">
                <div class="flex items-center mb-4 px-2 overflow-hidden">
                    <div
                        class="w-8 h-8 shrink-0 rounded-full bg-blue-500 flex items-center justify-center text-sm font-bold shadow-inner">
                        {{ substr(Auth::user()->name, 0, 1) }}
                    </div>
                    <span class="ml-3 text-sm font-medium text-gray-300 truncate">{{ Auth::user()->name }}</span>
                </div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="w-full flex items-center p-3 text-red-400 hover:bg-red-900/30 rounded-lg transition-colors group">
                        <svg class="w-5 h-5 mr-3 group-hover:scale-110 transition-transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                            </path>
                        </svg>
                        Logout
                    </button>
                </form>
            </div>
        </aside>

        <div class="flex-1 flex flex-col min-w-0 bg-white">

            <header class="bg-white shadow-sm border-b p-4 flex justify-between items-center sticky top-0 z-10">
                <div class="flex items-center">
                    <button @click="sidebarOpen = true"
                        class="p-2 mr-4 text-gray-600 lg:hidden focus:outline-none hover:bg-gray-100 rounded-lg transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                    <h2 class="text-lg font-semibold text-gray-700 truncate">@yield('title', 'Dashboard')</h2>
                </div>
                <div class="text-sm text-gray-500 hidden sm:block font-medium">
                    <span class="bg-gray-100 px-3 py-1 rounded-full">{{ date('D, d M Y') }}</span>
                </div>
            </header>

            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-50 p-4 md:p-8">

                @if (session('success'))
                    <script>
                        document.addEventListener('DOMContentLoaded', function() {
                            const Toast = Swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                            });

                            Toast.fire({
                                icon: 'success',
                                title: "{{ session('success') }}"
                            });
                        });
                    </script>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

</body>

</html>
