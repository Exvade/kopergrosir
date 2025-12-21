@extends('layouts.admin')

@section('title', 'Manajemen Banner Promo')

@section('content')
    <div class="max-w-6xl mx-auto">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <div class="lg:col-span-1">
                <div class="bg-white rounded-3xl shadow-sm border border-gray-200 p-6 sticky top-24">
                    <h3 class="text-lg font-bold text-slate-900 mb-4">Upload Banner Baru</h3>

                    <form action="{{ route('banners.store') }}" method="POST" enctype="multipart/form-data"
                        x-data="{ uploading: false, previewUrl: null }" @submit="uploading = true">
                        @csrf
                        <div class="space-y-5">
                            <div>
                                <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Judul /
                                    Alt Text</label>
                                <input type="text" name="title" value="{{ old('title') }}"
                                    placeholder="Contoh: Promo Umroh Januari"
                                    class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none transition-all"
                                    required>
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">File
                                    Gambar (Banner)</label>
                                <div
                                    class="relative border-2 border-dashed border-gray-200 rounded-xl p-4 text-center hover:bg-gray-50 transition min-h-[150px] flex items-center justify-center overflow-hidden">

                                    <input type="file" name="image"
                                        class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10"
                                        accept="image/*" required
                                        @change="const file = $event.target.files[0]; if (file) { previewUrl = URL.createObjectURL(file) }">

                                    <div x-show="!previewUrl" class="text-gray-400">
                                        <svg class="mx-auto h-8 w-8 mb-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                        <p class="text-[10px]">Klik untuk pilih gambar</p>
                                    </div>

                                    <template x-if="previewUrl">
                                        <div class="relative w-full h-full">
                                            <img :src="previewUrl" class="rounded-lg object-cover w-full max-h-40">
                                            <div
                                                class="absolute inset-0 bg-black/20 flex items-center justify-center opacity-0 hover:opacity-100 transition-opacity">
                                                <span class="text-white text-[10px] font-bold">Ganti Gambar</span>
                                            </div>
                                        </div>
                                    </template>
                                </div>
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Link
                                    Tujuan (Opsional)</label>
                                <input type="url" name="link" value="{{ old('link') }}"
                                    placeholder="https://wa.me/..."
                                    class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none transition-all">
                            </div>

                            <div class="flex items-center p-3 bg-blue-50 rounded-xl border border-blue-100">
                                <input type="checkbox" name="is_active" value="1" checked
                                    class="w-4 h-4 text-blue-600 rounded">
                                <span class="ml-2 text-xs font-bold text-blue-800">Aktifkan Sekarang</span>
                            </div>

                            <button type="submit" :disabled="uploading"
                                class="w-full py-4 bg-slate-900 text-white rounded-2xl font-bold hover:bg-slate-800 transition shadow-lg shadow-gray-200 disabled:opacity-50 disabled:cursor-not-allowed flex items-center justify-center">

                                <template x-if="!uploading">
                                    <span>Simpan & Upload</span>
                                </template>

                                <template x-if="uploading">
                                    <div class="flex items-center">
                                        <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" fill="none"
                                            viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10"
                                                stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor"
                                                d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z">
                                            </path>
                                        </svg>
                                        <span>Memproses...</span>
                                    </div>
                                </template>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="lg:col-span-2">
                <div class="bg-white rounded-3xl shadow-sm border border-gray-200 overflow-hidden">
                    <div class="bg-gray-50 px-8 py-5 border-b border-gray-100 flex justify-between items-center">
                        <h3 class="font-bold text-slate-800">Riwayat Banner</h3>
                        <span
                            class="text-[10px] bg-slate-200 px-2 py-1 rounded-full font-bold text-slate-600">{{ $banners->count() }}
                            Total</span>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-gray-50/50">
                                    <th class="px-8 py-4 text-[10px] font-bold text-gray-400 uppercase tracking-widest">
                                        Preview & Info</th>
                                    <th
                                        class="px-8 py-4 text-[10px] font-bold text-gray-400 uppercase tracking-widest text-center">
                                        Status</th>
                                    <th
                                        class="px-8 py-4 text-[10px] font-bold text-gray-400 uppercase tracking-widest text-right">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @forelse($banners as $banner)
                                    <tr class="hover:bg-gray-50/50 transition duration-300">
                                        <td class="px-8 py-4">
                                            <div class="flex items-center gap-4">
                                                <div
                                                    class="w-24 h-14 rounded-lg overflow-hidden border border-gray-100 bg-gray-50">
                                                    <img src="{{ asset('storage/' . $banner->image) }}"
                                                        class="w-full h-full object-cover">
                                                </div>
                                                <div class="max-w-[150px]">
                                                    <p class="text-sm font-bold text-slate-800 truncate">
                                                        {{ $banner->title }}</p>
                                                    @if ($banner->link)
                                                        <a href="{{ $banner->link }}" target="_blank"
                                                            class="text-[10px] text-blue-500 hover:underline flex items-center gap-1">
                                                            Link Aktif <svg class="w-2 h-2" fill="none"
                                                                stroke="currentColor" viewBox="0 0 24 24">
                                                                <path
                                                                    d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14">
                                                                </path>
                                                            </svg>
                                                        </a>
                                                    @else
                                                        <span class="text-[10px] text-gray-400">Tanpa Link</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-8 py-4 text-center">
                                            <form action="{{ route('banners.update', $banner->id) }}" method="POST">
                                                @csrf @method('PUT')
                                                <input type="hidden" name="title" value="{{ $banner->title }}">
                                                <button type="submit" name="is_active"
                                                    value="{{ $banner->is_active ? 0 : 1 }}"
                                                    class="px-3 py-1 rounded-full text-[10px] font-bold transition-all {{ $banner->is_active ? 'bg-green-100 text-green-700' : 'bg-gray-100 text-gray-400' }}">
                                                    {{ $banner->is_active ? '● AKTIF' : '○ NONAKTIF' }}
                                                </button>
                                            </form>
                                        </td>
                                        <td class="px-8 py-4 text-right">
                                            <form action="{{ route('banners.destroy', $banner->id) }}" method="POST"
                                                id="del-{{ $banner->id }}">
                                                @csrf @method('DELETE')
                                                <button type="button" onclick="confirmDelete({{ $banner->id }})"
                                                    class="p-2 text-gray-300 hover:text-red-500 transition">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                        </path>
                                                    </svg>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3"
                                            class="px-8 py-12 text-center text-gray-400 text-sm italic italic">Belum ada
                                            banner promo yang diunggah.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
