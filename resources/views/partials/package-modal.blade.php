<div x-show="openModal" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
    class="fixed inset-0 z-[999] flex items-center justify-center p-4 bg-primary/80 backdrop-blur-sm" x-cloak>

    <div @click.away="openModal = false"
        class="bg-white w-full max-w-4xl max-h-[90vh] rounded-[3rem] overflow-hidden shadow-2xl relative flex flex-col md:flex-row">

        <button @click="openModal = false"
            class="absolute top-6 right-6 z-20 bg-white/90 p-2 rounded-full hover:bg-red-500 hover:text-white transition-all duration-300 shadow-lg">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>

        <div class="w-full md:w-1/2 h-64 md:h-auto overflow-hidden">
            <img :src="activePackage.image" :alt="activePackage.name" class="w-full h-full object-cover">
        </div>

        <div class="w-full md:w-1/2 p-8 md:p-12 overflow-y-auto custom-scrollbar">
            <span class="text-secondary font-black text-[10px] uppercase tracking-[0.3em] mb-2 block">Detail
                Bundling</span>
            <h2 class="text-3xl font-black text-primary uppercase mb-6" x-text="activePackage.name"></h2>

            <div class="mb-8">
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-4 flex items-center">
                    <span class="w-8 h-[1px] bg-blue-200 mr-3"></span> Isi Paket:
                </p>
                {{-- Di bagian Looping Isi Paket dalam Modal --}}
                <div class="space-y-3">
                    {{-- Kita split berdasarkan baris baru (\n) --}}
                    <template x-for="item in activePackage.items.split(/\r?\n/)" :key="item">
                        <div class="flex items-center text-sm text-slate-600 font-bold" x-show="item.trim() !== ''">
                            <div class="w-5 h-5 rounded-md bg-blue-50 flex items-center justify-center mr-3 shrink-0">
                                <svg class="w-3 h-3 text-blue-600" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24" stroke-width="4">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </div>
                            <span x-text="item.trim()"></span>
                        </div>
                    </template>
                </div>
            </div>

            <div class="mb-10">
                <p class="text-[10px] font-black text-slate-400 uppercase tracking-[0.2em] mb-3">Informasi Tambahan:</p>
                <p class="text-sm text-slate-500 leading-relaxed font-medium"
                    x-text="activePackage.description || 'Tidak ada deskripsi tambahan.'"></p>
            </div>

            <a :href="activePackage.wa_link" target="_blank"
                class="flex items-center justify-center w-full py-5 bg-primary text-white font-black rounded-2xl hover:bg-secondary transition-all duration-300 shadow-xl shadow-blue-900/10 active:scale-95 group/btn">
                <span class="uppercase tracking-widest text-xs">Pesan Sekarang via WhatsApp</span>
                <svg class="w-5 h-5 ml-3 transform group-hover/btn:translate-x-2 transition-transform" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M17 8l4 4m0 0l-4 4m4-4H3">
                    </path>
                </svg>
            </a>
        </div>
    </div>
</div>

<style>
    .custom-scrollbar::-webkit-scrollbar {
        width: 4px;
    }

    .custom-scrollbar::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: #cbd5e1;
        border-radius: 10px;
    }
</style>
