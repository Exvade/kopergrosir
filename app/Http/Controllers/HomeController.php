<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Setting;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil data, jika tidak ada, buat objek kosong agar tidak error saat akses ->value
        $waNumber = Setting::where('key', 'whatsapp_number')->first() 
                    ?? (object) ['value' => '628123456789']; // Nomor default
    
        $waMessage = Setting::where('key', 'whatsapp_message')->first() 
                     ?? (object) ['value' => 'Halo KoperGrosir, saya ingin bertanya...'];
    
        // Ambil data lainnya
        $activeBanners = \App\Models\Banner::where('is_active', true)->latest()->get();
        $categories = Category::all();
        $products = Product::with('category')->latest()->get();
        $packages = Product::where('is_package', true)->latest()->get();
    
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