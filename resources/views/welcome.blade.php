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
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div class="relative">
                    <div class="aspect-4/5 rounded-3xl overflow-hidden shadow-2xl shadow-gray-200">
                        <img src="https://images.unsplash.com/photo-1553413077-190dd305871c?q=80&w=735&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                            alt="Gudang Distributor" class="w-full h-full object-cover grayscale-30">
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
                        Kami hadir sebagai mitra strategis bagi biro perjalanan Haji & Umroh serta toko retail perlengkapan
                        travel. Dengan standar kontrol kualitas yang ketat, kami memastikan setiap koper, mukena, hingga
                        aksesoris kecil yang sampai ke tangan Anda adalah yang terbaik.
                    </p>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div class="p-4 bg-gray-50 rounded-2xl border border-gray-100">
                            <div
                                class="w-10 h-10 bg-white shadow-sm rounded-lg flex items-center justify-center mb-3 text-slate-700">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h4 class="font-bold text-slate-900 text-sm mb-1">Kualitas Terjamin</h4>
                            <p class="text-xs text-gray-500 leading-snug">Setiap unit melewati proses Quality Control ketat.
                            </p>
                        </div>

                        <div class="p-4 bg-gray-50 rounded-2xl border border-gray-100">
                            <div
                                class="w-10 h-10 bg-white shadow-sm rounded-lg flex items-center justify-center mb-3 text-slate-700">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path
                                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                    </path>
                                </svg>
                            </div>
                            <h4 class="font-bold text-slate-900 text-sm mb-1">Harga Kompetitif</h4>
                            <p class="text-xs text-gray-500 leading-snug">Harga khusus distributor untuk partai besar &
                                agen.</p>
                        </div>
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
                            <h4 class="text-sm md:text-base font-bold text-slate-800 mb-3 line-clamp-1">{{ $product->name }}
                            </h4>
                            <div class="flex flex-col md:flex-row md:items-center justify-between gap-3">
                                <span
                                    class="text-sm font-bold text-slate-900">Rp{{ number_format($product->price, 0, ',', '.') }}</span>
                                <a href="https://wa.me/{{ $waNumber->value ?? '' }}?text={{ urlencode($waMessage->value . ' ' . $product->name) }}"
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



    <section class="py-12 bg-gray-50">
        <div class="max-w-5xl mx-auto px-4">
            <div class="bg-slate-900 rounded-[2.5rem] p-12 text-center relative overflow-hidden">
                <div class="absolute top-0 left-0 w-32 h-32 bg-white/5 rounded-full -translate-x-1/2 -translate-y-1/2">
                </div>

                <h2 class="text-2xl md:text-4xl font-bold text-white mb-6">Siap Bekerja Sama dengan Kami?</h2>
                <p class="text-gray-400 mb-10 max-w-lg mx-auto">Dapatkan penawaran harga grosir terbaik untuk kebutuhan
                    Travel Haji & Umroh atau toko retail Anda.</p>

                <a href="https://wa.me/{{ $waNumber->value ?? '' }}?text={{ urlencode('Halo, saya tertarik untuk menjadi mitra distributor KoperGrosir.') }}"
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
                                        <svg class="w-5 h-5 text-green-500 mr-2 flex-shrink-0" fill="none"
                                            stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        {{ trim($item) }}
                                    </div>
                                @endforeach
                            </div>

                            <a href="https://wa.me/{{ $waNumber->value ?? '' }}?text={{ urlencode($waMessage->value . ' Saya tertarik dengan ' . $package->name) }}"
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
