@extends('layouts.admin')

@section('title', 'Manajemen Produk')

@section('content')
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
        <div class="w-full sm:w-auto">
            <h3 class="text-xl md:text-2xl font-bold text-gray-800">Daftar Katalog</h3>
            <p class="text-sm text-gray-500 mt-1">Kelola semua produk satuan dan paket bundling.</p>
        </div>
        <div class="flex gap-4">

            <a href="{{ route('packages.create') }}"
                class="w-full sm:w-auto justify-center bg-violet-600 hover:bg-violet-700 text-white px-5 py-2.5 rounded-lg font-medium transition flex items-center shadow-sm active:scale-95">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6">
                    </path>
                </svg>
                Tambah Paket Baru
            </a>
            <a href="{{ route('products.create') }}"
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
                        <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Harga</th>
                        <th class="px-6 py-4 text-xs font-semibold text-gray-500 uppercase tracking-wider">Tipe</th>
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
                                        <div class="text-xs text-gray-500">
                                            @if ($product->is_package)
                                                Isi: {{ Str::limit($product->package_items, 30) }}
                                            @else
                                                {{ $product->size ?? '-' }} | {{ $product->material ?? '-' }}
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">
                                {{ $product->category->name ?? 'Tanpa Kategori' }}
                            </td>
                            <td class="px-6 py-4 text-sm font-bold text-gray-900">
                                Rp{{ number_format($product->price, 0, ',', '.') }}
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">
                                @if ($product->is_package)
                                    <span class="text-purple-600 font-semibold italic">Internal Paket</span>
                                @else
                                    {{ $product->category->name ?? 'Tanpa Kategori' }}
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
                        <tr>
                            <td colspan="5" class="px-6 py-10 text-center text-gray-500 italic">Data masih kosong.</td>
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
                            @if ($product->is_featured)
                                <span class="absolute -top-2 -right-2 bg-yellow-400 text-white p-1 rounded-full shadow-sm">
                                    <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                        <path
                                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                        </path>
                                    </svg>
                                </span>
                            @endif
                        </div>
                        <div class="flex-1">
                            <h4 class="text-sm font-bold text-gray-800 line-clamp-1">{{ $product->name }}</h4>
                            <div class="flex items-center gap-2 mt-1">
                                <span
                                    class="text-[10px] px-1.5 py-0.5 rounded border border-gray-200 bg-gray-50 text-gray-500 uppercase">{{ $product->category->name ?? 'General' }}</span>
                                <span
                                    class="text-[10px] px-1.5 py-0.5 rounded border border-purple-100 bg-purple-50 text-purple-600 font-bold">{{ $product->is_package ? 'PAKET' : 'SATUAN' }}</span>
                            </div>
                            <div class="mt-2 font-bold text-slate-900">Rp{{ number_format($product->price, 0, ',', '.') }}
                            </div>
                        </div>
                    </div>

                    <div class="flex space-x-2 pt-2">
                        <a href="{{ route('products.edit', $product->id) }}"
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
