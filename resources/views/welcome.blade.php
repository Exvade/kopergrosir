@extends('layouts.app')

@section('content')
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
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                            <path d="M15 19l-7-7 7-7"></path>
                        </svg>
                    </button>

                    <button
                        @click="active = (active === {{ $activeBanners->count() - 1 }}) ? 0 : active + 1; scrollToActive()"
                        class="absolute right-10 top-1/2 -translate-y-1/2 w-12 h-12 bg-white/20 backdrop-blur-lg border border-white/30 rounded-full flex items-center justify-center text-white hover:bg-white hover:text-slate-900 transition-all opacity-0 group-hover:opacity-100 z-20">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
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
    <section id="home" class="relative min-h-[85vh] flex items-center overflow-hidden bg-slate-950">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('hero-section1.JPG') }}" class="w-full h-full object-cover" alt="Nuansa Ibadah Umroh">

            <div class="absolute inset-0 bg-gradient-to-r from-blue-950 via-blue-950/80 to-blue-900/20"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full">
            <div class="max-w-2xl" data-aos="fade-right">
                <span
                    class="inline-block px-4 py-1.5 rounded-full bg-blue-500/10 border border-blue-400/40 text-[10px] font-black uppercase tracking-[0.2em] text-blue-300 mb-6 backdrop-blur-md">
                    Gudang Pusat Jakarta
                </span>

                <h1 class="text-4xl md:text-6xl font-extrabold text-white leading-[1.1] mb-6 tracking-tight">
                    Suplier Koper <br>
                    <span class="text-blue-300 font-light italic">Tangan Pertama.</span>
                </h1>

                <p class="text-lg md:text-xl text-blue-50/90 mb-10 leading-relaxed font-medium">
                    Sedia koper umroh stok melimpah, harga langsung pabrik. <br class="hidden md:block">
                    Bisa custom logo untuk biro perjalanan Anda.
                </p>

                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="#katalog"
                        class="px-10 py-4 bg-blue-600 text-white rounded-2xl font-bold hover:bg-blue-500 transition-all duration-300 shadow-2xl shadow-blue-900/40 text-center active:scale-95">
                        Lihat Katalog
                    </a>
                    <a href="#paket"
                        class="px-10 py-4 bg-white/5 backdrop-blur-md text-white border border-blue-300/50 rounded-2xl font-bold hover:bg-white/10 transition-all duration-300 text-center active:scale-95">
                        Paket Bundling
                    </a>
                </div>
            </div>
        </div>
    </section>



    <section class="py-20 bg-primary relative overflow-hidden">
        <div class="absolute inset-0 opacity-10"
            style="background-image: radial-gradient(#2563EB 0.5px, transparent 0.5px); background-size: 24px 24px;"></div>

        <div class="max-w-7xl mx-auto px-4 relative z-10">
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-8 md:gap-12 text-center" x-data="{
                stats: [
                    { label: 'Koper Terjual', target: 5000, current: 0, suffix: '+' },
                    { label: 'Agen Aktif', target: 200, current: 0, suffix: '+' },
                    { label: 'Kota Jangkauan', target: 15, current: 0, suffix: '+' },
                    { label: 'Aman & Terpercaya', target: 100, current: 0, suffix: '%' }
                ],
                animate(item) {
                    let start = 0;
                    let end = item.target;
                    let duration = 2000;
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
            }"
                x-init="setTimeout(() => { stats.forEach(item => animate(item)) }, 500)">

                <template x-for="(stat, index) in stats" :key="index">
                    <div class="p-6 group relative" data-aos="fade-up" :data-aos-delay="index * 100">
                        <div
                            class="absolute top-0 left-1/2 -translate-x-1/2 w-8 h-1 bg-secondary rounded-full opacity-0 group-hover:opacity-100 group-hover:w-12 transition-all duration-500">
                        </div>

                        <div
                            class="text-4xl md:text-5xl font-black text-white mb-3 flex justify-center items-baseline tracking-tighter">
                            <span class="text-white" x-text="stat.current"></span>
                            <span class="text-secondary ml-1" x-text="stat.suffix"></span>
                        </div>

                        <div class="text-[10px] md:text-xs text-blue-200/50 uppercase tracking-[0.3em] font-black"
                            x-text="stat.label">
                        </div>

                        <div
                            class="absolute inset-0 bg-secondary/5 blur-3xl rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </section>

    <section id="about" class="py-24 bg-white overflow-x-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center mb-20">
                <div class="relative" data-aos="fade-right">
                    <div
                        class="aspect-[4/5] rounded-[3rem] overflow-hidden shadow-2xl shadow-blue-900/10 border-8 border-slate-50">
                        <img src="{{ asset('warehouse.JPG') }}" alt="Gudang Distributor"
                            class="w-full h-full object-cover grayscale-[20%] hover:grayscale-0 transition duration-700">
                    </div>
                    <div
                        class="absolute -bottom-6 -right-6 bg-primary text-white p-8 rounded-[2.5rem] shadow-2xl border-4 border-white hidden md:block">
                        <div class="text-4xl font-black mb-1 italic text-secondary">10+</div>
                        <div class="text-[10px] text-blue-200 uppercase tracking-[0.2em] font-bold">Tahun Pengalaman</div>
                    </div>
                </div>

                <div class="space-y-8" data-aos="fade-left">
                    <div class="space-y-4">
                        <span class="text-secondary font-black text-[10px] uppercase tracking-[0.3em]">Authorized
                            Partner</span>
                        <h2 class="text-4xl md:text-5xl font-extrabold text-primary leading-tight">
                            Distributor Utama <br>
                            <span class="text-blue-600 font-light italic">Artlyn Kreasi Mandiri.</span>
                        </h2>
                        <p class="text-slate-500 leading-relaxed text-lg">
                            Kami bukan sekadar menjual koper. Kami adalah mitra pengadaan yang memastikan biro Anda punya
                            stok koper kuat, sablon logo yang rapi, dan pengiriman yang tidak pernah telat.
                        </p>
                    </div>

                    <div
                        class="flex items-center gap-5 p-6 bg-accent rounded-[2rem] border border-blue-100 shadow-sm group hover:bg-blue-600 transition-all duration-500">
                        <div
                            class="shrink-0 w-14 h-14 bg-white rounded-2xl shadow-sm flex items-center justify-center text-secondary group-hover:bg-primary group-hover:text-white transition-colors">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                </path>
                            </svg>
                        </div>
                        <div>
                            <h4 class="font-black text-primary text-base group-hover:text-white transition-colors">
                                Jangkauan se-Indonesia</h4>
                            <p class="text-sm text-slate-500 group-hover:text-blue-100 transition-colors">Menerima pesanan
                                dan kiriman ke seluruh wilayah nusantara.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 pt-12 border-t border-blue-50">
                <div
                    class="flex items-start gap-5 p-6 rounded-3xl hover:bg-accent border border-transparent hover:border-blue-100 transition duration-500 group">
                    <div
                        class="shrink-0 w-12 h-12 bg-primary rounded-xl flex items-center justify-center text-white shadow-lg group-hover:bg-secondary transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-primary mb-1">Kualitas Premium</h4>
                        <p class="text-sm text-slate-500 leading-relaxed">Pengerjaan rapi dan material berkualitas tinggi
                            yang tahan banting.</p>
                    </div>
                </div>

                <div
                    class="flex items-start gap-5 p-6 rounded-3xl hover:bg-accent border border-transparent hover:border-blue-100 transition duration-500 group">
                    <div
                        class="shrink-0 w-12 h-12 bg-primary rounded-xl flex items-center justify-center text-white shadow-lg group-hover:bg-secondary transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 4a2 2 0 114 0v1a1 1 0 001 1h3a1 1 0 011 1v3a1 1 0 01-1 1h-1a2 2 0 100 4h1a1 1 0 011 1v3a1 1 0 01-1 1h-3a1 1 0 01-1-1v-1a2 2 0 10-4 0v1a1 1 0 01-1 1H7a1 1 0 01-1-1v-3a1 1 0 011-1h1a2 2 0 100-4H7a1 1 0 01-1-1V7a1 1 0 011-1h3a1 1 0 001-1V4z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-primary mb-1">Custom Desain</h4>
                        <p class="text-sm text-slate-500 leading-relaxed">Bebas sablon logo dan desain koper khusus
                            identitas instansi Anda.</p>
                    </div>
                </div>

                <div
                    class="flex items-start gap-5 p-6 rounded-3xl hover:bg-accent border border-transparent hover:border-blue-100 transition duration-500 group">
                    <div
                        class="shrink-0 w-12 h-12 bg-primary rounded-xl flex items-center justify-center text-white shadow-lg group-hover:bg-secondary transition-colors">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                            </path>
                        </svg>
                    </div>
                    <div>
                        <h4 class="font-bold text-primary mb-1">Harga Bersaing</h4>
                        <p class="text-sm text-slate-500 leading-relaxed">Penawaran harga tangan pertama untuk kebutuhan
                            partai besar.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 bg-white overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center mb-20 overflow-x-hidden">
                <div data-aos="fade-right">
                    <span
                        class="inline-block px-4 py-1.5 rounded-full bg-blue-50 border border-blue-100 text-[10px] font-black tracking-[0.2em] text-blue-600 uppercase mb-6">
                        Production Excellence
                    </span>

                    <h2 class="text-3xl md:text-5xl font-black text-blue-900 leading-tight mb-6 tracking-tight">
                        Standar Pabrik <br>
                        <span class="text-blue-600 font-light italic">Bukan Koper Pasaran.</span>
                    </h2>

                    <p class="text-blue-800/60 text-lg leading-relaxed max-w-xl font-medium">
                        Setiap koper melewati uji banting dan pengecatan presisi tinggi. Kami memastikan bahan fiber yang
                        digunakan punya kelenturan pas agar tidak mudah pecah saat masuk bagasi pesawat.
                    </p>

                    <div class="grid grid-cols-2 gap-4 mt-10">
                        <div class="flex items-center gap-3 group">
                            <div
                                class="w-11 h-11 rounded-xl bg-blue-900 group-hover:bg-blue-600 transition-colors duration-300 flex items-center justify-center text-white shrink-0 shadow-lg shadow-blue-200">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <span class="text-sm font-black text-blue-800 uppercase tracking-wider">Pengecatan
                                Presisi</span>
                        </div>

                        <div class="flex items-center gap-3 group">
                            <div
                                class="w-11 h-11 rounded-xl bg-blue-900 group-hover:bg-blue-600 transition-colors duration-300 flex items-center justify-center text-white shrink-0 shadow-lg shadow-blue-200">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <span class="text-sm font-black text-blue-800 uppercase tracking-wider">QC Berlapis</span>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-2 grid-rows-2 gap-4 h-[550px]" data-aos="fade-left">
                    <div
                        class="col-span-2 row-span-1 relative rounded-[2.5rem] overflow-hidden group border border-blue-50 shadow-2xl shadow-blue-900/10">
                        <video autoplay muted loop playsinline class="w-full h-full object-cover">
                            <source src="{{ asset('video-pengecatan.MP4') }}" type="video/mp4">
                        </video>
                        <div class="absolute inset-0 bg-blue-900/20 group-hover:bg-transparent transition duration-500">
                        </div>
                        <div class="absolute bottom-6 left-6">
                            <span
                                class="bg-white/95 backdrop-blur-md px-4 py-2 rounded-xl text-[10px] text-blue-600 font-black uppercase tracking-[0.2em] border border-blue-100 shadow-lg">
                                Video: Finishing Process
                            </span>
                        </div>
                    </div>

                    <div
                        class="col-span-1 rounded-[2.5rem] overflow-hidden border border-blue-50 shadow-xl group relative">
                        <img loading="lazy" src="{{ asset('foto-pabrik-1.JPG') }}"
                            class="w-full h-full object-cover group-hover:scale-110 transition duration-1000">
                        <div class="absolute inset-0 bg-blue-600/0 group-hover:bg-blue-600/10 transition duration-500">
                        </div>
                    </div>

                    <div
                        class="col-span-1 rounded-[2.5rem] overflow-hidden border border-blue-50 shadow-xl group relative">
                        <img loading="lazy" src="{{ asset('foto-pabrik-3.JPG') }}"
                            class="w-full h-full object-cover group-hover:scale-110 transition duration-1000">
                        <div class="absolute inset-0 bg-blue-600/0 group-hover:bg-blue-600/10 transition duration-500">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 bg-white relative overflow-hidden">
        <div class="absolute top-0 left-0 w-64 h-64 bg-blue-50/50 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2">
        </div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-16" data-aos="fade-up">
                <span class="text-secondary font-black text-[10px] uppercase tracking-[0.3em] mb-2 block">Our
                    Workflow</span>
                <h2 class="text-3xl md:text-4xl font-extrabold text-primary mb-4 tracking-tight">Langkah Mudah Pemesanan
                </h2>
                <div class="w-12 h-1.5 bg-secondary mx-auto rounded-full"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <a href="https://wa.me/{{ $waNumber->value ?? '' }}" target="_blank" data-aos="fade-up"
                    data-aos-delay="100"
                    class="bg-accent/30 p-8 rounded-[2.5rem] border border-blue-50 flex flex-col items-center text-center group hover:bg-white hover:shadow-2xl hover:shadow-blue-900/10 transition-all duration-500">
                    <div
                        class="w-16 h-16 bg-white shadow-sm rounded-2xl flex items-center justify-center text-secondary mb-6 group-hover:bg-secondary group-hover:text-white group-hover:rotate-6 transition-all duration-500">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z">
                            </path>
                        </svg>
                    </div>
                    <h4 class="text-lg font-black text-primary mb-3 uppercase tracking-tight">Konsultasi</h4>
                    <p class="text-xs text-slate-500 leading-relaxed font-medium">Hubungi admin kami untuk konsultasi
                        spesifikasi &
                        kebutuhan Anda secara personal.</p>
                </a>

                <a href="#paket" data-aos="fade-up" data-aos-delay="200"
                    class="bg-accent/30 p-8 rounded-[2.5rem] border border-blue-50 flex flex-col items-center text-center group hover:bg-white hover:shadow-2xl hover:shadow-blue-900/10 transition-all duration-500">
                    <div
                        class="w-16 h-16 bg-white shadow-sm rounded-2xl flex items-center justify-center text-secondary mb-6 group-hover:bg-secondary group-hover:text-white group-hover:rotate-6 transition-all duration-500">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z"></path>
                        </svg>
                    </div>
                    <h4 class="text-lg font-black text-primary mb-3 uppercase tracking-tight">Pilih Paket</h4>
                    <p class="text-xs text-slate-500 leading-relaxed font-medium">Pilih paket perlengkapan travel yang
                        sesuai dengan anggaran dan standar biro Anda.</p>
                </a>

                <div data-aos="fade-up" data-aos-delay="300"
                    class="bg-accent/30 p-8 rounded-[2.5rem] border border-blue-50 flex flex-col items-center text-center group hover:bg-white hover:shadow-2xl hover:shadow-blue-900/10 transition-all duration-500">
                    <div
                        class="w-16 h-16 bg-white shadow-sm rounded-2xl flex items-center justify-center text-secondary mb-6 group-hover:bg-secondary group-hover:text-white group-hover:rotate-6 transition-all duration-500">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z">
                            </path>
                        </svg>
                    </div>
                    <h4 class="text-lg font-black text-primary mb-3 uppercase tracking-tight">Pembayaran</h4>
                    <p class="text-xs text-slate-500 leading-relaxed font-medium">Lakukan pelunasan atau DP pembayaran aman
                        melalui metode transfer resmi kami.</p>
                </div>

                <div data-aos="fade-up" data-aos-delay="400"
                    class="bg-accent/30 p-8 rounded-[2.5rem] border border-blue-50 flex flex-col items-center text-center group hover:bg-white hover:shadow-2xl hover:shadow-blue-900/10 transition-all duration-500">
                    <div
                        class="w-16 h-16 bg-white shadow-sm rounded-2xl flex items-center justify-center text-secondary mb-6 group-hover:bg-secondary group-hover:text-white group-hover:rotate-6 transition-all duration-500">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 16V6a1 1 0 00-1-1H4a1 1 0 00-1 1v10a1 1 0 001 1h1m8-1a1 1 0 01-1 1H9m4-1V8a1 1 0 011-1h2.586a1 1 0 01.707.293l3.414 3.414a1 1 0 01.293.707V16a1 1 0 01-1 1h-1m-6-1a1 1 0 001 1h1M5 17a2 2 0 104 0m-4 0a2 2 0 114 0m6 0a2 2 0 104 0m-4 0a2 2 0 114 0">
                            </path>
                        </svg>
                    </div>
                    <h4 class="text-lg font-black text-primary mb-3 uppercase tracking-tight">Pengiriman</h4>
                    <p class="text-xs text-slate-500 leading-relaxed font-medium">Produk akan dipacking standar industrial
                        dan dikirim tepat waktu ke lokasi Anda.</p>
                </div>
            </div>
        </div>
    </section>


    <section id="paket" class="py-24 bg-slate-50 relative overflow-hidden" x-data="{ openModal: false, activePackage: {} }">
        <div class="absolute inset-0 opacity-[0.03] pointer-events-none"
            style="background-image: url('https://www.transparenttextures.com/patterns/carbon-fibre.png');"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="flex flex-col md:flex-row justify-between items-end mb-16 gap-6 text-center md:text-left"
                data-aos="fade-up">
                <div class="max-w-xl">
                    <span class="text-secondary font-black text-[10px] uppercase tracking-[0.3em] mb-2 block">Special
                        Bundling</span>
                    <h2 class="text-3xl md:text-4xl font-extrabold text-primary mb-4 tracking-tight">Paket Bundling</h2>
                    <p class="text-slate-500 text-base font-medium">Klik pada paket untuk melihat rincian isi dan deskripsi
                        lengkap.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
                @foreach ($packages as $package)
                    <div @click="openModal = true; activePackage = { 
                            name: '{{ addslashes($package->name) }}', 
                            image: '{{ asset('aset-media/' . $package->image) }}', 
                            {{-- Gunakan json_encode agar karakter 'enter' tidak merusak javascript --}}
                            items: {{ json_encode($package->package_items) }}, 
                            description: {{ json_encode($package->description) }},
                            wa_link: 'https://wa.me/{{ $waNumber->value ?? '' }}?text={{ urlencode($waMessage->value . ' Saya tertarik dengan ' . $package->name) }}'
                        }"
                        class="group bg-white rounded-[3rem] overflow-hidden border border-blue-50 shadow-sm hover:shadow-2xl hover:shadow-blue-900/10 transition-all duration-500 cursor-pointer relative">

                        <div class="relative h-80 overflow-hidden">
                            <img loading="lazy" src="{{ asset('aset-media/' . $package->image) }}"
                                alt="{{ $package->name }}"
                                class="w-full h-full object-cover group-hover:scale-110 transition duration-1000">

                            <div
                                class="absolute inset-0 bg-primary/40 opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-center justify-center">
                                <span
                                    class="bg-white text-primary px-6 py-3 rounded-2xl font-black text-xs uppercase tracking-widest shadow-xl">
                                    Lihat Detail
                                </span>
                            </div>
                        </div>

                        <div class="p-8 text-center bg-white">
                            <h3
                                class="text-xl font-black text-primary group-hover:text-secondary transition-colors duration-300 uppercase tracking-tight">
                                {{ $package->name }}
                            </h3>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        @include('partials.package-modal')
    </section>

    <section id="katalog" class="py-24 bg-slate-50" x-data="{ activeCategory: 'all' }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12" data-aos="fade-up">
                <span class="text-secondary font-black text-[10px] uppercase tracking-[0.3em] mb-2 block">Our
                    Collections</span>
                <h2 class="text-3xl md:text-4xl font-extrabold text-primary mb-4 tracking-tight">Katalog Produk</h2>
                <div class="w-16 h-1.5 bg-secondary mx-auto rounded-full"></div>
            </div>

            <div class="mb-12 overflow-x-auto no-scrollbar pb-4 flex md:justify-center gap-3" data-aos="fade-up">
                <button @click="activeCategory = 'all'"
                    :class="activeCategory === 'all' ? 'bg-secondary text-white shadow-xl shadow-blue-600/20' :
                        'bg-white text-slate-400 border border-blue-100 hover:border-secondary hover:text-secondary'"
                    class="flex-none px-7 py-3 rounded-2xl text-xs font-black uppercase tracking-widest transition-all whitespace-nowrap active:scale-95">
                    Semua
                </button>
                @foreach ($categories as $cat)
                    <button @click="activeCategory = '{{ $cat->slug }}'"
                        :class="activeCategory === '{{ $cat->slug }}' ?
                            'bg-secondary text-white shadow-xl shadow-blue-600/20' :
                            'bg-white text-slate-400 border border-blue-100 hover:border-secondary hover:text-secondary'"
                        class="flex-none px-7 py-3 rounded-2xl text-xs font-black uppercase tracking-widest transition-all whitespace-nowrap active:scale-95">
                        {{ $cat->name }}
                    </button>
                @endforeach
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6">
                @foreach ($products as $product)
                    <div x-show="activeCategory === 'all' || activeCategory === '{{ $product->category->slug ?? '' }}'"
                        x-transition:enter="transition ease-out duration-300"
                        x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                        class="group bg-white rounded-[2rem] border border-blue-50 overflow-hidden hover:border-secondary hover:shadow-2xl hover:shadow-blue-900/10 transition-all duration-500 flex flex-col h-full relative">

                        <div class="relative aspect-[3/4] bg-slate-100 overflow-hidden">
                            <img loading="lazy" src="{{ asset('aset-media/' . $product->image) }}"
                                class="w-full h-full object-cover transition-transform duration-1000 group-hover:scale-110">

                            <div class="absolute top-3 left-3">
                                <span
                                    class="bg-primary/90 backdrop-blur-md text-white text-[9px] font-black px-3 py-1.5 rounded-xl uppercase tracking-widest border border-white/20">
                                    {{ $product->category->name ?? 'Katalog' }}
                                </span>
                            </div>
                        </div>

                        <div class="p-5 flex flex-col flex-grow bg-white border-t border-blue-50/50">
                            <h4
                                class="text-sm md:text-base font-black text-primary leading-tight mb-4 line-clamp-2 h-10 md:h-12 tracking-tight group-hover:text-secondary transition-colors">
                                {{ $product->name }}
                            </h4>

                            <div class="mt-auto flex items-center justify-between gap-2">
                                <div class="flex flex-col">
                                    <span
                                        class="text-[9px] font-black text-secondary uppercase tracking-[0.2em] leading-none mb-1">
                                        Ready Stok
                                    </span>
                                    <span class="text-[10px] font-bold text-slate-400 uppercase tracking-tighter">
                                        Grosir Tangan Pertama
                                    </span>
                                </div>

                                <a href="https://wa.me/{{ $waNumber->value ?? '' }}?text={{ urlencode('Halo KoperGrosir, saya ingin tanya stok untuk: ' . $product->name) }}"
                                    target="_blank"
                                    class="w-12 h-12 rounded-2xl bg-primary text-white flex items-center justify-center shadow-xl shadow-blue-900/10 hover:bg-secondary transition-all duration-300 active:scale-90 flex-shrink-0 group/btn">
                                    <svg class="w-6 h-6 transform group-hover/btn:scale-110 transition-transform"
                                        fill="currentColor" viewBox="0 0 24 24">
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
            <div class="text-center mb-16" data-aos="fade-up">
                <span class="text-secondary font-black text-[10px] uppercase tracking-[0.3em] mb-2 block">Common
                    Inquiries</span>
                <h2 class="text-3xl md:text-4xl font-extrabold text-primary mb-4 tracking-tight">Sering Ditanyakan</h2>
                <div class="w-12 h-1.5 bg-secondary mx-auto rounded-full"></div>
            </div>

            <div class="space-y-4">
                <div class="border border-blue-50 rounded-3xl overflow-hidden shadow-sm transition-all duration-300"
                    :class="selected === 1 ? 'shadow-xl shadow-blue-900/5 border-blue-100' : ''" data-aos="fade-up"
                    data-aos-delay="100">
                    <button @click="selected !== 1 ? selected = 1 : selected = null"
                        class="w-full flex justify-between items-center p-6 text-left hover:bg-blue-50/50 transition-colors group">
                        <span class="font-bold text-sm tracking-tight transition-colors"
                            :class="selected === 1 ? 'text-secondary' : 'text-primary group-hover:text-secondary'">
                            Apakah bisa custom logo travel pada koper?
                        </span>
                        <svg class="w-5 h-5 transition-transform duration-300"
                            :class="[selected === 1 ? 'rotate-180 text-secondary' : 'text-slate-400']" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div class="px-6 pb-6 text-slate-500 text-xs leading-relaxed font-medium" x-show="selected === 1"
                        x-collapse x-cloak>
                        Tentu bisa. Kami menyediakan layanan sablon atau grafir logo instansi/biro travel Anda dengan
                        minimal pemesanan tertentu untuk menjaga kualitas produksi.
                    </div>
                </div>

                <div class="border border-blue-50 rounded-3xl overflow-hidden shadow-sm transition-all duration-300"
                    :class="selected === 2 ? 'shadow-xl shadow-blue-900/5 border-blue-100' : ''" data-aos="fade-up"
                    data-aos-delay="200">
                    <button @click="selected !== 2 ? selected = 2 : selected = null"
                        class="w-full flex justify-between items-center p-6 text-left hover:bg-blue-50/50 transition-colors group">
                        <span class="font-bold text-sm tracking-tight transition-colors"
                            :class="selected === 2 ? 'text-secondary' : 'text-primary group-hover:text-secondary'">
                            Berapa lama estimasi pengiriman partai besar?
                        </span>
                        <svg class="w-5 h-5 transition-transform duration-300"
                            :class="[selected === 2 ? 'rotate-180 text-secondary' : 'text-slate-400']" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div class="px-6 pb-6 text-slate-500 text-xs leading-relaxed font-medium" x-show="selected === 2"
                        x-collapse x-cloak>
                        Untuk stok ready, pengiriman H+1. Untuk custom atau pesanan sangat besar, estimasi 7-14 hari kerja
                        tergantung antrian produksi di gudang kami.
                    </div>
                </div>

                <div class="border border-blue-50 rounded-3xl overflow-hidden shadow-sm transition-all duration-300"
                    :class="selected === 3 ? 'shadow-xl shadow-blue-900/5 border-blue-100' : ''" data-aos="fade-up"
                    data-aos-delay="300">
                    <button @click="selected !== 3 ? selected = 3 : selected = null"
                        class="w-full flex justify-between items-center p-6 text-left hover:bg-blue-50/50 transition-colors group">
                        <span class="font-bold text-sm tracking-tight transition-colors"
                            :class="selected === 3 ? 'text-secondary' : 'text-primary group-hover:text-secondary'">
                            Berapa minimal pemesanan untuk harga grosir?
                        </span>
                        <svg class="w-5 h-5 transition-transform duration-300"
                            :class="[selected === 3 ? 'rotate-180 text-secondary' : 'text-slate-400']" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div class="px-6 pb-6 text-slate-500 text-xs leading-relaxed font-medium" x-show="selected === 3"
                        x-collapse x-cloak>
                        Kami melayani pembelian mulai dari 50 pcs untuk koper standar. Untuk mendapatkan harga grosir
                        terbaik atau pengadaan instansi dalam jumlah kontainer, silakan hubungi admin kami.
                    </div>
                </div>

                <div class="border border-blue-50 rounded-3xl overflow-hidden shadow-sm transition-all duration-300"
                    :class="selected === 4 ? 'shadow-xl shadow-blue-900/5 border-blue-100' : ''" data-aos="fade-up"
                    data-aos-delay="400">
                    <button @click="selected !== 4 ? selected = 4 : selected = null"
                        class="w-full flex justify-between items-center p-6 text-left hover:bg-blue-50/50 transition-colors group">
                        <span class="font-bold text-sm tracking-tight transition-colors"
                            :class="selected === 4 ? 'text-secondary' : 'text-primary group-hover:text-secondary'">
                            Apakah melayani pengiriman ke luar pulau Jawa?
                        </span>
                        <svg class="w-5 h-5 transition-transform duration-300"
                            :class="[selected === 4 ? 'rotate-180 text-secondary' : 'text-slate-400']" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div class="px-6 pb-6 text-slate-500 text-xs leading-relaxed font-medium" x-show="selected === 4"
                        x-collapse x-cloak>
                        Ya, kami melayani pengiriman ke seluruh wilayah Indonesia. Kami bekerja sama dengan berbagai
                        ekspedisi cargo terpercaya (darat, laut, dan udara) untuk memastikan efisiensi logistik bisnis Anda.
                    </div>
                </div>

                <div class="border border-blue-50 rounded-3xl overflow-hidden shadow-sm transition-all duration-300"
                    :class="selected === 5 ? 'shadow-xl shadow-blue-900/5 border-blue-100' : ''" data-aos="fade-up"
                    data-aos-delay="500">
                    <button @click="selected !== 5 ? selected = 5 : selected = null"
                        class="w-full flex justify-between items-center p-6 text-left hover:bg-blue-50/50 transition-colors group">
                        <span class="font-bold text-sm tracking-tight transition-colors"
                            :class="selected === 5 ? 'text-secondary' : 'text-primary group-hover:text-secondary'">
                            Bagaimana kebijakan jika barang diterima rusak?
                        </span>
                        <svg class="w-5 h-5 transition-transform duration-300"
                            :class="[selected === 5 ? 'rotate-180 text-secondary' : 'text-slate-400']" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </button>
                    <div class="px-6 pb-6 text-slate-500 text-xs leading-relaxed font-medium" x-show="selected === 5"
                        x-collapse x-cloak>
                        Kepuasan mitra adalah prioritas kami. Kami memberikan garansi retur jika produk diterima dalam
                        keadaan cacat produksi. Wajib melampirkan video unboxing untuk klaim garansi yang cepat.
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 bg-slate-50 overflow-hidden" id="testimoni">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16" data-aos="fade-up">
                <span class="text-secondary font-black text-[10px] uppercase tracking-[0.3em] mb-2 block">Our
                    Reputation</span>
                <h2 class="text-3xl md:text-4xl font-extrabold text-primary mb-4 tracking-tight">Kepuasan Mitra Kami</h2>
                <div class="w-12 h-1.5 bg-secondary mx-auto rounded-full"></div>
                <p class="text-slate-500 mt-6 text-sm md:text-base max-w-2xl mx-auto">Bukti nyata dedikasi layanan kami
                    melalui pengalaman langsung para mitra dari seluruh penjuru Indonesia.</p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6">
                <div data-aos="fade-up" data-aos-delay="100"
                    class="group relative bg-white rounded-[2.5rem] p-2.5 shadow-sm border border-blue-50 hover:shadow-2xl hover:shadow-blue-900/10 transition-all duration-500 hover:-translate-y-2">
                    <div class="aspect-[9/16] rounded-[2rem] overflow-hidden bg-slate-100">
                        <img loading="lazy" src="{{ asset('testimoni1.png') }}" alt="Testimoni WA"
                            class="w-full h-full object-cover grayscale-[30%] group-hover:grayscale-0 transition duration-700">
                    </div>
                    <div
                        class="absolute bottom-6 left-6 right-6 bg-white/95 backdrop-blur-md p-4 rounded-2xl shadow-xl border border-blue-50 opacity-0 group-hover:opacity-100 transition-all duration-500 translate-y-4 group-hover:translate-y-0">
                        <p class="text-[10px] font-black text-secondary uppercase tracking-widest">Biro Travel Jakarta</p>
                        <p class="text-[10px] font-bold text-primary mt-1 leading-relaxed">"Pengiriman cepat & koper sangat
                            solid!"</p>
                    </div>
                </div>

                <div data-aos="fade-up" data-aos-delay="200"
                    class="group relative bg-white rounded-[2.5rem] p-2.5 shadow-sm border border-blue-50 hover:shadow-2xl hover:shadow-blue-900/10 transition-all duration-500 hover:-translate-y-2">
                    <div class="aspect-[9/16] rounded-[2rem] overflow-hidden bg-slate-100">
                        <img loading="lazy" src="{{ asset('testimoni2.png') }}" alt="Testimoni WA"
                            class="w-full h-full object-cover grayscale-[30%] group-hover:grayscale-0 transition duration-700">
                    </div>
                    <div
                        class="absolute bottom-6 left-6 right-6 bg-white/95 backdrop-blur-md p-4 rounded-2xl shadow-xl border border-blue-50 opacity-0 group-hover:opacity-100 transition-all duration-500 translate-y-4 group-hover:translate-y-0">
                        <p class="text-[10px] font-black text-secondary uppercase tracking-widest">Agen Jawa Timur</p>
                        <p class="text-[10px] font-bold text-primary mt-1 leading-relaxed">"Baru sampai langsung ludes
                            diborong agen."</p>
                    </div>
                </div>

                <div data-aos="fade-up" data-aos-delay="300"
                    class="group relative bg-white rounded-[2.5rem] p-2.5 shadow-sm border border-blue-50 hover:shadow-2xl hover:shadow-blue-900/10 transition-all duration-500 hover:-translate-y-2">
                    <div class="aspect-[9/16] rounded-[2rem] overflow-hidden bg-slate-100">
                        <img loading="lazy" src="{{ asset('testimoni3.png') }}" alt="Testimoni WA"
                            class="w-full h-full object-cover grayscale-[30%] group-hover:grayscale-0 transition duration-700">
                    </div>
                    <div
                        class="absolute bottom-6 left-6 right-6 bg-white/95 backdrop-blur-md p-4 rounded-2xl shadow-xl border border-blue-50 opacity-0 group-hover:opacity-100 transition-all duration-500 translate-y-4 group-hover:translate-y-0">
                        <p class="text-[10px] font-black text-secondary uppercase tracking-widest">Retailer Kalimantan</p>
                        <p class="text-[10px] font-bold text-primary mt-1 leading-relaxed">"Bahan koper aslinya lebih mewah
                            dari foto."</p>
                    </div>
                </div>

                <div data-aos="fade-up" data-aos-delay="400"
                    class="group relative bg-white rounded-[2.5rem] p-2.5 shadow-sm border border-blue-50 hover:shadow-2xl hover:shadow-blue-900/10 transition-all duration-500 hover:-translate-y-2">
                    <div class="aspect-[9/16] rounded-[2rem] overflow-hidden bg-slate-100">
                        <img loading="lazy" src="{{ asset('testimoni4.png') }}" alt="Testimoni WA"
                            class="w-full h-full object-cover grayscale-[30%] group-hover:grayscale-0 transition duration-700">
                    </div>
                    <div
                        class="absolute bottom-6 left-6 right-6 bg-white/95 backdrop-blur-md p-4 rounded-2xl shadow-xl border border-blue-50 opacity-0 group-hover:opacity-100 transition-all duration-500 translate-y-4 group-hover:translate-y-0">
                        <p class="text-[10px] font-black text-secondary uppercase tracking-widest">Mitra Sumatera</p>
                        <p class="text-[10px] font-bold text-primary mt-1 leading-relaxed">"Langganan tetap untuk paket
                            Umroh kami."</p>
                    </div>
                </div>
            </div>

            <div class="mt-16 flex justify-center" data-aos="zoom-in">
                <div
                    class="inline-flex items-center px-8 py-4 bg-white border border-blue-100 rounded-[2rem] shadow-xl shadow-blue-900/5">
                    <div class="flex -space-x-3 mr-5">
                        <div class="w-10 h-10 rounded-full border-2 border-white bg-slate-200 overflow-hidden shadow-sm">
                            <img loading="lazy"
                                src="https://ui-avatars.com/api/?name=Tanto+Hendrianto&background=0F172A&color=fff"
                                alt="">
                        </div>
                        <div class="w-10 h-10 rounded-full border-2 border-white bg-slate-200 overflow-hidden shadow-sm">
                            <img loading="lazy"
                                src="https://ui-avatars.com/api/?name=Rangga+Rafianto&background=2563EB&color=fff"
                                alt="">
                        </div>
                        <div class="w-10 h-10 rounded-full border-2 border-white bg-slate-200 overflow-hidden shadow-sm">
                            <img loading="lazy"
                                src="https://ui-avatars.com/api/?name=Dayat+Mukti&background=0F172A&color=fff"
                                alt="">
                        </div>
                        <div
                            class="w-10 h-10 rounded-full border-2 border-white bg-secondary flex items-center justify-center text-[10px] font-bold text-white shadow-sm italic">
                            +200
                        </div>
                    </div>
                    <div>
                        <p class="text-[10px] font-black text-primary uppercase tracking-[0.2em] leading-none mb-1">Join
                            Our Success</p>
                        <p class="text-xs font-bold text-slate-400 italic leading-none">Mitra terdaftar di seluruh
                            Indonesia</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-12 bg-slate-50 pb-24">
        <div class="max-w-5xl mx-auto px-4">
            <div class="bg-primary rounded-[3rem] p-12 md:p-16 text-center relative overflow-hidden shadow-2xl shadow-blue-900/20"
                data-aos="zoom-in">
                <div
                    class="absolute top-0 left-0 w-64 h-64 bg-secondary/10 rounded-full -translate-x-1/2 -translate-y-1/2 blur-3xl">
                </div>
                <div
                    class="absolute bottom-0 right-0 w-64 h-64 bg-secondary/5 rounded-full translate-x-1/2 translate-y-1/2 blur-3xl">
                </div>

                <div class="relative z-10">
                    <span class="text-secondary font-black text-[10px] uppercase tracking-[0.4em] mb-4 block">Business
                        Opportunity</span>
                    <h2 class="text-3xl md:text-5xl font-extrabold text-white mb-6 tracking-tight">Siap Bekerja Sama <br
                            class="hidden md:block"> dengan Kami?</h2>
                    <p class="text-blue-100/60 mb-10 max-w-lg mx-auto text-sm md:text-base font-medium leading-relaxed">
                        Dapatkan penawaran harga grosir tangan pertama untuk kebutuhan Travel Haji & Umroh atau ekspansi
                        toko retail Anda hari ini.
                    </p>

                    <a href="https://wa.me/{{ $waNumber->value ?? '' }}?text={{ urlencode('Halo KoperGrosir, saya tertarik untuk menjadi mitra distributor.') }}"
                        target="_blank"
                        class="group inline-flex items-center px-12 py-5 bg-white text-primary font-black rounded-2xl hover:bg-secondary hover:text-white transition-all duration-300 shadow-xl active:scale-95 overflow-hidden">
                        <span class="uppercase tracking-widest text-xs">Mulai Kemitraan Sekarang</span>
                        <svg class="w-5 h-5 ml-3 transform group-hover:translate-x-2 transition-transform" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3"
                                d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </a>

                    <p class="mt-8 text-[10px] font-bold text-slate-500 uppercase tracking-[0.2em]">Konsultasi Gratis •
                        Respon Cepat • Harga Pabrik</p>
                </div>
            </div>
        </div>
    </section>

    <div class="fixed bottom-8 right-8 z-[100] flex flex-col gap-4">

        <a href="https://www.instagram.com/akmjakarta.id/" target="_blank"
            class="bg-blue-600 text-white p-4 rounded-full shadow-2xl hover:bg-blue-700 transition duration-300 hover:scale-110 active:scale-90 group relative flex items-center justify-center">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                <path
                    d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
            </svg>
            <span
                class="absolute right-full mr-4 bg-white text-blue-900 px-4 py-2 rounded-lg text-xs font-bold whitespace-nowrap opacity-0 group-hover:opacity-100 transition-all shadow-xl pointer-events-none border border-blue-50">
                Follow Instagram
            </span>
        </a>

        <a href="https://wa.me/{{ $waNumber->value ?? '' }}" target="_blank"
            class="bg-green-500 text-white p-4 rounded-full shadow-2xl hover:bg-green-600 transition duration-300 hover:scale-110 active:scale-90 group relative flex items-center justify-center">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                <path
                    d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z" />
            </svg>
            <span
                class="absolute right-full mr-4 bg-white text-slate-900 px-4 py-2 rounded-lg text-xs font-bold whitespace-nowrap opacity-0 group-hover:opacity-100 transition-all shadow-xl pointer-events-none border border-gray-50">
                Hubungi Kami
            </span>
        </a>

    </div>
@endsection
