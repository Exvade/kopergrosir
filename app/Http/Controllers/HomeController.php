<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Setting;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil produk yang ditandai 'is_featured' untuk Hero/Highlight
        $featuredProducts = Product::where('is_featured', true)->take(4)->get();
        
        // Ambil semua kategori untuk filter
        $categories = Category::with('products')->get();
        
        // Ambil semua produk satuan (is_package = false)
        $products = Product::where('is_package', false)->latest()->take(8)->get();

        // Ambil produk paket
        $packages = Product::where('is_package', true)->latest()->get();

        // Ambil setting WA
        $waNumber = Setting::where('key', 'wa_number')->first();
        $waMessage = Setting::where('key', 'wa_message')->first();

        return view('welcome', compact('featuredProducts', 'categories', 'products', 'packages', 'waNumber', 'waMessage'));
    }
}