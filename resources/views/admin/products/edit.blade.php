@extends('layouts.admin')

@section('title', 'Edit Produk: ' . $product->name)

@section('content')
    <div class="max-w-4xl mx-auto" x-data="{ isPackage: {{ $product->is_package ? 'true' : 'false' }} }">
        <div class="mb-6">
            <a href="{{ route('products.index') }}"
                class="text-slate-600 hover:text-slate-900 flex items-center gap-1 transition-colors">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
                    </path>
                </svg>
                Kembali ke Daftar Produk
            </a>
        </div>

        <div class="bg-white rounded-3xl shadow-sm border border-gray-200 p-8">
            <h2 class="text-2xl font-bold text-slate-900 mb-6">Edit Produk: <span
                    class="text-slate-600">{{ $product->name }}</span></h2>

            <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-6">
                    <div class="space-y-6">
                        <div>
                            <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Foto
                                Produk</label>
                            <div
                                class="relative border-2 border-dashed border-gray-200 rounded-xl p-4 text-center hover:bg-gray-50 transition min-h-[150px] flex items-center justify-center overflow-hidden">
                                <input type="file" name="image" id="image"
                                    class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10" accept="image/*"
                                    onchange="previewImage(event)">
                                <img id="image-preview" src="{{ asset('aset-media/' . $product->image) }}"
                                    class="mx-auto max-h-64 rounded-xl shadow-md object-cover">
                                <p class="text-[10px] text-gray-400 mt-2 absolute bottom-2 left-0 right-0">Klik gambar untuk
                                    mengganti foto</p>
                            </div>
                        </div>

                        <div class="pt-2">
                            <label
                                class="flex items-center space-x-3 cursor-pointer p-3 bg-gray-50 rounded-xl border border-gray-200">
                                <input type="checkbox" name="is_featured" value="1"
                                    {{ $product->is_featured ? 'checked' : '' }}
                                    class="w-5 h-5 text-slate-900 rounded focus:ring-slate-900">
                                <span class="text-sm font-bold text-slate-700">Tampilkan di Highlight Depan</span>
                            </label>
                        </div>
                    </div>

                    <div class="space-y-5">
                        <div>
                            <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Nama Produk
                                / Paket</label>
                            <input type="text" name="name" value="{{ old('name', $product->name) }}"
                                class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-slate-900 outline-none transition-all"
                                required>
                        </div>

                        <div>
                            <label
                                class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Kategori</label>
                            <select name="category_id"
                                class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-slate-900 outline-none transition-all"
                                required>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $product->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Harga
                                (Rp)</label>
                            <input type="number" name="price" value="{{ old('price', $product->price) }}"
                                class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-slate-900 outline-none transition-all"
                                required>
                        </div>

                        <div>
                            <label class="flex items-center space-x-3 cursor-pointer mb-2">
                                <input type="checkbox" name="is_package" x-model="isPackage" value="1"
                                    class="w-5 h-5 text-slate-900 rounded focus:ring-slate-900">
                                <span class="text-sm font-bold text-gray-700">Ini adalah Produk Paket</span>
                            </label>

                            <div x-show="isPackage" x-transition.opacity
                                class="bg-gray-50 p-4 rounded-xl border border-gray-200 mt-2">
                                <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Daftar
                                    Isi Paket (pisahkan dengan koma)</label>
                                <textarea name="package_items" rows="3"
                                    class="w-full px-4 py-2.5 bg-white border border-gray-200 rounded-xl outline-none focus:ring-2 focus:ring-slate-900">{{ old('package_items', $product->package_items) }}</textarea>
                            </div>

                            <div x-show="!isPackage" x-transition.opacity class="grid grid-cols-2 gap-4 mt-2">
                                <div>
                                    <label
                                        class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Ukuran</label>
                                    <input type="text" name="size" value="{{ old('size', $product->size) }}"
                                        class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl outline-none focus:ring-2 focus:ring-slate-900">
                                </div>
                                <div>
                                    <label
                                        class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Bahan</label>
                                    <input type="text" name="material" value="{{ old('material', $product->material) }}"
                                        class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl outline-none focus:ring-2 focus:ring-slate-900">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-6">
                    <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Deskripsi</label>
                    <textarea name="description" rows="5"
                        class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl outline-none focus:ring-2 focus:ring-slate-900">{{ old('description', $product->description) }}</textarea>
                </div>

                <div class="mt-8 flex justify-end">
                    <button type="submit"
                        class="bg-slate-900 text-white px-10 py-3 rounded-2xl font-bold hover:bg-slate-800 transition shadow-lg shadow-slate-200">
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
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endsection
