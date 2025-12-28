@extends('layouts.admin')

@section('title', 'Global Settings')

@section('content')
    <div class="max-w-2xl mx-auto">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">
            <div class="p-6 border-b border-gray-100 bg-gray-50/50">
                <h3 class="font-bold text-gray-800">Integrasi WhatsApp</h3>
                <p class="text-xs text-gray-500">Atur nomor tujuan dan template pesan otomatis.</p>
            </div>

            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-50 border-l-4 border-red-500 text-red-700">
                    <ul class="list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.settings.update') }}" method="POST" class="p-6 space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Nomor WhatsApp Admin</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 flex items-center pl-4 text-gray-400 font-bold">+</span>
                        <input type="text" name="wa_number" value="{{ $waNumber->value ?? '' }}"
                            placeholder="628123456789"
                            class="w-full pl-8 pr-4 py-3 bg-gray-50 border rounded-xl focus:ring-2 focus:ring-blue-500 outline-none transition-all">
                    </div>
                    <p class="text-[10px] text-gray-400 mt-2 italic">*Gunakan kode negara tanpa tanda +, contoh: 62812...
                    </p>
                </div>

                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Template Pesan Otomatis</label>
                    <textarea name="wa_message" rows="4"
                        class="w-full px-4 py-3 bg-gray-50 border rounded-xl focus:ring-2 focus:ring-blue-500 outline-none transition-all"
                        placeholder="Halo Admin, saya mau tanya koper...">{{ $waMessage->value ?? '' }}</textarea>
                    <p class="text-[10px] text-gray-400 mt-2 italic">*Pesan ini akan muncul secara otomatis di chat WA
                        pelanggan.</p>
                </div>

                <button type="submit"
                    class="w-full bg-blue-600 text-white font-bold py-3 rounded-xl hover:bg-blue-700 transition shadow-lg shadow-blue-500/30 active:scale-[0.98]">
                    Simpan Pengaturan
                </button>
            </form>
        </div>
    </div>
@endsection
