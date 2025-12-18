@extends('layouts.admin')

@section('title', 'Tambah Produk Baru')

@section('content')
    <div class="max-w-4xl mx-auto">
        <div class="mb-6">
            <a href="{{ route('products.index') }}" class="text-blue-600 hover:underline flex items-center">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
                    </path>
                </svg>
                Kembali ke Daftar Produk
            </a>
        </div>

        <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="p-8">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-4">
                        <label class="block text-sm font-bold text-gray-700">Foto Produk</label>
                        <div class="relative border-2 border-dashed border-gray-300 rounded-xl p-4 text-center hover:border-blue-400 transition"
                            id="drop-area">
                            <input type="file" name="image" id="image-input"
                                class="absolute inset-0 w-full h-full opacity-0 cursor-pointer" accept="image/*"
                                onchange="previewImage(event)">

                            <div id="placeholder">
                                <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                                    viewBox="0 0 48 48">
                                    <path
                                        d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <p class="mt-1 text-sm text-gray-600">Klik atau seret gambar ke sini</p>
                                <p class="text-xs text-gray-500 italic">PNG, JPG up to 2MB</p>
                            </div>

                            <img id="image-preview" class="hidden mx-auto max-h-64 rounded-lg shadow-sm">
                        </div>
                        @error('image')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror

                        <div class="pt-4">
                            <label
                                class="flex items-center space-x-3 cursor-pointer p-3 bg-blue-50 rounded-lg border border-blue-100">
                                <input type="checkbox" name="is_featured" value="1"
                                    class="w-5 h-5 text-blue-600 rounded focus:ring-blue-500">
                                <span class="text-sm font-bold text-blue-800">Tampilkan di Highlight Depan (Featured)</span>
                            </label>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">Nama Produk / Paket</label>
                            <input type="text" name="name" value="{{ old('name') }}"
                                placeholder="Contoh: Paket Silver Umroh"
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none @error('name') border-red-500 @enderror">
                            @error('name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">Kategori</label>
                            <select name="category_id"
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
                                <option value="">-- Pilih Kategori --</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">Harga (Rp)</label>
                            <input type="number" name="price" value="{{ old('price') }}" placeholder="1500000"
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
                        </div>

                        <div x-data="{ isPackage: {{ old('is_package') ? 'true' : 'false' }} }">
                            <label class="flex items-center space-x-3 cursor-pointer mb-4">
                                <input type="checkbox" name="is_package" x-model="isPackage" value="1"
                                    class="w-5 h-5 text-blue-600 rounded">
                                <span class="text-sm font-bold text-gray-700">Ini adalah Produk Paket (Bundling)</span>
                            </label>

                            <div x-show="isPackage" x-cloak x-transition
                                class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                                <label class="block text-sm font-bold text-gray-700 mb-1">Daftar Isi Paket</label>
                                <textarea name="package_items" rows="3"
                                    placeholder="Contoh: 1x Koper, 1x Tas Passport, 1x ID Card, 1x Bantal Leher"
                                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none bg-white">{{ old('package_items') }}</textarea>
                                <p class="text-[10px] text-gray-500 mt-1">*Pisahkan dengan koma atau baris baru</p>
                            </div>

                            <div x-show="!isPackage" x-transition class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-1">Ukuran</label>
                                    <input type="text" name="size" value="{{ old('size') }}"
                                        placeholder="Contoh: 24 Inch"
                                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-1">Bahan</label>
                                    <input type="text" name="material" value="{{ old('material') }}"
                                        placeholder="Contoh: Fiber ABS"
                                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-6">
                    <label class="block text-sm font-bold text-gray-700 mb-1">Deskripsi Lengkap</label>
                    <textarea name="description" rows="4" placeholder="Jelaskan detail produk atau paket ini..."
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-8 flex justify-end">
                    <button type="submit"
                        class="bg-blue-600 text-white px-10 py-3 rounded-xl font-bold hover:bg-blue-700 transition shadow-lg shadow-blue-500/30">
                        Simpan ke Katalog
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
