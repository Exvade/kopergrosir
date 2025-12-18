@extends('layouts.admin')

@section('title', 'Edit Product' . $product->name)

@section('content')
    <div class="max-w-4xl mx-auto">
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

                            <div id="placeholder" class="{{ $product->image ? 'hidden' : '' }}">
                                <p class="text-sm text-gray-500">Klik untuk ganti foto</p>
                            </div>

                            <img id="image-preview" src="{{ $product->image ? asset('storage/' . $product->image) : '#' }}"
                                class="{{ $product->image ? '' : 'hidden' }} mx-auto max-h-64 rounded-xl shadow-md">
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">Nama Koper</label>
                            <input type="text" name="name" value="{{ old('name', $product->name) }}"
                                class="w-full px-4 py-3 bg-gray-50 border rounded-xl outline-none focus:ring-2 focus:ring-blue-500">
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-1">Harga (Rp)</label>
                                <input type="number" name="price" value="{{ old('price', $product->price) }}"
                                    class="w-full px-4 py-3 bg-gray-50 border rounded-xl outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-1">Stok</label>
                                <input type="number" name="stock" value="{{ old('stock', $product->stock) }}"
                                    class="w-full px-4 py-3 bg-gray-50 border rounded-xl outline-none focus:ring-2 focus:ring-blue-500">
                            </div>
                        </div>

                        <div>
                            <label class="block text-sm font-bold text-gray-700 mb-1">Ukuran</label>
                            <select name="size"
                                class="w-full px-4 py-3 bg-gray-50 border rounded-xl outline-none focus:ring-2 focus:ring-blue-500">
                                <option value="20 Inch" {{ $product->size == '20 Inch' ? 'selected' : '' }}>20 Inch</option>
                                <option value="24 Inch" {{ $product->size == '24 Inch' ? 'selected' : '' }}>24 Inch</option>
                                <option value="28 Inch" {{ $product->size == '28 Inch' ? 'selected' : '' }}>28 Inch
                                </option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="mt-6">
                    <label class="block text-sm font-bold text-gray-700 mb-1">Deskripsi</label>
                    <textarea name="description" rows="4"
                        class="w-full px-4 py-3 bg-gray-50 border rounded-xl outline-none focus:ring-2 focus:ring-blue-500">{{ old('description', $product->description) }}</textarea>
                </div>

                <div class="mt-8 flex justify-end">
                    <button type="submit"
                        class="bg-blue-600 text-white px-10 py-3 rounded-xl font-bold hover:bg-blue-700 transition shadow-lg shadow-blue-500/30">
                        Simpan Perubahan
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
                output.classList.remove('hidden');
                document.getElementById('placeholder').classList.add('hidden');
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endsection
