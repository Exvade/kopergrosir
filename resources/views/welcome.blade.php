@extends('layouts.app')

@section('content')
    <section id="home" class="relative overflow-hidden bg-gray-50 pt-16 pb-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div>
                    <span
                        class="inline-block px-4 py-1.5 rounded-full bg-white border border-gray-200 text-xs font-bold tracking-widest text-gray-400 uppercase mb-6">
                        Official Distributor
                    </span>
                    <h1 class="text-4xl md:text-6xl font-bold text-slate-900 leading-tight mb-6">
                        Solusi Perjalanan & <br>
                        <span class="text-gray-400 font-light italic">Ibadah Terpercaya.</span>
                    </h1>
                    <p class="text-lg text-gray-500 mb-10 max-w-lg leading-relaxed">
                        Kami menyediakan berbagai perlengkapan travel mulai dari koper premium hingga paket lengkap Haji &
                        Umroh dengan standar kualitas distributor.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="#katalog"
                            class="px-8 py-4 bg-slate-900 text-white rounded-xl font-bold hover:bg-slate-800 transition shadow-lg shadow-slate-200 text-center">
                            Lihat Katalog
                        </a>
                        <a href="#paket"
                            class="px-8 py-4 bg-white text-slate-900 border border-gray-200 rounded-xl font-bold hover:bg-gray-50 transition text-center">
                            Paket Bundling
                        </a>
                    </div>
                </div>
                <div class="relative">
                    <div class="absolute -z-10 top-0 right-0 w-72 h-72 bg-gray-200 rounded-full blur-3xl opacity-50"></div>
                    <img src="https://images.unsplash.com/photo-1565026057447-bc90a3dceb87?q=80&w=1000&auto=format&fit=crop"
                        alt="Main Showcase"
                        class="rounded-3xl shadow-2xl grayscale-20 hover:grayscale-0 transition duration-700 object-cover h-125 w-full">
                </div>
            </div>
        </div>
    </section>

    <section id="about" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center mb-20">
                <div class="relative">
                    <div class="aspect-4/5 rounded-3xl overflow-hidden shadow-2xl shadow-gray-200">
                        <img src="https://images.unsplash.com/photo-1553413077-190dd305871c?q=80&w=735&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            alt="Gudang Distributor" class="w-full h-full object-cover grayscale-30%">
                    </div>
                    <div
                        class="absolute -bottom-6 -right-6 bg-slate-900 text-white p-8 rounded-2xl shadow-xl hidden md:block">
                        <div class="text-3xl font-bold mb-1">10+</div>
                        <div class="text-xs text-gray-400 uppercase tracking-widest font-semibold">Tahun Pengalaman</div>
                    </div>
                </div>

                <div>
                    <h2 class="text-3xl font-bold text-slate-900 mb-6 leading-tight">
                        Distributor Utama <br>
                        <span class="text-gray-400 font-light italic">Travel & Pilgrimage Kit.</span>
                    </h2>
                    <p class="text-gray-500 leading-relaxed mb-8">
                        KoperGrosir hadir sebagai mitra strategis bagi biro perjalanan Haji & Umroh serta toko retail
                        perlengkapan travel. Kami berdedikasi untuk memberikan produk terbaik dengan proses pengadaan yang
                        transparan dan profesional.
                    </p>
                    <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-2xl border border-gray-100">
                        <div
                            class="shrink-0 w-12 h-12 bg-white rounded-xl shadow-sm flex items-center justify-center text-slate-700">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-bold text-slate-900 text-sm">Jangkauan se-Indonesia</h4>
                            <p class="text-xs text-gray-500">Kami menerima pesanan untuk seluruh wilayah di Indonesia.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 pt-12 border-t border-gray-100">
                <div class="flex items-start gap-5">
                    <div
                        class="shrink-0 w-14 h-14 bg-gray-50 rounded-full flex items-center justify-center border border-gray-200">
                        <svg class="w-7 h-7 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-900 mb-2">Kualitas Premium</h4>
                        <p class="text-sm text-gray-500 leading-relaxed">Hasil pengerjaan yang berkualitas, rapi, dan pasti
                            sesuai dengan permintaan.</p>
                    </div>
                </div>

                <div class="flex items-start gap-5">
                    <div
                        class="shrink-0 w-14 h-14 bg-gray-50 rounded-full flex items-center justify-center border border-gray-200">
                        <svg class="w-7 h-7 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 011-1h1a2 2 0 100-4H7a1 1 0 01-1-1V7a1 1 0 011-1h3a1 1 0 001-1V4z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-900 mb-2">Custom Desain</h4>
                        <p class="text-sm text-gray-500 leading-relaxed">Bebas pilih desain, jenis kain, ukuran, dan detail
                            lain yang diinginkan.</p>
                    </div>
                </div>

                <div class="flex items-start gap-5">
                    <div
                        class="shrink-0 w-14 h-14 bg-gray-50 rounded-full flex items-center justify-center border border-gray-200">
                        <svg class="w-7 h-7 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-900 mb-2">Harga Bersaing</h4>
                        <p class="text-sm text-gray-500 leading-relaxed">Penawaran harga yang lebih terjangkau dan ramah di
                            kantong.</p>
                    </div>
                </div>

                <div class="flex items-start gap-5">
                    <div
                        class="shrink-0 w-14 h-14 bg-gray-50 rounded-full flex items-center justify-center border border-gray-200">
                        <svg class="w-7 h-7 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-900 mb-2">Minimal Pesanan</h4>
                        <p class="text-sm text-gray-500 leading-relaxed">Terima pesanan dengan kuantitas sesuai kebutuhan
                            customer.</p>
                    </div>
                </div>

                <div class="flex items-start gap-5">
                    <div
                        class="shrink-0 w-14 h-14 bg-gray-50 rounded-full flex items-center justify-center border border-gray-200">
                        <svg class="w-7 h-7 text-slate-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-900 mb-2">Double QC</h4>
                        <p class="text-sm text-gray-500 leading-relaxed">Pemeriksaan ulang sebelum produk dikirim, menjamin
                            kualitas terbaik.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="katalog" class="py-24 bg-white" x-data="{ activeCategory: 'all' }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-slate-900 mb-4">Katalog Produk</h2>
                <div class="w-12 h-1 bg-gray-200 mx-auto rounded-full"></div>
            </div>

            <div class="flex flex-wrap justify-center gap-2 mb-12">
                <button @click="activeCategory = 'all'"
                    :class="activeCategory === 'all' ? 'bg-slate-900 text-white shadow-md' :
                        'bg-gray-50 text-gray-400 border border-gray-100 hover:bg-gray-100'"
                    class="px-6 py-2.5 rounded-full text-sm font-semibold transition-all duration-300">
                    Semua
                </button>
                @foreach ($categories as $cat)
                    <button @click="activeCategory = '{{ $cat->slug }}'"
                        :class="activeCategory === '{{ $cat->slug }}' ? 'bg-slate-900 text-white shadow-md' :
                            'bg-gray-50 text-gray-400 border border-gray-100 hover:bg-gray-100'"
                        class="px-6 py-2.5 rounded-full text-sm font-semibold transition-all duration-300">
                        {{ $cat->name }}
                    </button>
                @endforeach
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-8">
                @foreach ($products as $product)
                    <div x-show="activeCategory === 'all' || activeCategory === '{{ $product->category->slug ?? '' }}'"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 transform scale-95"
                        x-transition:enter-end="opacity-100 transform scale-100"
                        class="group bg-white rounded-2xl border border-gray-100 overflow-hidden hover:border-gray-200 hover:shadow-xl hover:shadow-gray-200/40 transition-all duration-500">

                        <div class="aspect-square bg-gray-50 overflow-hidden relative">
                            <img src="{{ asset('storage/' . $product->image) }}"
                                alt="Jual {{ $product->name }} - Distributor KoperGrosir"
                                class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                            @if (!$product->is_package && $product->size)
                                <span
                                    class="absolute top-3 left-3 bg-white/90 backdrop-blur-sm px-2 py-1 rounded text-[10px] font-bold text-slate-700 shadow-sm uppercase tracking-tighter">
                                    {{ $product->size }}
                                </span>
                            @endif
                        </div>

                        <div class="p-4 md:p-6 text-center md:text-left">
                            <p class="text-[10px] text-gray-400 font-bold uppercase tracking-widest mb-1">
                                {{ $product->category->name ?? 'Produk' }}</p>
                            <h4 class="text-sm md:text-base font-bold text-slate-800 mb-3 line-clamp-1">
                                {{ $product->name }}
                            </h4>
                            <div class="flex flex-col md:flex-row md:items-center justify-between gap-3">
                                <span
                                    class="text-sm font-bold text-slate-900">Rp{{ number_format($product->price, 0, ',', '.') }}</span>
                                <a href="https://wa.me/{{ $waNumber->value ?? '' }}?text={{ urlencode($waMessage->value . ' ' . $product->name) }}"
                                    target="_blank"
                                    class="inline-flex items-center justify-center p-2 rounded-lg bg-gray-50 text-slate-800 hover:bg-slate-900 hover:text-white transition group-all duration-300">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                                        </path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>



    <section class="py-24 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-slate-900 mb-4">Langkah Mudah Pemesanan</h2>
                <div class="w-12 h-1 bg-gray-200 mx-auto rounded-full"></div>
                <p class="text-gray-500 mt-4 text-sm md:text-base">Proses pemesanan yang transparan dan mudah untuk
                    kebutuhan instansi atau retail Anda.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div
                    class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 flex flex-col items-center text-center group hover:shadow-md transition-all duration-300">
                    <div
                        class="w-16 h-16 bg-slate-900 rounded-2xl flex items-center justify-center text-white mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z">
                            </path>
                        </svg>
                    </div>
                    <h4 class="text-lg font-bold text-slate-900 mb-3">Konsultasi</h4>
                    <p class="text-sm text-gray-500 leading-relaxed">Hubungi Admin KoperGrosir untuk
                        konsultasi mengenai segala kebutuhan Anda.</p>
                </div>

                <div
                    class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 flex flex-col items-center text-center group hover:shadow-md transition-all duration-300">
                    <div
                        class="w-16 h-16 bg-slate-900 rounded-2xl flex items-center justify-center text-white mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                    </div>
                    <h4 class="text-lg font-bold text-slate-900 mb-3">Pilih Paket</h4>
                    <p class="text-sm text-gray-500 leading-relaxed">Pilih paket layanan keperluan haji dan umroh serta
                        jenis koper yang sesuai dengan kebutuhan Anda.</p>
                </div>

                <div
                    class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 flex flex-col items-center text-center group hover:shadow-md transition-all duration-300">
                    <div
                        class="w-16 h-16 bg-slate-900 rounded-2xl flex items-center justify-center text-white mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" viewBox="0 0 32 32">
                            <path stroke-linecap="round" stroke-linejoin="round" fill="currentColor" stroke-width="2"
                                d="M2 9.5A4.5 4.5 0 0 1 6.5 5h19A4.5 4.5 0 0 1 30 9.5v13a4.5 4.5 0 0 1-4.5 4.5h-19A4.5 4.5 0 0 1 2 22.5zM6.5 7A2.5 2.5 0 0 0 4 9.5V11h24V9.5A2.5 2.5 0 0 0 25.5 7zM4 22.5A2.5 2.5 0 0 0 6.5 25h19a2.5 2.5 0 0 0 2.5-2.5V13H4zM21 19h3a1 1 0 1 1 0 2h-3a1 1 0 1 1 0-2" />
                        </svg>
                    </div>
                    <h4 class="text-lg font-bold text-slate-900 mb-3">Pembayaran</h4>
                    <p class="text-sm text-gray-500 leading-relaxed">Lakukan pembayaran sesuai dengan paket yang telah
                        dipilih melalui metode pembayaran yang tersedia.</p>
                </div>

                <div
                    class="bg-white p-8 rounded-3xl shadow-sm border border-gray-100 flex flex-col items-center text-center group hover:shadow-md transition-all duration-300">
                    <div
                        class="w-16 h-16 bg-slate-900 rounded-2xl flex items-center justify-center text-white mb-6 group-hover:scale-110 transition-transform duration-300">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0">
                            </path>
                        </svg>
                    </div>
                    <h4 class="text-lg font-bold text-slate-900 mb-3">Pengiriman</h4>
                    <p class="text-sm text-gray-500 leading-relaxed">Terima konfirmasi pesanan dan kami akan kirimkan
                        jadwal pengiriman koper serta keperluan haji dan umroh Anda.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-12 bg-gray-50">
        <div class="max-w-5xl mx-auto px-4">
            <div class="bg-slate-900 rounded-[2.5rem] p-12 text-center relative overflow-hidden">
                <div class="absolute top-0 left-0 w-32 h-32 bg-white/5 rounded-full -translate-x-1/2 -translate-y-1/2">
                </div>

                <h2 class="text-2xl md:text-4xl font-bold text-white mb-6">Siap Bekerja Sama dengan Kami?</h2>
                <p class="text-gray-400 mb-10 max-w-lg mx-auto">Dapatkan penawaran harga grosir terbaik untuk kebutuhan
                    Travel Haji & Umroh atau toko retail Anda.</p>

                <a href="https://wa.me/{{ $waNumber->value ?? '' }}?text={{ urlencode('Halo, saya tertarik untuk menjadi mitra distributor KoperGrosir.') }}"
                    target="_blank"
                    class="inline-block px-10 py-4 bg-white text-slate-900 font-bold rounded-full hover:bg-gray-200 transition-all shadow-xl active:scale-95">
                    Mulai Kemitraan
                </a>
            </div>
        </div>
    </section>

    <section id="paket" class="py-24 bg-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-4">
                <div class="max-w-xl">
                    <h2 class="text-3xl font-bold text-slate-900 mb-4">Paket Hemat Distributor</h2>
                    <p class="text-gray-500">Pilihan paket lengkap untuk kebutuhan Haji, Umroh, atau perjalanan bisnis
                        dengan harga yang lebih kompetitif.</p>
                </div>
                <div class="hidden md:block h-px flex-1 bg-gray-200 mx-8 mb-4"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($packages as $package)
                    <div
                        class="bg-white rounded-3xl overflow-hidden border border-gray-200 shadow-sm hover:shadow-xl transition-all duration-500 group">
                        <div class="relative h-64 overflow-hidden">
                            <img src="{{ asset('storage/' . $package->image) }}" alt="{{ $package->name }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                            <div class="absolute top-4 right-4">
                                <span
                                    class="bg-slate-900 text-white text-[10px] font-bold px-3 py-1 rounded-full uppercase tracking-widest">
                                    Best Value
                                </span>
                            </div>
                        </div>

                        <div class="p-8">
                            <h3 class="text-xl font-bold text-slate-900 mb-2">{{ $package->name }}</h3>
                            <div class="text-2xl font-black text-slate-900 mb-6">
                                Rp{{ number_format($package->price, 0, ',', '.') }}
                            </div>

                            <div class="space-y-3 mb-8">
                                <p class="text-xs font-bold text-gray-400 uppercase tracking-tight">Isi Paket:</p>
                                @php $items = explode(',', $package->package_items); @endphp
                                @foreach ($items as $item)
                                    <div class="flex items-start text-sm text-gray-600">
                                        <svg class="w-5 h-5 text-green-500 mr-2 shrink-0" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        {{ trim($item) }}
                                    </div>
                                @endforeach
                            </div>

                            <a href="https://wa.me/{{ $waNumber->value ?? '' }}?text={{ urlencode($waMessage->value . ' Saya tertarik dengan ' . $package->name) }}"
                                target="_blank"
                                class="block w-full text-center py-4 bg-gray-50 border border-gray-200 text-slate-900 font-bold rounded-2xl hover:bg-slate-900 hover:text-white transition-all duration-300">
                                Pesan Paket Ini
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
