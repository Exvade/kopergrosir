@extends('layouts.admin')

@section('title', 'Edit Kategori')

@section('content')
    <div class="max-w-2xl mx-auto">
        <div class="mb-6 flex items-center justify-between">
            <h3 class="text-xl font-bold text-gray-800">Edit Kategori</h3>
            <a href="{{ route('admin.categories.index') }}" class="text-blue-600 hover:underline flex items-center font-medium text-sm">
                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Kembali
            </a>
        </div>

        @if ($errors->any())
            <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-500 rounded-r-xl shadow-sm">
                <div class="flex items-center mb-2">
                    <svg class="w-5 h-5 text-red-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                    </svg>
                    <h4 class="text-sm font-bold text-red-800 uppercase tracking-wider">Gagal Memperbarui:</h4>
                </div>
                <ul class="list-disc list-inside text-xs text-red-700 space-y-1 ml-7">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="bg-white rounded-[2.5rem] p-8 md:p-10 shadow-sm border border-gray-100">
            <form action="{{ route('admin.categories.update', $category->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="space-y-6">
                    <div>
                        <label class="block text-xs font-black text-gray-400 uppercase tracking-[0.2em] mb-2">Nama Kategori</label>
                        <input type="text" name="name" value="{{ old('name', $category->name) }}" 
                            placeholder="Contoh: Koper Fiber, Koper Kain, dll."
                            class="w-full px-5 py-4 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-2 focus:ring-blue-500 focus:bg-white outline-none transition-all font-bold text-slate-700" 
                            required autofocus>
                        <p class="mt-2 text-[10px] text-gray-400 uppercase tracking-wider">Slug akan otomatis diperbarui berdasarkan nama kategori untuk kebutuhan SEO.</p>
                    </div>

                    @if(isset($category->description))
                    <div>
                        <label class="block text-xs font-black text-gray-400 uppercase tracking-[0.2em] mb-2">Deskripsi Kategori</label>
                        <textarea name="description" rows="3"
                            class="w-full px-5 py-4 bg-gray-50 border border-gray-200 rounded-2xl focus:ring-2 focus:ring-blue-500 focus:bg-white outline-none transition-all font-medium text-slate-700">{{ old('description', $category->description) }}</textarea>
                    </div>
                    @endif
                </div>

                <div class="mt-10 flex gap-4">
                    <button type="submit"
                        class="flex-1 bg-blue-600 text-white py-4 rounded-2xl font-black uppercase tracking-[0.2em] text-sm hover:bg-blue-700 transition-all shadow-xl shadow-blue-900/20 active:scale-[0.98]">
                        Simpan Perubahan
                    </button>
                    <a href="{{ route('admin.categories.index') }}"
                        class="px-8 py-4 bg-gray-100 text-gray-500 rounded-2xl font-black uppercase tracking-[0.2em] text-sm hover:bg-gray-200 transition-all text-center">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
@endsection