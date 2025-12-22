@extends('layouts.admin')

@section('content')
    <div class="max-w-4xl mx-auto">
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data"
            class="bg-white rounded-3xl p-8 shadow-sm border border-gray-100">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="space-y-6">
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase mb-2">Foto Produk</label>
                        <div class="relative border-2 border-dashed border-gray-200 rounded-2xl p-4 text-center">
                            <input type="file" name="image"
                                class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10"
                                onchange="previewImage(event)" required>
                            <img id="image-preview" class="hidden mx-auto max-h-64 rounded-xl shadow-md">
                            <div id="placeholder" class="py-10">
                                <p class="text-sm text-gray-400">Pilih Foto Produk</p>
                            </div>
                        </div>
                    </div>
                    <label
                        class="flex items-center space-x-3 cursor-pointer p-4 bg-gray-50 rounded-2xl border border-gray-100">
                        <input type="checkbox" name="is_featured" value="1" class="w-5 h-5 text-slate-900 rounded">
                        <span class="text-sm font-bold text-slate-700">Tampilkan di Highlight</span>
                    </label>
                </div>

                <div class="space-y-5">
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase mb-2">Nama Produk</label>
                        <input type="text" name="name"
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-slate-900 outline-none"
                            required>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase mb-2">Kategori</label>
                        <select name="category_id"
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl outline-none" required>
                            <option value="">Pilih Kategori</option>
                            @foreach ($categories as $cat)
                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase mb-2">Harga (Rp)</label>
                        <input type="number" name="price"
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl outline-none" required>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <input type="text" name="size" placeholder="Ukuran (Inch)"
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl outline-none">
                        <input type="text" name="material" placeholder="Bahan"
                            class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl outline-none">
                    </div>
                </div>
            </div>
            <div class="mt-6">
                <label class="block text-xs font-bold text-gray-400 uppercase mb-2">Deskripsi</label>
                <textarea name="description" rows="4"
                    class="w-full px-4 py-3 bg-gray-50 border border-gray-200 rounded-xl outline-none" required></textarea>
            </div>
            <button type="submit"
                class="mt-8 w-full bg-slate-900 text-white py-4 rounded-2xl font-bold hover:bg-slate-800 transition">Simpan
                Produk</button>
        </form>
    </div>
@endsection
