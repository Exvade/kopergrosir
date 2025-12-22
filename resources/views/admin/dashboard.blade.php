@extends('layouts.admin')

@section('title', 'Dashboard Overview')

@section('content')

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex items-center">
            <div class="p-3 rounded-full bg-blue-100 text-blue-600 mr-4">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                </svg>
            </div>
            <div>
                <p class="text-sm text-gray-500 font-medium">Total Produk Koper</p>
                <h3 class="text-2xl font-bold text-gray-800">12</h3>
            </div>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex items-center">
            <div class="p-3 rounded-full bg-red-100 text-red-600 mr-4">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z">
                    </path>
                </svg>
            </div>
            <div>
                <p class="text-sm text-gray-500 font-medium">Stok Habis</p>
                <h3 class="text-2xl font-bold text-gray-800">2</h3>
            </div>
        </div>

        <div class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 flex items-center">
            <div class="p-3 rounded-full bg-green-100 text-green-600 mr-4">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                    </path>
                </svg>
            </div>
            <div>
                <p class="text-sm text-gray-500 font-medium">Link Click-through</p>
                <h3 class="text-2xl font-bold text-gray-800">45</h3>
            </div>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-8">
        <div class="max-w-2xl">
            <h2 class="text-2xl font-bold text-gray-800 mb-4">Selamat Datang, {{ Auth::user()->name }}! 👋</h2>
            <p class="text-gray-600 leading-relaxed mb-6">
                Di panel ini, Anda bisa mengelola katalog koper, mengubah informasi harga, hingga mengatur tampilan promosi
                di halaman depan website.
            </p>

            <div class="flex gap-4">
                <a href="{{ route('products.index') }}"
                    class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition font-medium">
                    Kelola Produk
                </a>
                <a href="/admin/settings"
                    class="inline-flex items-center px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200 transition font-medium">
                    Pengaturan WA
                </a>
            </div>
        </div>
    </div>

    <div class="mt-8 grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="bg-blue-50 border border-blue-100 rounded-xl p-6">
            <h4 class="font-bold text-blue-800 mb-2 underline">Tips Hari Ini</h4>
            <ul class="list-disc list-inside text-blue-700 space-y-2 text-sm">
                <li>Pastikan foto koper memiliki pencahayaan yang terang.</li>
                <li>Gunakan judul yang spesifik (contoh: Koper Fiber Anti Pecah 24 Inch).</li>
                <li>Update stok secara berkala agar tidak mengecewakan pembeli di WA.</li>
            </ul>
        </div>
    </div>
@endsection
