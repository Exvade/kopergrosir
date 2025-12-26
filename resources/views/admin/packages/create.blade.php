@extends('layouts.admin')

@section('title', 'Buat Paket Bundling Baru')

@section('content')
    <div class="max-w-4xl mx-auto">
        <div class="mb-8">
            <a href="{{ route('admin.packages.index') }}"
                class="inline-flex items-center text-blue-600 font-bold text-sm hover:underline group">
                <svg class="w-4 h-4 mr-2 transform group-hover:-translate-x-1 transition-transform" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18">
                    </path>
                </svg>
                Kembali ke Daftar Paket
            </a>
        </div>

        <form action="{{ route('packages.store') }}" method="POST" enctype="multipart/form-data"
            class="bg-white rounded-[2.5rem] p-8 md:p-10 shadow-sm border border-blue-50">
            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
                <div class="space-y-6">
                    <div>
                        <label class="block text-xs font-black text-blue-900 uppercase tracking-widest mb-3">Foto Bundling
                            Paket</label>
                        <div
                            class="relative group cursor-pointer border-2 border-dashed border-blue-100 rounded-[2rem] p-4 text-center hover:border-blue-400 transition-all bg-slate-50">
                            <input type="file" name="image" id="image-input" required
                                class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-20"
                                onchange="previewImage(event)">

                            <div id="placeholder" class="py-12 relative z-10">
                                <div
                                    class="w-16 h-16 bg-blue-100 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform">
                                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                </div>
                                <p class="text-xs font-bold text-blue-900 uppercase tracking-tighter">Pilih Gambar Paket</p>
                                <p class="text-[10px] text-slate-400 mt-1">Saran: Square 1:1 (PNG/JPG)</p>
                            </div>

                            <img id="image-preview" class="hidden mx-auto max-h-72 rounded-2xl shadow-lg relative z-10">
                        </div>
                    </div>

                    <div class="bg-blue-50 p-6 rounded-[2rem] border border-blue-100 group">
                        <label class="flex items-center space-x-4 cursor-pointer">
                            <input type="checkbox" name="is_featured" value="1"
                                class="w-6 h-6 text-blue-600 rounded-xl border-blue-200 focus:ring-blue-500">
                            <div>
                                <span class="block text-sm font-black text-blue-900 uppercase tracking-tight">Highlight
                                    Paket</span>
                                <span class="block text-[10px] text-blue-400 leading-tight">Tampilkan sebagai paket utama di
                                    halaman depan.</span>
                            </div>
                        </label>
                    </div>
                </div>

                <div class="space-y-6">
                    <div>
                        <label class="block text-xs font-black text-blue-900 uppercase tracking-widest mb-2">Nama
                            Bundling</label>
                        <input type="text" name="name" required placeholder="Contoh: Paket Umroh Premium Gold"
                            class="w-full px-6 py-4 bg-slate-50 border border-blue-50 rounded-2xl focus:ring-2 focus:ring-blue-500 focus:bg-white outline-none transition-all font-medium text-blue-900">
                    </div>

                    <div>
                        <label class="block text-xs font-black text-blue-900 uppercase tracking-widest mb-2">Daftar Isi
                            Paket</label>
                        <textarea name="package_items" rows="5" required
                            placeholder="Tuliskan isi paket, pisahkan dengan baris baru atau koma.&#10;Contoh:&#10;- Koper 24 Inch&#10;- Tas Paspor&#10;- Kain Ihram"
                            class="w-full px-6 py-4 bg-slate-50 border border-blue-50 rounded-2xl focus:ring-2 focus:ring-blue-500 focus:bg-white outline-none transition-all font-medium text-blue-900"></textarea>
                    </div>

                    <div>
                        <label class="block text-xs font-black text-blue-900 uppercase tracking-widest mb-2">Deskripsi
                            Tambahan</label>
                        <textarea name="description" rows="3" placeholder="Informasi tambahan seperti garansi, pengiriman, dsb."
                            class="w-full px-6 py-4 bg-slate-50 border border-blue-50 rounded-2xl focus:ring-2 focus:ring-blue-500 focus:bg-white outline-none transition-all font-medium text-blue-900"></textarea>
                    </div>
                </div>
            </div>

            <div class="mt-12 flex justify-end">
                <button type="submit"
                    class="bg-blue-900 text-white px-12 py-4 rounded-2xl font-black text-xs uppercase tracking-widest hover:bg-blue-600 transition-all shadow-xl shadow-blue-900/20 active:scale-95">
                    Simpan Paket Bundling
                </button>
            </div>
        </form>
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
