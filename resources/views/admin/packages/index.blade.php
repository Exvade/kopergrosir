@extends('layouts.admin')

@section('title', 'Manajemen Paket Bundling')

@section('content')
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
        <div class="w-full sm:w-auto">
            <h3 class="text-xl md:text-2xl font-bold text-blue-900">Daftar Paket Bundling</h3>
            <p class="text-sm text-slate-500 mt-1">Kelola paket perlengkapan travel bundling Anda.</p>
        </div>
        <div>
            <a href="{{ route('admin.packages.create') }}"
                class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2.5 rounded-xl font-bold text-sm transition flex items-center shadow-lg shadow-blue-900/10 active:scale-95">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                    </path>
                </svg>
                Tambah Paket Baru
            </a>
        </div>
    </div>

    <div class="bg-white rounded-3xl shadow-sm border border-blue-50 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-slate-50 border-b border-blue-50">
                    <tr>
                        <th class="px-6 py-4 text-xs font-black text-blue-900 uppercase tracking-widest">Info Paket</th>
                        <th class="px-6 py-4 text-xs font-black text-blue-900 uppercase tracking-widest">Daftar Isi</th>
                        <th class="px-6 py-4 text-xs font-black text-blue-900 uppercase tracking-widest text-center">Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-50">
                    @forelse($packages as $package)
                        <tr class="hover:bg-blue-50/30 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-4">
                                    <div
                                        class="h-16 w-16 flex-shrink-0 rounded-2xl bg-slate-100 overflow-hidden border border-blue-100 shadow-sm">
                                        <img src="{{ asset('storage/' . $package->image) }}" alt="{{ $package->name }}"
                                            class="h-full w-full object-cover">
                                    </div>
                                    <div>
                                        <div class="text-sm font-black text-blue-900 flex items-center gap-2">
                                            {{ $package->name }}
                                            @if ($package->is_featured)
                                                <span
                                                    class="text-[9px] bg-amber-100 text-amber-600 px-2 py-0.5 rounded-lg font-black uppercase italic border border-amber-200">Featured</span>
                                            @endif
                                        </div>
                                        <p class="text-[10px] text-slate-400 mt-0.5 uppercase tracking-tighter">ID:
                                            PKG-{{ $package->id }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <p class="text-xs text-slate-600 leading-relaxed max-w-xs line-clamp-2 italic">
                                    {{ $package->package_items }}
                                </p>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <div class="flex justify-center gap-2">
                                    <a href="{{ route('admin.packages.edit', $package->id) }}"
                                        class="p-2 text-blue-600 hover:bg-blue-50 rounded-xl transition-colors">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                            </path>
                                        </svg>
                                    </a>
                                    <form action="{{ route('admin.packages.destroy', $package->id) }}" method="POST"
                                        id="delete-form-{{ $package->id }}">
                                        @csrf @method('DELETE')
                                        <button type="button" onclick="confirmDelete({{ $package->id }})"
                                            class="p-2 text-red-500 hover:bg-red-50 rounded-xl transition-colors">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
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
                            <td colspan="3" class="px-6 py-12 text-center text-slate-400 italic text-sm">Belum ada paket
                                bundling yang didaftarkan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Hapus Paket?',
                text: "Data paket dan gambar akan dihapus permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#2563eb', // Royal Blue
                cancelButtonColor: '#ef4444',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            })
        }
    </script>
@endsection
