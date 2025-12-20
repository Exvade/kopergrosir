@extends('layouts.admin')

@section('title', 'Tambah Paket Bundling Baru')

@section('content')
    <div class="max-w-4xl mx-auto">
        <div class="mb-6">
            <a href="{{ route('products.index') }}" class="text-blue-600 hover:underline flex items-center font-medium">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
                    </path>
                </svg>
                Kembali ke Daftar Katalog
            </a>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
            <form action="{{ route('packages.store') }}" method="POST" enctype="multipart/form-data" class="p-8">
                @csrf

                <input type="hidden" name="is_package" value="1">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-6">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-2">Foto Paket</label>
                            <div class="relative border-2 border-dashed border-gray-300 rounded-2xl p-4 text-center hover:border-blue-400 transition group"
                                id="drop-area">
                                <input type="file" name="image" id="image-input" required
                                    class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" accept="image/*"
                                    onchange="previewImage(event)">

                                <div id="placeholder">
                                    <div
                                        class="w-16 h-16 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-3 group-hover:bg-blue-50 transition">
                                        <svg class="h-8 w-8 text-gray-400 group-hover:text-blue-500" stroke="currentColor"
                                            fill="none" viewBox="0 0 48 48">
                                            <path
                                                d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </div>
                                    <p class="text-sm font-medium text-gray-600">Upload Gambar Paket</p>
                                    <p class="text-xs text-gray-400 italic mt-1">PNG, JPG up to 2MB</p>
                                </div>

                                <img id="image-preview"
                                    class="hidden mx-auto max-h-64 rounded-xl shadow-md border border-gray-100">
                            </div>
                            @error('image')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="bg-blue-50 p-4 rounded-xl border border-blue-100">
                            <label class="flex items-center space-x-3 cursor-pointer">
                                <input type="checkbox" name="is_featured" value="1"
                                    class="w-5 h-5 text-blue-600 rounded border-gray-300 focus:ring-blue-500">
                                <div>
                                    <span class="block text-sm font-bold text-blue-900">Featured Package</span>
                                    <span class="block text-[10px] text-blue-700">Tampilkan di bagian atas halaman
                                        utama.</span>
                                </div>
                            </label>
                        </div>
                    </div>

                    <div class="space-y-5">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">Nama Paket Bundling</label>
                            <input type="text" name="name" value="{{ old('name') }}" required
                                placeholder="Contoh: Paket Silver (Koper + Tas Passport)"
                                class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:bg-white outline-none transition-all">
                            @error('name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">Kategori</label>
                            <select name="category_id" required
                                class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:bg-white outline-none appearance-none transition-all">
                                <option value="">-- Pilih Kategori --</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">Harga Paket (Rp)</label>
                            <input type="number" name="price" value="{{ old('price') }}" required placeholder="2500000"
                                class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:bg-white outline-none transition-all">
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">Daftar Isi Paket</label>
                            <textarea name="package_items" rows="4" required
                                placeholder="Contoh: &#10;1x Koper 24 Inch&#10;1x Tas Passport Premium&#10;1x Bantal Leher Travel"
                                class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:bg-white outline-none transition-all">{{ old('package_items') }}</textarea>
                            <p class="text-[10px] text-gray-400 mt-1 italic">*Gunakan baris baru atau koma untuk memisahkan
                                item.</p>
                        </div>
                    </div>
                </div>

                <div class="mt-8 pt-6 border-t border-gray-100">
                    <label class="block text-sm font-bold text-gray-700 mb-1">Deskripsi Tambahan</label>
                    <textarea name="description" rows="4" placeholder="Jelaskan detail garansi atau informasi pengiriman paket ini..."
                        class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-blue-500 focus:bg-white outline-none transition-all">{{ old('description') }}</textarea>
                </div>

                <div class="mt-8 flex justify-end">
                    <button type="submit"
                        class="bg-slate-900 text-white px-10 py-3.5 rounded-xl font-bold hover:bg-slate-800 transition shadow-lg shadow-gray-200 active:scale-[0.98]">
                        Simpan Produk Paket
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById('image-preview');
                const placeholder = document.getElementById('placeholder');
                output.src = reader.result;
                output.classList.remove('hidden');
                placeholder.classList.add('hidden');
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endsection
