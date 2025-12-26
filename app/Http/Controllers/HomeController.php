<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Setting;
use App\Models\Package; // Tambahkan Model Package yang baru
use App\Models\Banner;  // Tambahkan Model Banner
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // 1. Ambil Pengaturan WhatsApp (dengan Fallback Default jika database kosong)
        $waNumber = Setting::where('key', 'whatsapp_number')->first() 
                    ?? (object) ['value' => '628123456789']; 
    
        $waMessage = Setting::where('key', 'whatsapp_message')->first() 
                     ?? (object) ['value' => 'Halo KoperGrosir, saya ingin bertanya tentang produk Anda...'];
    
        // 2. Ambil Banner yang Aktif
        $activeBanners = Banner::where('is_active', true)->latest()->get();

        // 3. Ambil Kategori untuk Filter Katalog
        $categories = Category::all();

        // 4. Ambil Produk Satuan (Koper, dll)
        // Pastikan hanya mengambil produk yang BUKAN paket jika Anda masih memiliki kolom is_package
        $products = Product::with('category')->latest()->get();

        // 5. PERBAIKAN: Ambil data dari tabel Packages yang baru
        // Sebelumnya: $packages = Product::where('is_package', true)->latest()->get();
        $packages = Package::latest()->get(); 
    
        // 6. Return ke view 'welcome' dengan data yang sudah diperbaiki
        return view('welcome', compact(
            'waNumber', 
            'waMessage', 
            'activeBanners', 
            'categories', 
            'products', 
            'packages'
        ));
    }
}