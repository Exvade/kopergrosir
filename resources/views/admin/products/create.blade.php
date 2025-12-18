@extends('layouts.admin')

@section('title', 'Tambah Koper Baru')

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

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-4">
                        <label class="block text-sm font-semibold text-gray-700">Foto Koper</label>
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
                    </div>

                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Nama Produk</label>
                            <input type="text" name="name" value="{{ old('name') }}"
                                placeholder="Contoh: Koper Rimowa Classic Silver"
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none @error('name') border-red-500 @enderror">
                            @error('name')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1">Harga (Rp)</label>
                                <input type="number" name="price" value="{{ old('price') }}" placeholder="1500000"
                                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1">Stok (Pcs)</label>
                                <input type="number" name="stock" value="{{ old('stock') }}" placeholder="10"
                                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1">Ukuran</label>
                                <select name="size"
                                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none appearance-none">
                                    <option value="20 Inch">20 Inch (Cabin)</option>
                                    <option value="24 Inch">24 Inch (Medium)</option>
                                    <option value="28 Inch">28 Inch (Large)</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1">Bahan</label>
                                <input type="text" name="material" value="{{ old('material') }}"
                                    placeholder="Contoh: ABS + Polycarbonate"
                                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-6">
                    <label class="block text-sm font-semibold text-gray-700 mb-1">Deskripsi Produk</label>
                    <textarea name="description" rows="4" placeholder="Jelaskan keunggulan koper ini..."
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">{{ old('description') }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mt-8 flex justify-end">
                    <button type="submit"
                        class="bg-blue-600 text-white px-8 py-3 rounded-lg font-bold hover:bg-blue-700 transition shadow-lg">
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
