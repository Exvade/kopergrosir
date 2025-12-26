@extends('layouts.admin')

@section('title', 'Dashboard Overview')

@section('content')

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div
            class="bg-white p-6 rounded-[2rem] shadow-sm border border-blue-50 flex items-center group hover:border-blue-500 transition-all duration-300">
            <div
                class="p-4 rounded-2xl bg-blue-100 text-blue-600 mr-4 group-hover:bg-blue-600 group-hover:text-white transition-all">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                </svg>
            </div>
            <div>
                <p class="text-xs font-black text-slate-400 uppercase tracking-widest">Produk Satuan</p>
                <h3 class="text-3xl font-black text-blue-900">{{ $totalProducts }}</h3>
            </div>
        </div>

        <div
            class="bg-white p-6 rounded-[2rem] shadow-sm border border-blue-50 flex items-center group hover:border-violet-500 transition-all duration-300">
            <div
                class="p-4 rounded-2xl bg-violet-100 text-violet-600 mr-4 group-hover:bg-violet-600 group-hover:text-white transition-all">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10">
                    </path>
                </svg>
            </div>
            <div>
                <p class="text-xs font-black text-slate-400 uppercase tracking-widest">Paket Bundling</p>
                <h3 class="text-3xl font-black text-violet-900">{{ $totalPackages }}</h3>
            </div>
        </div>

        <div
            class="bg-white p-6 rounded-[2rem] shadow-sm border border-blue-50 flex items-center group hover:border-amber-500 transition-all duration-300">
            <div
                class="p-4 rounded-2xl bg-amber-100 text-amber-600 mr-4 group-hover:bg-amber-600 group-hover:text-white transition-all">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                    </path>
                </svg>
            </div>
            <div>
                <p class="text-xs font-black text-slate-400 uppercase tracking-widest">Paket Unggulan</p>
                <h3 class="text-3xl font-black text-amber-900">{{ $featuredPackages }}</h3>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-[2.5rem] shadow-sm border border-blue-50 p-8 md:p-12 relative overflow-hidden">
        <div class="absolute -top-10 -right-10 w-64 h-64 bg-blue-50 rounded-full opacity-50"></div>

        <div class="relative z-10 max-w-2xl">
            <h2 class="text-3xl font-black text-blue-900 mb-4">Selamat Datang, {{ Auth::user()->name }}! 👋</h2>
            <p class="text-blue-800/60 leading-relaxed mb-10 font-medium">
                Panel ini dirancang untuk memudahkan Anda mengelola stok koper dan paket bundling Umroh/Haji.
                Pantau statistik katalog Anda dan pastikan promosi di halaman depan selalu terupdate.
            </p>

            <div class="flex flex-wrap gap-4">
                <a href="{{ route('admin.products.index') }}"
                    class="inline-flex items-center px-8 py-3.5 bg-blue-600 text-white rounded-2xl hover:bg-blue-700 transition shadow-xl shadow-blue-900/10 font-bold text-sm">
                    Kelola Produk Satuan
                </a>
                <a href="{{ route('admin.packages.index') }}"
                    class="inline-flex items-center px-8 py-3.5 bg-violet-600 text-white rounded-2xl hover:bg-violet-700 transition shadow-xl shadow-violet-900/10 font-bold text-sm">
                    Kelola Paket Bundling
                </a>
                <a href="{{ route('admin.settings.index') }}"
                    class="inline-flex items-center px-8 py-3.5 bg-slate-50 text-slate-600 border border-slate-200 rounded-2xl hover:bg-white transition font-bold text-sm">
                    Pengaturan WA
                </a>
            </div>
        </div>
    </div>

    <div class="mt-8 grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-blue-900 rounded-[2rem] p-8 text-white relative overflow-hidden group">
            <div class="absolute top-0 right-0 p-4 opacity-10 group-hover:scale-125 transition-transform duration-500">
                <svg class="w-32 h-32" fill="currentColor" viewBox="0 0 24 24">
                    <path
                        d="M12 2l3.09 6.26L22 9.27l-5 4.87 1.18 6.88L12 17.77l-6.18 3.25L7 14.14 2 9.27l6.91-1.01L12 2z" />
                </svg>
            </div>
            <h4 class="font-black text-blue-200 uppercase tracking-widest text-xs mb-4">💡 Tips Pengelolaan</h4>
            <ul class="space-y-4">
                <li class="flex items-start gap-3 text-sm font-medium">
                    <span
                        class="w-5 h-5 bg-blue-700 rounded-full flex items-center justify-center shrink-0 text-[10px]">1</span>
                    Pastikan gambar paket bundling menampilkan semua item yang didapat agar menarik minat biro travel.
                </li>
                <li class="flex items-start gap-3 text-sm font-medium">
                    <span
                        class="w-5 h-5 bg-blue-700 rounded-full flex items-center justify-center shrink-0 text-[10px]">2</span>
                    Gunakan fitur "Featured" hanya untuk paket yang paling laku atau sedang promo.
                </li>
                <li class="flex items-start gap-3 text-sm font-medium">
                    <span
                        class="w-5 h-5 bg-blue-700 rounded-full flex items-center justify-center shrink-0 text-[10px]">3</span>
                    Cek berkala pesan WhatsApp yang masuk untuk memastikan respon cepat ke calon pembeli.
                </li>
            </ul>
        </div>
    </div>
@endsection
