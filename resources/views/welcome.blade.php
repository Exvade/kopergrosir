@extends('layouts.app')

@section('content')
    <section id="home" class="relative overflow-hidden bg-gray-50 pt-16 pb-24">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="z-10">
                    <span
                        class="inline-block px-4 py-1.5 rounded-full bg-white border border-gray-200 text-xs font-bold tracking-widest text-gray-400 uppercase mb-6 shadow-sm">
                        Official Distributor
                    </span>
                    <h1 class="text-4xl md:text-6xl font-bold text-slate-900 leading-tight mb-6">
                        Solusi Perjalanan & <br>
                        <span class="text-gray-400 font-light italic">Ibadah Terpercaya.</span>
                    </h1>
                    <p class="text-lg text-gray-500 mb-10 max-w-lg leading-relaxed">
                        Kami menyediakan berbagai perlengkapan travel mulai dari koper premium hingga paket lengkap Haji &
                        Umroh dengan standar kualitas distributor resmi.
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
                    <img src="https://images.unsplash.com/photo-1665817301929-69aebc01596d?q=80&w=1073&auto=format&fit=crop&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        alt="Main Showcase"
                        class="rounded-3xl shadow-2xl grayscale-20 hover:grayscale-0 transition duration-700 object-cover h-[500px] w-full">
                </div>
            </div>
        </div>
    </section>



    <section class="py-16 bg-slate-900">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-8 text-center" x-data="{
                stats: [
                    { label: 'Koper Terjual', target: 5000, current: 0, suffix: '+' },
                    { label: 'Agen Aktif', target: 200, current: 0, suffix: '+' },
                    { label: 'Kota Jangkauan', target: 15, current: 0, suffix: '+' },
                    { label: 'Aman & Terpercaya', target: 100, current: 0, suffix: '%' }
                ],
                animate(item) {
                    let start = 0;
                    let end = item.target;
                    let duration = 2000; // 2 detik
                    let startTime = null;
            
                    const step = (timestamp) => {
                        if (!startTime) startTime = timestamp;
                        let progress = Math.min((timestamp - startTime) / duration, 1);
                        item.current = Math.floor(progress * (end - start) + start);
                        if (progress < 1) {
                            window.requestAnimationFrame(step);
                        }
                    };
                    window.requestAnimationFrame(step);
                }
            }" x-init="setTimeout(() => { stats.forEach(item => animate(item)) }, 500)">
                <template x-for="(stat, index) in stats" :key="index">
                    <div class="p-4 group" data-aos="fade-up" :data-aos-delay="index * 100">
                        <div
                            class="text-4xl font-black text-white mb-2 flex justify-center items-baseline group-hover:scale-110 transition duration-300 tracking-tighter">
                            <span x-text="stat.current"></span>
                            <span class="text-white ml-0.5" x-text="stat.suffix"></span>
                        </div>
                        <div class="text-[10px] text-gray-400 uppercase tracking-[0.2em] font-bold" x-text="stat.label">
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </section>

    <section id="about" class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center mb-20">
                <div class="relative">
                    <div
                        class="aspect-[4/5] rounded-3xl overflow-hidden shadow-2xl shadow-gray-200 border-8 border-gray-50">
                        <img src="https://images.unsplash.com/photo-1553413077-190dd305871c?q=80&w=735&auto=format&fit=crop"
                            alt="Gudang Distributor" class="w-full h-full object-cover grayscale-[30%]">
                    </div>
                    <div
                        class="absolute -bottom-6 -right-6 bg-slate-900 text-white p-8 rounded-3xl shadow-xl hidden md:block">
                        <div class="text-3xl font-bold mb-1 italic">10+</div>
                        <div class="text-[10px] text-gray-400 uppercase tracking-widest font-semibold">Tahun Pengalaman
                        </div>
                    </div>
                </div>

                <div class="space-y-6">
                    <h2 class="text-3xl font-bold text-slate-900 leading-tight">
                        Distributor Utama <br>
                        <span class="text-gray-400 font-light italic">Travel & Pilgrimage Kit.</span>
                    </h2>
                    <p class="text-gray-500 leading-relaxed">
                        KoperGrosir hadir sebagai mitra strategis bagi biro perjalanan Haji & Umroh serta toko retail
                        perlengkapan travel. Kami berdedikasi untuk memberikan produk terbaik dengan proses pengadaan yang
                        transparan dan profesional.
                    </p>
                    <div class="flex items-center gap-4 p-5 bg-gray-50 rounded-2xl border border-gray-100 shadow-sm">
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
                            <p class="text-xs text-gray-500">Menerima pesanan dan kiriman ke seluruh wilayah nusantara.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 pt-12 border-t border-gray-100">
                <div class="flex items-start gap-5 p-4 rounded-2xl hover:bg-gray-50 transition duration-300">
                    <div
                        class="shrink-0 w-12 h-12 bg-slate-900 rounded-xl flex items-center justify-center text-white shadow-lg">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-900 mb-1">Kualitas Premium</h4>
                        <p class="text-xs text-gray-500 leading-relaxed">Pengerjaan rapi dan material berkualitas tinggi.
                        </p>
                    </div>
                </div>
                <div class="flex items-start gap-5 p-4 rounded-2xl hover:bg-gray-50 transition duration-300">
                    <div
                        class="shrink-0 w-12 h-12 bg-slate-900 rounded-xl flex items-center justify-center text-white shadow-lg">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 011-1h1a2 2 0 100-4H7a1 1 0 01-1-1V7a1 1 0 011-1h3a1 1 0 001-1V4z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-900 mb-1">Custom Desain</h4>
                        <p class="text-xs text-gray-500 leading-relaxed">Bebas pilih desain sesuai keinginan instansi Anda.
                        </p>
                    </div>
                </div>
                <div class="flex items-start gap-5 p-4 rounded-2xl hover:bg-gray-50 transition duration-300">
                    <div
                        class="shrink-0 w-12 h-12 bg-slate-900 rounded-xl flex items-center justify-center text-white shadow-lg">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-slate-900 mb-1">Harga Bersaing</h4>
                        <p class="text-xs text-gray-500 leading-relaxed">Penawaran harga terbaik untuk partai besar/grosir.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @if (isset($activeBanners) && $activeBanners->count() > 0)
        <section class="w-full bg-white pt-8" x-data="{
            active: 0,
            loop() {
                setInterval(() => {
                    this.active = this.active === {{ $activeBanners->count() - 1 }} ? 0 : this.active + 1;
                    this.scrollToActive();
                }, 6000);
            },
            scrollToActive() {
                let slider = this.$refs.slider;
                let width = slider.firstElementChild.getBoundingClientRect().width;
                slider.scrollTo({ left: width * this.active, behavior: 'smooth' });
            }
        }" x-init="loop()">

            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative group">

                <div x-ref="slider"
                    class="flex overflow-hidden snap-x snap-mandatory rounded-[2rem] md:rounded-[3rem] shadow-2xl shadow-gray-200/50 bg-gray-50 border border-gray-100">

                    @foreach ($activeBanners as $index => $banner)
                        <div class="min-w-full snap-start relative aspect-[16/9] md:aspect-[21/8] overflow-hidden">

                            @php $hasLink = !empty($banner->link); @endphp

                            <{!! $hasLink ? 'a href="' . $banner->link . '"' : 'div' !!} class="block w-full h-full group/item">

                                <img src="{{ asset('storage/' . $banner->image) }}" alt="{{ $banner->title }}"
                                    class="w-full h-full object-cover object-center transition duration-[3000ms] group-hover/item:scale-105">

                                <div
                                    class="absolute inset-0 bg-slate-900/30 group-hover/item:bg-slate-900/20 transition duration-500">
                                </div>

                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-slate-900/80 via-transparent to-transparent">
                                </div>

                                <div class="absolute bottom-8 left-8 md:bottom-12 md:left-12 text-white max-w-xl">
                                    <div
                                        class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/10 backdrop-blur-md border border-white/20 text-[10px] font-bold uppercase tracking-[0.2em] mb-4">
                                        <span class="w-1.5 h-1.5 rounded-full bg-white animate-pulse"></span>
                                        Official Promo
                                    </div>
                                    <h3 class="text-2xl md:text-4xl font-bold leading-tight tracking-tight drop-shadow-sm">
                                        {{ $banner->title }}
                                    </h3>
                                </div>

                                </{!! $hasLink ? 'a' : 'div' !!}>
                        </div>
                    @endforeach
                </div>

                @if ($activeBanners->count() > 1)
                    <button
                        @click="active = (active === 0) ? {{ $activeBanners->count() - 1 }} : active - 1; scrollToActive()"
                        class="absolute left-10 top-1/2 -translate-y-1/2 w-12 h-12 bg-white/20 backdrop-blur-lg border border-white/30 rounded-full flex items-center justify-center text-white hover:bg-white hover:text-slate-900 transition-all opacity-0 group-hover:opacity-100 z-20">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            stroke-width="2.5">
                            <path d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </button>

                    <button
                        @click="active = (active === {{ $activeBanners->count() - 1 }}) ? 0 : active + 1; scrollToActive()"
                        class="absolute right-10 top-1/2 -translate-y-1/2 w-12 h-12 bg-white/20 backdrop-blur-lg border border-white/30 rounded-full flex items-center justify-center text-white hover:bg-white hover:text-slate-900 transition-all opacity-0 group-hover:opacity-100 z-20">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            stroke-width="2.5">
                            <path d="M9 5l7 7-7 7"></path>
                        </svg>
                    </button>

                    <div class="absolute bottom-6 md:bottom-10 right-8 md:right-12 flex items-center space-x-2 z-20">
                        @foreach ($activeBanners as $index => $b)
                            <button @click="active = {{ $index }}; scrollToActive()"
                                :class="active === {{ $index }} ? 'w-10 bg-white' : 'w-2 bg-white/30'"
                                class="h-1 rounded-full transition-all duration-700"></button>
                        @endforeach
                    </div>
                @endif
            </div>
        </section>
    @endif



    <style>
        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .no-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>

    <section class="py-24 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-slate-900 mb-4 tracking-tight">Langkah Mudah Pemesanan</h2>
                <div class="w-12 h-1 bg-gray-200 mx-auto rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <div
                    class="bg-gray-50 p-8 rounded-3xl border border-gray-100 flex flex-col items-center text-center group hover:bg-white hover:shadow-xl transition-all duration-300">
                    <div
                        class="w-16 h-16 bg-white shadow-sm rounded-2xl flex items-center justify-center text-slate-900 mb-6 group-hover:bg-slate-900 group-hover:text-white transition-all duration-300">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z">
                            </path>
                        </svg>
                    </div>
                    <h4 class="text-lg font-bold text-slate-900 mb-3">Konsultasi</h4>
                    <p class="text-xs text-gray-500 leading-relaxed">Hubungi admin kami untuk konsultasi spesifikasi &
                        kebutuhan Anda.</p>
                </div>
                <div
                    class="bg-gray-50 p-8 rounded-3xl border border-gray-100 flex flex-col items-center text-center group hover:bg-white hover:shadow-xl transition-all duration-300">
                    <div
                        class="w-16 h-16 bg-white shadow-sm rounded-2xl flex items-center justify-center text-slate-900 mb-6 group-hover:bg-slate-900 group-hover:text-white transition-all duration-300">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                    </div>
                    <h4 class="text-lg font-bold text-slate-900 mb-3">Pilih Paket</h4>
                    <p class="text-xs text-gray-500 leading-relaxed">Pilih paket perlengkapan travel yang sesuai anggaran.
                    </p>
                </div>
                <div
                    class="bg-gray-50 p-8 rounded-3xl border border-gray-100 flex flex-col items-center text-center group hover:bg-white hover:shadow-xl transition-all duration-300">
                    <div
                        class="w-16 h-16 bg-white shadow-sm rounded-2xl flex items-center justify-center text-slate-900 mb-6 group-hover:bg-slate-900 group-hover:text-white transition-all duration-300">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z">
                            </path>
                        </svg>
                    </div>
                    <h4 class="text-lg font-bold text-slate-900 mb-3">Pembayaran</h4>
                    <p class="text-xs text-gray-500 leading-relaxed">Lakukan pembayaran aman melalui metode yang tersedia.
                    </p>
                </div>
                <div
                    class="bg-gray-50 p-8 rounded-3xl border border-gray-100 flex flex-col items-center text-center group hover:bg-white hover:shadow-xl transition-all duration-300">
                    <div
                        class="w-16 h-16 bg-white shadow-sm rounded-2xl flex items-center justify-center text-slate-900 mb-6 group-hover:bg-slate-900 group-hover:text-white transition-all duration-300">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0">
                            </path>
                        </svg>
                    </div>
                    <h4 class="text-lg font-bold text-slate-900 mb-3">Pengiriman</h4>
                    <p class="text-xs text-gray-500 leading-relaxed">Produk kami kirimkan tepat waktu ke lokasi Anda.</p>
                </div>
            </div>
        </div>
    </section>


    <section id="paket" class="py-24 bg-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row justify-between items-end mb-12 gap-4 text-center md:text-left">
                <div class="max-w-xl">
                    <h2 class="text-3xl font-bold text-slate-900 mb-4 tracking-tight">Paket Hemat Distributor</h2>
                    <p class="text-gray-500 text-sm">Bundling perlengkapan travel dengan harga khusus partai besar.</p>
                </div>
                <div class="hidden md:block h-px flex-1 bg-gray-200 mx-8 mb-4"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($packages as $package)
                    <div
                        class="flex flex-col bg-white rounded-4xl overflow-hidden border border-gray-100 shadow-sm hover:shadow-2xl hover:-translate-y-2 transition-all duration-500 group">
                        <div class="relative h-72 overflow-hidden">
                            <img src="{{ asset('storage/' . $package->image) }}" alt="{{ $package->name }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition duration-700">

                            <div
                                class="absolute inset-0 bg-gradient-to-t from-slate-900/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                            </div>

                            <div class="absolute top-5 right-5">
                                <span
                                    class="bg-white/90 backdrop-blur-md text-slate-900 text-[10px] font-extrabold px-4 py-1.5 rounded-full uppercase tracking-widest shadow-sm">
                                    Best Value
                                </span>
                            </div>
                        </div>

                        <div class="p-8 flex flex-col grow">
                            <div class="mb-4">
                                <h3
                                    class="text-xl font-bold text-slate-900 mb-2 group-hover:text-slate-700 transition-colors">
                                    {{ $package->name }}</h3>
                                <div class="flex items-baseline gap-1">
                                    <span
                                        class="text-2xl font-black text-slate-900 italic">Rp{{ number_format($package->price, 0, ',', '.') }}</span>
                                    <span class="text-gray-400 text-xs font-medium">/ paket</span>
                                </div>
                            </div>

                            <div class="w-full h-px bg-gray-100 mb-6"></div>

                            <div class="space-y-4 mb-8">
                                <p class="text-[10px] font-bold text-gray-400 uppercase tracking-[0.2em]">Rincian Item:</p>
                                <div class="grid gap-3">
                                    @php $items = explode(',', $package->package_items); @endphp
                                    @foreach ($items as $item)
                                        <div class="flex items-center text-sm text-gray-600 font-medium">
                                            <div
                                                class="w-5 h-5 rounded-full bg-slate-100 flex items-center justify-center mr-3 shrink-0">
                                                <svg class="w-3 h-3 text-slate-900" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24" stroke-width="3">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M5 13l4 4L19 7"></path>
                                                </svg>
                                            </div>
                                            <span class="line-clamp-1">{{ trim($item) }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="mt-auto pt-4">
                                <a href="https://wa.me/{{ $waNumber->value ?? '' }}?text={{ urlencode($waMessage->value . ' Saya tertarik dengan ' . $package->name) }}"
                                    target="_blank"
                                    class="flex items-center justify-center w-full py-4 bg-slate-900 text-white font-bold rounded-2xl hover:bg-slate-800 transition-all duration-300 shadow-xl shadow-slate-200 overflow-hidden relative">
                                    <span class="relative z-10">Pesan Paket Sekarang</span>
                                    <svg class="w-5 h-5 ml-2 relative z-10 transform group-hover:translate-x-1 transition-transform"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="katalog" class="py-24 bg-gray-50" x-data="{ activeCategory: 'all' }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-10">
                <h2 class="text-3xl font-bold text-slate-900 mb-2 tracking-tight">Katalog Produk</h2>
                <div class="w-12 h-1 bg-slate-900 mx-auto rounded-full"></div>
            </div>

            <div class="mb-8 overflow-x-auto no-scrollbar pb-2 flex md:justify-center gap-2">
                <button @click="activeCategory = 'all'"
                    :class="activeCategory === 'all' ? 'bg-slate-900 text-white shadow-md' :
                        'bg-white text-gray-400 border border-gray-100'"
                    class="flex-none px-5 py-2 rounded-full text-xs font-bold transition-all whitespace-nowrap">
                    Semua
                </button>
                @foreach ($categories as $cat)
                    <button @click="activeCategory = '{{ $cat->slug }}'"
                        :class="activeCategory === '{{ $cat->slug }}' ? 'bg-slate-900 text-white shadow-md' :
                            'bg-white text-gray-400 border border-gray-100'"
                        class="flex-none px-5 py-2 rounded-full text-xs font-bold transition-all whitespace-nowrap">
                        {{ $cat->name }}
                    </button>
                @endforeach
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 md:gap-4">
                @foreach ($products as $product)
                    <div x-show="activeCategory === 'all' || activeCategory === '{{ $product->category->slug ?? '' }}'"
                        class="group bg-white rounded-[1.5rem] border border-gray-200 overflow-hidden hover:border-slate-900 transition-all duration-300 flex flex-col h-full relative">

                        <div class="relative aspect-[3/4] bg-slate-100 overflow-hidden">
                            <img src="{{ asset('storage/' . $product->image) }}"
                                class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">

                            <div class="absolute top-2 left-2">
                                <span
                                    class="bg-slate-900/90 backdrop-blur-sm text-white text-[8px] font-black px-2 py-1 rounded-md uppercase tracking-tighter">
                                    {{ $product->category->name ?? 'Retail' }}
                                </span>
                            </div>

                            <div class="absolute bottom-2 right-2 flex flex-col items-end gap-1 pointer-events-none">
                                @if (!$product->is_package && $product->size)
                                    <span
                                        class="bg-white/90 backdrop-blur shadow-sm text-slate-900 text-[9px] font-extrabold px-2 py-0.5 rounded-md border border-slate-200">
                                        {{ $product->size }}
                                    </span>
                                @endif
                                @if ($product->material)
                                    <span
                                        class="bg-white/90 backdrop-blur shadow-sm text-slate-900 text-[9px] font-extrabold px-2 py-0.5 rounded-md border border-slate-200 uppercase truncate max-w-[80px]">
                                        {{ $product->material }}
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="p-4 flex flex-col flex-grow bg-white border-t border-gray-50">
                            <h4
                                class="text-sm md:text-base font-black text-slate-900 leading-tight mb-4 line-clamp-2 h-10 md:h-12 tracking-tight">
                                {{ $product->name }}
                            </h4>

                            <div class="mt-auto flex items-center justify-between gap-2">
                                <div class="flex flex-col">
                                    <span
                                        class="text-[8px] font-bold text-emerald-600 uppercase tracking-widest leading-none mb-1">Ready
                                        Stock</span>
                                    <div class="flex items-baseline font-black text-slate-900 tracking-tighter">
                                        <span class="text-[10px] mr-0.5">Rp</span>
                                        <span class="text-base md:text-xl leading-none">
                                            {{ number_format($product->price, 0, ',', '.') }}
                                        </span>
                                    </div>
                                </div>

                                <a href="https://wa.me/{{ $waNumber->value ?? '' }}" target="_blank"
                                    class="w-10 h-10 rounded-2xl bg-slate-900 text-white flex items-center justify-center shadow-lg hover:bg-slate-700 transition active:scale-95 flex-shrink-0">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="py-24 bg-white" x-data="{ selected: 1 }">
        <div class="max-w-3xl mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-slate-900 mb-4">Sering Ditanyakan</h2>
                <div class="w-12 h-1 bg-gray-200 mx-auto rounded-full"></div>
            </div>
            <div class="space-y-4">
                <div class="border border-gray-100 rounded-2xl overflow-hidden shadow-sm">
                    <button @click="selected !== 1 ? selected = 1 : selected = null"
                        class="w-full flex justify-between items-center p-6 text-left hover:bg-gray-50 transition font-bold text-slate-800 text-sm">
                        <span>Apakah bisa custom logo travel pada koper?</span>
                        <svg class="w-5 h-5 transition-transform" :class="selected === 1 ? 'rotate-180' : ''"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="px-6 pb-6 text-gray-500 text-xs leading-relaxed" x-show="selected === 1" x-cloak>
                        Tentu bisa. Kami menyediakan layanan sablon atau grafir logo instansi/biro travel Anda dengan
                        minimal pemesanan tertentu untuk menjaga kualitas.
                    </div>
                </div>
                <div class="border border-gray-100 rounded-2xl overflow-hidden shadow-sm">
                    <button @click="selected !== 2 ? selected = 2 : selected = null"
                        class="w-full flex justify-between items-center p-6 text-left hover:bg-gray-50 transition font-bold text-slate-800 text-sm">
                        <span>Berapa lama estimasi pengiriman partai besar?</span>
                        <svg class="w-5 h-5 transition-transform" :class="selected === 2 ? 'rotate-180' : ''"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div class="px-6 pb-6 text-gray-500 text-xs leading-relaxed" x-show="selected === 2" x-cloak>
                        Untuk stok ready, pengiriman H+1. Untuk custom atau pesanan sangat besar, estimasi 7-14 hari kerja
                        tergantung antrian produksi di gudang kami.
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 bg-gray-50 overflow-hidden" id="testimoni">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-bold text-slate-900 mb-4 tracking-tight">Kepuasan Mitra Kami</h2>
                <div class="w-12 h-1 bg-gray-200 mx-auto rounded-full"></div>
                <p class="text-gray-500 mt-4 text-sm md:text-base">Bukti nyata layanan kami melalui percakapan dengan mitra
                    di seluruh Indonesia.</p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6">
                <div
                    class="group relative bg-white rounded-3xl p-2 shadow-sm border border-gray-100 hover:shadow-xl transition-all duration-500 hover:-translate-y-2">
                    <div class="aspect-[9/16] rounded-2xl overflow-hidden bg-gray-200">
                        <img src="https://www.akmpabrikkoper.com/wp-content/uploads/2024/04/122-514x1024.png"
                            alt="Testimoni WA"
                            class="w-full h-full object-cover grayscale-20 group-hover:grayscale-0 transition duration-500">
                    </div>
                    <div
                        class="absolute bottom-6 left-6 right-6 bg-white/90 backdrop-blur-md p-4 rounded-2xl shadow-sm opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                        <p class="text-[10px] font-bold text-slate-900 uppercase tracking-widest">Biro Travel Jakarta</p>
                        <p class="text-[10px] text-gray-500 mt-1">"Pengiriman cepat & koper sangat solid!"</p>
                    </div>
                </div>

                <div
                    class="group relative bg-white rounded-3xl p-2 shadow-sm border border-gray-100 hover:shadow-xl transition-all duration-500 hover:-translate-y-2">
                    <div class="aspect-[9/16] rounded-2xl overflow-hidden bg-gray-200">
                        <img src="https://www.akmpabrikkoper.com/wp-content/uploads/2024/04/11-514x1024.png"
                            alt="Testimoni WA"
                            class="w-full h-full object-cover grayscale-20 group-hover:grayscale-0 transition duration-500">
                    </div>
                    <div
                        class="absolute bottom-6 left-6 right-6 bg-white/90 backdrop-blur-md p-4 rounded-2xl shadow-sm opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                        <p class="text-[10px] font-bold text-slate-900 uppercase tracking-widest">Agen Jawa Timur</p>
                        <p class="text-[10px] text-gray-500 mt-1">"Baru sampai langsung ludes diborong agen lokal."</p>
                    </div>
                </div>

                <div
                    class="group relative bg-white rounded-3xl p-2 shadow-sm border border-gray-100 hover:shadow-xl transition-all duration-500 hover:-translate-y-2">
                    <div class="aspect-[9/16] rounded-2xl overflow-hidden bg-gray-200">
                        <img src="https://www.akmpabrikkoper.com/wp-content/uploads/2024/04/124-514x1024.png"
                            alt="Testimoni WA"
                            class="w-full h-full object-cover grayscale-20 group-hover:grayscale-0 transition duration-500">
                    </div>
                    <div
                        class="absolute bottom-6 left-6 right-6 bg-white/90 backdrop-blur-md p-4 rounded-2xl shadow-sm opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                        <p class="text-[10px] font-bold text-slate-900 uppercase tracking-widest">Retailer Kalimantan</p>
                        <p class="text-[10px] text-gray-500 mt-1">"Bahan fiber koper aslinya lebih mewah dari foto."</p>
                    </div>
                </div>

                <div
                    class="group relative bg-white rounded-3xl p-2 shadow-sm border border-gray-100 hover:shadow-xl transition-all duration-500 hover:-translate-y-2">
                    <div class="aspect-[9/16] rounded-2xl overflow-hidden bg-gray-200">
                        <img src="https://www.akmpabrikkoper.com/wp-content/uploads/2024/04/123-514x1024.png"
                            alt="Testimoni WA"
                            class="w-full h-full object-cover grayscale-20 group-hover:grayscale-0 transition duration-500">
                    </div>
                    <div
                        class="absolute bottom-6 left-6 right-6 bg-white/90 backdrop-blur-md p-4 rounded-2xl shadow-sm opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                        <p class="text-[10px] font-bold text-slate-900 uppercase tracking-widest">Mitra Sumatera</p>
                        <p class="text-[10px] text-gray-500 mt-1">"Langganan tetap untuk paket Umroh kami."</p>
                    </div>
                </div>
            </div>

            <div class="mt-12 flex justify-center">
                <div class="inline-flex items-center px-6 py-3 bg-white border border-gray-100 rounded-full shadow-sm">
                    <div class="flex -space-x-2 mr-3">
                        <div class="w-8 h-8 rounded-full border-2 border-white bg-slate-200 overflow-hidden">
                            <img src="https://ui-avatars.com/api/?name=Tanto+Hendrianto&background=random" alt="">
                        </div>
                        <div class="w-8 h-8 rounded-full border-2 border-white bg-slate-200 overflow-hidden">
                            <img src="https://ui-avatars.com/api/?name=Rangga+Rafianto&background=random" alt="">
                        </div>
                        <div class="w-8 h-8 rounded-full border-2 border-white bg-slate-200 overflow-hidden">
                            <img src="https://ui-avatars.com/api/?name=Dayat+Mukti&background=random" alt="">
                        </div>
                    </div>
                    <p class="text-xs font-bold text-slate-700">Gabung dengan +200 mitra sukses lainnya</p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-12 bg-gray-50 pb-24">
        <div class="max-w-5xl mx-auto px-4">
            <div class="bg-slate-900 rounded-[2.5rem] p-12 text-center relative overflow-hidden shadow-2xl">
                <div class="absolute top-0 left-0 w-32 h-32 bg-white/5 rounded-full -translate-x-1/2 -translate-y-1/2">
                </div>
                <h2 class="text-2xl md:text-4xl font-bold text-white mb-6">Siap Bekerja Sama dengan Kami?</h2>
                <p class="text-gray-400 mb-10 max-w-lg mx-auto text-sm">Dapatkan penawaran harga grosir terbaik untuk
                    kebutuhan Travel Haji & Umroh atau toko retail Anda hari ini.</p>
                <a href="https://wa.me/{{ $waNumber->value ?? '' }}?text={{ urlencode('Halo KoperGrosir, saya tertarik untuk menjadi mitra distributor.') }}"
                    target="_blank"
                    class="inline-block px-10 py-4 bg-white text-slate-900 font-bold rounded-full hover:bg-gray-200 transition-all shadow-xl active:scale-95">
                    Mulai Kemitraan
                </a>
            </div>
        </div>
    </section>

    <a href="https://wa.me/{{ $waNumber->value ?? '' }}" target="_blank"
        class="fixed bottom-8 right-8 z-[100] bg-green-500 text-white p-4 rounded-full shadow-2xl hover:bg-green-600 transition duration-300 hover:scale-110 active:scale-90 group">
        <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
            <path
                d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
        </svg>
        <span
            class="absolute right-full mr-4 bg-white text-slate-900 px-4 py-2 rounded-lg text-xs font-bold whitespace-nowrap opacity-0 group-hover:opacity-100 transition-all shadow-xl pointer-events-none">Hubungi
            Kami</span>
    </a>
@endsection
