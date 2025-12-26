<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Package;
use App\Models\Category;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Menghitung jumlah total produk satuan
        $totalProducts = Product::count();

        // Menghitung jumlah total paket bundling
        $totalPackages = Package::count();

        // Menghitung jumlah paket yang statusnya 'featured' (unggulan)
        $featuredPackages = Package::where('is_featured', true)->count();

        // Mengirim data ke view admin/dashboard.blade.php
        return view('admin.dashboard', compact(
            'totalProducts', 
            'totalPackages', 
            'featuredPackages'
        ));
    }
}