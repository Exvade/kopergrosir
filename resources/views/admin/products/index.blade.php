@extends('layouts.admin')

@section('title', 'Manajemen Produk')

@section('content')
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
        <div class="w-full sm:w-auto">
            <h3 class="text-xl md:text-2xl font-bold text-gray-800">Daftar Koper</h3>
            <p class="text-sm text-gray-500 mt-1">Kelola koleksi koper yang tampil di website.</p>
        </div>
        <a href="{{ route('products.create') }}"
            class="w-full sm:w-auto justify-center bg-blue-600 hover:bg-blue-700 text-white px-5 py-2.5 rounded-lg font-medium transition flex items-center shadow-sm active:scale-95">
            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
            </svg>
            Tambah Koper Baru
        </a>
    </div>

    <div class="bg-white rounded-xl shadow-sm border border-gray-200 overflow-hidden">

        <div class="hidden md:block overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead class="bg-gray-50 border-b border-gray-200">
                    <tr>
                        <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Produk</th>
                        <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Kategori</th>
                        <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Harga</th>
                        <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Stok</th>
                        <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                        <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider text-center">Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 italic-none">
                    @forelse($products as $product)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div
                                        class="h-12 w-12 flex-shrink-0 rounded-lg bg-gray-100 overflow-hidden border border-gray-200">
                                        @if ($product->image)
                                            <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                                class="h-full w-full object-cover">
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
                                        <div class="text-sm font-bold text-gray-800 line-clamp-1">{{ $product->name }}</div>
                                        <div class="text-xs text-gray-500">{{ $product->size }} | {{ $product->material }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">
                                {{ $product->category->name ?? 'Uncategorized' }}
                            </td>
                            <td class="px-6 py-4 text-sm font-bold text-gray-900">
                                Rp{{ number_format($product->price, 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">
                                {{ $product->stock }} Pcs
                            </td>
                            <td class="px-6 py-4">
                                @if ($product->stock > 0)
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        Ready
                                    </span>
                                @else
                                    <span
                                        class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                        Habis
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex justify-center space-x-2">
                                    <a href="{{ route('products.edit', $product->id) }}"
                                        class="p-2 text-blue-600 hover:bg-blue-50 rounded-lg transition-colors">
                                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z">
                                            </path>
                                        </svg>
                                    </a>
                                    <form action="{{ route('products.destroy', $product->id) }}" method="POST"
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
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="md:hidden divide-y divide-gray-100">
            @forelse($products as $product)
                <div class="p-4 flex flex-col space-y-4">
                    <div class="flex items-center space-x-4">
                        <div class="h-16 w-16 flex-shrink-0 rounded-lg bg-gray-100 border border-gray-200">
                            @if ($product->image)
                                <img src="{{ asset('storage/' . $product->image) }}"
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
                            <h4 class="text-sm font-bold text-gray-800">{{ $product->name }}</h4>
                            <p class="text-xs text-gray-500">{{ $product->category->name ?? 'Uncategorized' }}</p>
                            <div class="mt-1 font-bold text-blue-600">Rp{{ number_format($product->price, 0, ',', '.') }}
                            </div>
                        </div>
                    </div>

                    <div class="flex justify-between items-center text-xs bg-gray-50 p-2 rounded-lg italic-none">
                        <div><span class="text-gray-400">Stok:</span> <span class="font-semibold">{{ $product->stock }}
                                Pcs</span></div>
                        <div>
                            @if ($product->stock > 0)
                                <span class="px-2 py-0.5 bg-green-100 text-green-700 rounded-full font-bold">Ready</span>
                            @else
                                <span class="px-2 py-0.5 bg-red-100 text-red-700 rounded-full font-bold">Habis</span>
                            @endif
                        </div>
                    </div>

                    <div class="flex space-x-2">
                        <a href="{{ route('products.edit', $product->id) }}"
                            class="flex-1 text-center py-2 border border-blue-600 text-blue-600 rounded-lg text-sm font-bold active:bg-blue-50">Edit</a>
                        <button type="button" onclick="confirmDelete({{ $product->id }})"
                            class="flex-1 py-2 bg-red-50 text-red-600 rounded-lg text-sm font-bold active:bg-red-100">Hapus</button>
                    </div>
                </div>
            @empty
                <div class="px-6 py-10 text-center text-gray-500 italic text-sm">
                    Belum ada produk koper.
                </div>
            @endforelse
        </div>
    </div>

    <script>
        function confirmDelete(id) {
            Swal.fire({
                title: 'Hapus Koper?',
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#ef4444',
                cancelButtonColor: '#64748b',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
                reverseButtons: true,
                customClass: {
                    popup: 'rounded-2xl',
                    confirmButton: 'rounded-lg px-5 py-2.5',
                    cancelButton: 'rounded-lg px-5 py-2.5'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            })
        }
    </script>
@endsection
