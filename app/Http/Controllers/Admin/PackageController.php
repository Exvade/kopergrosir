<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PackageController extends Controller
{
    /**
     * Menampilkan form tambah paket.
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.packages.create', compact('categories'));
    }

    /**
     * Menyimpan data paket ke tabel products.
     */
    public function store(Request $request)
{
    $request->validate([
        'name'          => 'required|max:255',
        'price'         => 'required|numeric',
        'package_items' => 'required',
        'description'   => 'nullable',
        'image'         => 'required|image|mimes:jpg,png,jpeg|max:2048',
    ]);

    // Cari kategori 'Paket', jika tidak ada maka buat otomatis
    $category = \App\Models\Category::firstOrCreate(
        ['name' => 'Paket'],
        ['slug' => 'paket']
    );

    $data = $request->all();
    $data['category_id'] = $category->id; // Set otomatis tanpa input admin
    $data['slug'] = \Illuminate\Support\Str::slug($request->name);
    $data['is_package'] = true;
    $data['is_featured'] = $request->has('is_featured');

    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('products', 'public');
    }

    \App\Models\Product::create($data);

    return redirect()->route('products.index')->with('success', 'Paket Berhasil Ditambahkan!');
}
}