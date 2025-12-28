@extends('layouts.admin')

@section('title', 'Manajemen Kategori')

@section('content')
    <div class="max-w-4xl mx-auto px-2 md:px-0">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
            <div>
                <h3 class="text-2xl font-black text-slate-800 tracking-tight">Kategori Produk</h3>
                <p class="text-sm text-slate-500 font-medium mt-1">Kelompokkan katalog produk Anda dengan rapi.</p>
            </div>
            <a href="{{ route('admin.categories.create') }}"
                class="w-full md:w-auto justify-center bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-2xl font-bold flex items-center shadow-lg shadow-blue-900/10 transition-all active:scale-95 text-sm">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                Tambah Kategori
            </a>
        </div>

        <div class="bg-white rounded-[2rem] shadow-sm border border-slate-100 overflow-hidden">
            <div class="overflow-x-auto custom-scrollbar">
                <table class="w-full text-left border-collapse min-w-[600px]">
                    <thead class="bg-slate-50/50 border-b border-slate-100">
                        <tr>
                            <th class="px-6 py-5 text-xs font-black text-slate-400 uppercase tracking-[0.2em]">Nama Kategori</th>
                            <th class="px-6 py-5 text-xs font-black text-slate-400 uppercase tracking-[0.2em]">Slug (SEO)</th>
                            <th class="px-6 py-5 text-xs font-black text-slate-400 uppercase tracking-[0.2em]">Total</th>
                            <th class="px-6 py-5 text-xs font-black text-slate-400 uppercase tracking-[0.2em] text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-50">
                        @forelse($categories as $category)
                            <tr class="hover:bg-blue-50/30 transition-colors">
                                <td class="px-6 py-5">
                                    <span class="font-bold text-slate-700 block">{{ $category->name }}</span>
                                </td>
                                <td class="px-6 py-5">
                                    <code class="text-[10px] bg-slate-100 px-2 py-1 rounded-md text-slate-500 font-mono">/{{ $category->slug }}</code>
                                </td>
                                <td class="px-6 py-5">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-bold bg-blue-50 text-blue-600">
                                        {{ $category->products->count() }} Produk
                                    </span>
                                </td>
                                <td class="px-6 py-5">
                                    <div class="flex justify-center items-center space-x-4">
                                        <a href="{{ route('admin.categories.edit', $category->id) }}"
                                            class="p-2 text-blue-600 hover:bg-blue-100 rounded-xl transition-all">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                            </svg>
                                        </a>
                                        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST"
                                            id="delete-form-{{ $category->id }}" class="inline">
                                            @csrf @method('DELETE')
                                            <button type="button" onclick="confirmDelete({{ $category->id }})"
                                                class="p-2 text-red-500 hover:bg-red-50 rounded-xl transition-all">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="px-6 py-16 text-center">
                                    <div class="flex flex-col items-center">
                                        <div class="bg-slate-50 p-4 rounded-full mb-4">
                                            <svg class="w-8 h-8 text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                                            </svg>
                                        </div>
                                        <p class="text-slate-400 font-bold text-sm italic tracking-widest uppercase">Belum ada kategori yang ditambahkan.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <style>
        .custom-scrollbar::-webkit-scrollbar { height: 6px; }
        .custom-scrollbar::-webkit-scrollbar-track { background: #f1f5f9; }
        .custom-scrollbar::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 10px; }
    </style>

    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Hapus Kategori?',
                text: "Pastikan tidak ada produk yang menggunakan kategori ini agar data tidak rusak.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ef4444',
                cancelButtonColor: '#64748b',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
                customClass: {
                    popup: 'rounded-[2rem]',
                    confirmButton: 'rounded-xl px-6 py-3',
                    cancelButton: 'rounded-xl px-6 py-3'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            })
        }
    </script>
@endsection