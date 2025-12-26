@extends('layouts.admin')

@section('title', 'Manajemen Produk')

@section('content')
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
        <div class="w-full sm:w-auto">
            <h3 class="text-xl md:text-2xl font-bold text-gray-800">Daftar Katalog</h3>
            <p class="text-sm text-gray-500 mt-1">Kelola foto produk dan kategori katalog.</p>
        </div>
        <div class="flex gap-4">

            <a href="{{ route('admin.products.create') }}"
                class="w-full sm:w-auto justify-center bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg font-medium transition flex items-center shadow-sm active:scale-95">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                    </path>
                </svg>
                Tambah Produk Baru
            </a>
        </div>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">
        <div class="hidden md:block overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Produk</th>
                        <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Kategori</th>
                        <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider text-center">Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($products as $product)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div
                                        class="h-12 w-12 flex-shrink-0 rounded-lg bg-gray-100 overflow-hidden border border-gray-200">
                                        @if ($product->image)
                                            <img src="{{ asset('aset-media/' . $product->image) }}"
                                                alt="{{ $product->name }}" class="h-full w-full object-cover">
                                        @else
                                            <div class="h-full w-full flex items-center justify-center text-gray-400">
                                                <svg class="w-6 h-6" fill="none" stroke="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                                    </path>
                                                </svg>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-bold text-gray-800 line-clamp-1 flex items-center">
                                            {{ $product->name }}
                                            @if ($product->is_featured)
                                                <span
                                                    class="ml-2 text-[10px] bg-yellow-100 text-yellow-700 px-1.5 py-0.5 rounded border border-yellow-200">Featured</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">
                                <span class="px-3 py-1 bg-blue-50 text-blue-600 rounded-full text-xs font-bold">
                                    {{ $product->category->name ?? 'Tanpa Kategori' }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex justify-center space-x-2">
                                    <a href="{{ route('admin.products.edit', $product->id) }}"
                                        class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                            </path>
                                        </svg>
                                    </a>
                                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST"
                                        id="delete-form-{{ $product->id }}">
                                        @csrf @method('DELETE')
                                        <button type="button" onclick="confirmDelete({{ $product->id }})"
                                            class="p-2 text-red-500 hover:bg-red-50 rounded-lg transition-colors">
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
                            <td colspan="3" class="px-6 py-10 text-center text-gray-500 italic text-sm">Data katalog
                                kosong.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="md:hidden divide-y divide-gray-100">
            @forelse($products as $product)
                <div class="p-4 flex flex-col space-y-4">
                    <div class="flex items-center space-x-4">
                        <div class="h-16 w-16 flex-shrink-0 rounded-lg bg-gray-100 border border-gray-200 relative">
                            @if ($product->image)
                                <img src="{{ asset('aset-media/' . $product->image) }}"
                                    class="h-full w-full object-cover rounded-lg">
                            @else
                                <div class="h-full w-full flex items-center justify-center text-gray-400">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z">
                                        </path>
                                    </svg>
                                </div>
                            @endif
                        </div>
                        <div class="flex-1">
                            <h4 class="text-sm font-bold text-gray-800 line-clamp-1">{{ $product->name }}</h4>
                            <div class="flex items-center gap-2 mt-1">
                                <span
                                    class="text-[10px] px-2 py-0.5 rounded-full border border-blue-100 bg-blue-50 text-blue-600 font-bold uppercase tracking-tight">
                                    {{ $product->category->name ?? 'General' }}
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="flex space-x-2 pt-2">
                        <a href="{{ route('admin.products.edit', $product->id) }}"
                            class="flex-1 text-center py-2 bg-gray-50 text-blue-600 border border-blue-100 rounded-lg text-sm font-bold active:bg-blue-50">Edit</a>
                        <button type="button" onclick="confirmDelete({{ $product->id }})"
                            class="flex-1 py-2 bg-red-50 text-red-600 border border-red-100 rounded-lg text-sm font-bold active:bg-red-100">Hapus</button>
                    </div>
                </div>
            @empty
                <div class="px-6 py-10 text-center text-gray-500 italic text-sm">Belum ada produk.</div>
            @endforelse
        </div>
    </div>

    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Hapus Produk?',
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ef4444',
                cancelButtonColor: '#64748b',
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
