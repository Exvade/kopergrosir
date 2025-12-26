@extends('layouts.admin')

@section('title', 'Edit Paket Bundling')

@section('content')
    <div class="max-w-4xl mx-auto">
        <div class="mb-8">
            <a href="{{ route('admin.packages.index') }}"
                class="inline-flex items-center text-blue-600 font-bold text-sm hover:underline group">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
                    </path>
                </svg>
                Kembali ke Daftar Paket
            </a>
        </div>

        <form action="{{ route('admin.packages.update', $package->id) }}" method="POST" enctype="multipart/form-data"
            class="bg-white rounded-[2.5rem] p-8 md:p-10 shadow-sm border border-blue-50">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                <div class="space-y-6">
                    <div>
                        <label class="block text-xs font-black text-blue-900 uppercase tracking-widest mb-3">Foto
                            Bundling</label>
                        <div
                            class="relative group cursor-pointer border-2 border-dashed border-blue-100 rounded-[2rem] p-4 text-center hover:border-blue-400 transition-all bg-slate-50">
                            <input type="file" name="image"
                                class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-20"
                                onchange="previewImage(event)">

                            <img id="image-preview" src="{{ asset('storage/' . $package->image) }}"
                                class="mx-auto max-h-72 rounded-2xl shadow-lg relative z-10">

                            <div id="placeholder" class="hidden py-12">
                                <p class="text-xs font-bold text-blue-900 uppercase">Klik untuk ganti gambar</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-blue-50 p-6 rounded-[2rem] border border-blue-100">
                        <label class="flex items-center space-x-4 cursor-pointer">
                            <input type="checkbox" name="is_featured" value="1"
                                {{ $package->is_featured ? 'checked' : '' }} class="w-6 h-6 text-blue-600 rounded-xl">
                            <div>
                                <span class="block text-sm font-black text-blue-900 uppercase">Highlight Paket</span>
                                <span class="block text-[10px] text-blue-400">Muncul di halaman depan.</span>
                            </div>
                        </label>
                    </div>
                </div>

                <div class="space-y-6">
                    <div>
                        <label class="block text-xs font-black text-blue-900 uppercase mb-2">Nama Bundling</label>
                        <input type="text" name="name" value="{{ $package->name }}" required
                            class="w-full px-6 py-4 bg-slate-50 border border-blue-50 rounded-2xl outline-none text-blue-900 font-medium">
                    </div>

                    <div>
                        <label class="block text-xs font-black text-blue-900 uppercase mb-2">Daftar Isi Paket</label>
                        <textarea name="package_items" rows="5" required
                            class="w-full px-6 py-4 bg-slate-50 border border-blue-50 rounded-2xl outline-none text-blue-900 font-medium">{{ $package->package_items }}</textarea>
                    </div>

                    <div>
                        <label class="block text-xs font-black text-blue-900 uppercase mb-2">Deskripsi Tambahan</label>
                        <textarea name="description" rows="3"
                            class="w-full px-6 py-4 bg-slate-50 border border-blue-50 rounded-2xl outline-none text-blue-900 font-medium">{{ $package->description }}</textarea>
                    </div>
                </div>
            </div>

            <div class="mt-12 flex justify-end">
                <button type="submit"
                    class="bg-blue-600 text-white px-12 py-4 rounded-2xl font-black text-xs uppercase tracking-widest hover:bg-blue-700 transition-all shadow-xl shadow-blue-600/20 active:scale-95">
                    Update Paket Bundling
                </button>
            </div>
        </form>
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
