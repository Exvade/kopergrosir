@extends('layouts.admin')

@section('title', 'Tambah Kategori')

@section('content')
    <div class="max-w-xl mx-auto">
        <div class="bg-white rounded-xl shadow-sm border border-gray-200 p-8">
            <form action="{{ route('admin.categories.store') }}" method="POST">
                @csrf
                <div class="mb-6">
                    <label class="block text-sm font-bold text-gray-700 mb-2">Nama Kategori</label>
                    <input type="text" name="name" placeholder="Contoh: Perlengkapan Haji"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex justify-end gap-3">
                    <a href="{{ route('admin.categories.index') }}"
                        class="px-4 py-2 text-gray-600 hover:bg-gray-100 rounded-lg transition">Batal</a>
                    <button type="submit"
                        class="bg-blue-600 text-white px-6 py-2 rounded-lg font-bold hover:bg-blue-700 transition">Simpan
                        Kategori</button>
                </div>
            </form>
        </div>
    </div>
@endsection
