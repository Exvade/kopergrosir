@extends('layouts.admin')

@section('title', 'Manajemen Banner Promo')

@section('content')
    <div class="max-w-6xl mx-auto" x-data="{ editingBanner: null }">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <div class="lg:col-span-1">
                <div class="bg-white rounded-3xl shadow-sm border border-gray-200 p-6 sticky top-24">
                    <h3 class="text-lg font-bold text-slate-900 mb-4">Upload Banner Baru</h3>

                    <form action="{{ route('admin.banners.store') }}" method="POST" enctype="multipart/form-data"
                        x-data="{ uploading: false, previewUrl: null }" @submit="uploading = true">
                        @csrf
                        <div class="space-y-5">
                            <div>
                                <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Judul /
                                    Alt Text</label>
                                <input type="text" name="title" value="{{ old('title') }}"
                                    placeholder="Contoh: Promo Akhir Tahun"
                                    class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-slate-900 outline-none transition-all"
                                    required>
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">File
                                    Gambar</label>
                                <div
                                    class="relative border-2 border-dashed border-gray-200 rounded-xl p-4 text-center hover:bg-gray-50 transition min-h-[150px] flex items-center justify-center overflow-hidden">
                                    <input type="file" name="image"
                                        class="absolute inset-0 w-full h-full opacity-0 cursor-pointer z-10"
                                        accept="image/*" required
                                        @change="const file = $event.target.files[0]; if (file) { previewUrl = URL.createObjectURL(file) }">

                                    <div x-show="!previewUrl" class="text-gray-400">
                                        <svg class="mx-auto h-8 w-8 mb-2" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <path
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                            </path>
                                        </svg>
                                        <p class="text-[10px]">Klik untuk pilih gambar</p>
                                    </div>

                                    <template x-if="previewUrl">
                                        <div class="relative w-full h-full"><img :src="previewUrl"
                                                class="rounded-lg object-cover w-full max-h-40"></div>
                                    </template>
                                </div>
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-gray-400 uppercase tracking-widest mb-2">Link
                                    Tujuan</label>
                                <input type="url" name="link" value="{{ old('link') }}"
                                    placeholder="https://wa.me/..."
                                    class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-slate-900 outline-none transition-all">
                            </div>

                            <button type="submit" :disabled="uploading"
                                class="w-full py-4 bg-slate-900 text-white rounded-2xl font-bold hover:bg-slate-800 transition shadow-lg disabled:opacity-50 flex items-center justify-center">
                                <span x-show="!uploading">Simpan & Upload</span>
                                <span x-show="uploading">Memproses...</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="lg:col-span-2">
                <div class="bg-white rounded-3xl shadow-sm border border-gray-200 overflow-hidden">
                    <div class="bg-gray-50 px-8 py-5 border-b border-gray-100 flex justify-between items-center">
                        <h3 class="font-bold text-slate-800">Riwayat Banner</h3>
                        <span
                            class="text-[10px] bg-slate-200 px-2 py-1 rounded-full font-bold text-slate-600 uppercase">{{ $banners->count() }}
                            Total</span>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-gray-50/50">
                                    <th class="px-8 py-4 text-[10px] font-bold text-gray-400 uppercase tracking-widest">
                                        Preview & Info</th>
                                    <th
                                        class="px-8 py-4 text-[10px] font-bold text-gray-400 uppercase tracking-widest text-center">
                                        Status</th>
                                    <th
                                        class="px-8 py-4 text-[10px] font-bold text-gray-400 uppercase tracking-widest text-right">
                                        Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100">
                                @forelse($banners as $banner)
                                    <tr class="hover:bg-gray-50/50 transition duration-300">
                                        <td class="px-8 py-4">
                                            <div class="flex items-center gap-4">
                                                <img src="{{ asset('storage/' . $banner->image) }}"
                                                    class="w-20 h-12 rounded-lg object-cover border shadow-sm">
                                                <div class="max-w-[180px]">
                                                    <p class="text-sm font-bold text-slate-800 truncate">
                                                        {{ $banner->title }}</p>
                                                    <p class="text-[10px] text-slate-400 truncate">
                                                        {{ $banner->link ?? 'Tanpa link' }}</p>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-8 py-4 text-center">
                                            <form action="{{ route('banners.update', $banner->id) }}" method="POST">
                                                @csrf @method('PUT')
                                                <input type="hidden" name="is_active"
                                                    value="{{ $banner->is_active ? 0 : 1 }}">
                                                <button type="submit"
                                                    class="px-3 py-1 rounded-full text-[10px] font-bold {{ $banner->is_active ? 'bg-slate-900 text-white' : 'bg-gray-100 text-gray-400' }}">
                                                    {{ $banner->is_active ? 'AKTIF' : 'NON-AKTIF' }}
                                                </button>
                                            </form>
                                        </td>
                                        <td class="px-8 py-4">
                                            <div class="flex justify-end gap-2">
                                                <button @click="editingBanner = {{ json_encode($banner) }}"
                                                    class="p-2 text-slate-400 hover:text-slate-900 transition">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2"
                                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                                        </path>
                                                    </svg>
                                                </button>
                                                <form action="{{ route('admin.banners.destroy', $banner->id) }}"
                                                    method="POST" id="del-{{ $banner->id }}">
                                                    @csrf @method('DELETE')
                                                    <button type="button" onclick="confirmDelete({{ $banner->id }})"
                                                        class="p-2 text-slate-300 hover:text-red-500 transition">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                            viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                stroke-width="2"
                                                                d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                                            </path>
                                                        </svg>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="px-8 py-16 text-center text-gray-400 text-sm italic">Belum
                                            ada banner.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div x-show="editingBanner" class="fixed inset-0 z-[100] overflow-y-auto" x-cloak>
            <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 transition-opacity bg-slate-900/50 backdrop-blur-sm"
                    @click="editingBanner = null"></div>
                <span class="hidden sm:inline-block sm:align-middle sm:h-screen">&#8203;</span>

                <div
                    class="inline-block overflow-hidden text-left align-bottom transition-all transform bg-white rounded-[2.5rem] shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <div class="px-8 pt-8 pb-4 bg-white">
                        <h3 class="text-xl font-bold text-slate-900 mb-6">Edit Detail Banner</h3>
                        <form :action="`{{ url('admin/banners') }}/${editingBanner?.id}`" method="POST"
                            enctype="multipart/form-data">
                            @csrf @method('PUT')
                            <div class="space-y-5">
                                <div>
                                    <label class="block text-xs font-bold text-gray-400 uppercase mb-2">Judul / Alt
                                        Text</label>
                                    <input type="text" name="title" x-model="editingBanner.title"
                                        class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-slate-900 outline-none transition-all"
                                        required>
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-gray-400 uppercase mb-2">Link Tujuan</label>
                                    <input type="url" name="link" x-model="editingBanner.link"
                                        class="w-full px-4 py-2.5 bg-gray-50 border border-gray-200 rounded-xl focus:ring-2 focus:ring-slate-900 outline-none transition-all">
                                </div>
                                <div>
                                    <label class="block text-xs font-bold text-gray-400 uppercase mb-2">Ganti Gambar
                                        (Opsional)</label>
                                    <input type="file" name="image"
                                        class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:bg-slate-100 file:text-slate-700 hover:file:bg-slate-200">
                                    <p class="mt-2 text-[10px] text-slate-400 italic font-medium">Kosongkan jika tidak
                                        ingin mengganti gambar utama.</p>
                                </div>
                                <div class="pt-4 flex gap-3">
                                    <button type="button" @click="editingBanner = null"
                                        class="flex-1 py-4 bg-gray-100 text-slate-600 rounded-2xl font-bold hover:bg-gray-200 transition">Batal</button>
                                    <button type="submit"
                                        class="flex-1 py-4 bg-slate-900 text-white rounded-2xl font-bold hover:bg-slate-800 transition shadow-lg">Simpan
                                        Perubahan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Hapus Banner?',
                text: "File gambar di server juga akan dihapus permanen.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#0f172a',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('del-' + id).submit();
                }
            })
        }
    </script>
@endsection
