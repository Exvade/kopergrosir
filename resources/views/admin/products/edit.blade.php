@extends('layouts.admin')

@section('title', 'Edit Produk: ' . $product->name)

@section('content')
    <div class="max-w-4xl mx-auto" x-data="{ isPackage: {{ $product->is_package ? 'true' : 'false' }} }">
        <div class="mb-6">
            <a href="{{ route('products.index') }}" class="text-blue-600 hover:underline flex items-center">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
                    </path>
                </svg>
                Kembali
            </a>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
            <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data"
                class="p-8">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <div class="space-y-4">
                        <label class="block text-sm font-bold text-gray-700">Foto Produk</label>
                        <div class="relative border-2 border-dashed border-gray-300 rounded-2xl p-4 text-center">
                            <input type="file" name="image"
                                class="absolute inset-0 w-full h-full opacity-0 cursor-pointer"
                                onchange="previewImage(event)">
                            <img id="image-preview" src="{{ asset('storage/' . $product->image) }}"
                                class="mx-auto max-h-64 rounded-xl shadow-md">
                            <p class="text-xs text-gray-400 mt-2">Klik gambar untuk mengganti foto</p>
                        </div>

                        <div class="pt-4">
                            <label
                                class="flex items-center space-x-3 cursor-pointer p-3 bg-blue-50 rounded-lg border border-blue-100">
                                <input type="checkbox" name="is_featured" value="1"
                                    {{ $product->is_featured ? 'checked' : '' }} class="w-5 h-5 text-blue-600 rounded">
                                <span class="text-sm font-bold text-blue-800">Tampilkan di Highlight Depan</span>
                            </label>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">Nama Produk / Paket</label>
                            <input type="text" name="name" value="{{ old('name', $product->name) }}"
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">Kategori</label>
                            <select name="category_id"
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">Harga (Rp)</label>
                            <input type="number" name="price" value="{{ old('price', $product->price) }}"
                                class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
                        </div>

                        <div>
                            <label class="flex items-center space-x-3 cursor-pointer mb-4">
                                <input type="checkbox" name="is_package" x-model="isPackage" value="1"
                                    {{ $product->is_package ? 'checked' : '' }} class="w-5 h-5 text-blue-600 rounded">
                                <span class="text-sm font-bold text-gray-700">Ini adalah Produk Paket</span>
                            </label>

                            <div x-show="isPackage" x-transition class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                                <label class="block text-sm font-bold text-gray-700 mb-1">Daftar Isi Paket</label>
                                <textarea name="package_items" rows="3"
                                    class="w-full px-4 py-2 border rounded-lg outline-none focus:ring-2 focus:ring-blue-500 bg-white">{{ old('package_items', $product->package_items) }}</textarea>
                            </div>

                            <div x-show="!isPackage" x-transition class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-1">Ukuran</label>
                                    <input type="text" name="size" value="{{ old('size', $product->size) }}"
                                        class="w-full px-4 py-2 border rounded-lg outline-none focus:ring-2 focus:ring-blue-500">
                                </div>
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-1">Bahan</label>
                                    <input type="text" name="material" value="{{ old('material', $product->material) }}"
                                        class="w-full px-4 py-2 border rounded-lg outline-none focus:ring-2 focus:ring-blue-500">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-6">
                    <label class="block text-sm font-bold text-gray-700 mb-1">Deskripsi</label>
                    <textarea name="description" rows="4"
                        class="w-full px-4 py-2 border rounded-lg outline-none focus:ring-2 focus:ring-blue-500">{{ old('description', $product->description) }}</textarea>
                </div>

                <div class="mt-8 flex justify-end">
                    <button type="submit"
                        class="bg-blue-600 text-white px-10 py-3 rounded-xl font-bold hover:bg-blue-700 transition shadow-lg shadow-blue-500/30">
                        Update Katalog
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
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endsection
