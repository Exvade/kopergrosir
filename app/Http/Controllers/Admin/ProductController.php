<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Menampilkan daftar koper.
     */
    public function index()
{
    // Menggunakan with('category') agar query lebih efisien
    $products = Product::with('category')->latest()->get();
    return view('admin.products.index', compact('products'));
}

    /**
     * Menampilkan form tambah koper.
     */
    public function create() {
        $categories = \App\Models\Category::all();
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Memproses penyimpanan koper baru.
     */
    public function store(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name'        => 'required|max:255',
            'price'       => 'required|numeric',
            'description' => 'required',
            'image'       => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
            // Validasi opsional tergantung tipe
            'size'        => 'nullable|string',
            'material'    => 'nullable|string',
            'package_items' => 'nullable|string',
        ]);
    
        // 2. Olah Data
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        
        // Menangani checkbox (jika tidak dicentang, nilainya false/0)
        $data['is_package'] = $request->has('is_package');
        $data['is_featured'] = $request->has('is_featured');
    
        // 3. Logika Upload Gambar
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }
    
        // 4. Simpan ke Database
        Product::create($data);
    
        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan ke katalog!');
    }

    /**
     * Menampilkan form edit koper.
     */
    public function edit(Product $product)
    {
        $categories = \App\Models\Category::all();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Memproses perubahan data koper.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'size' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        $data['is_package'] = $request->has('is_package');
        $data['is_featured'] = $request->has('is_featured');

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($data);

        return redirect()->route('products.index')->with('success', 'Katalog diperbarui!');
    }

    /**
     * Menghapus produk koper.
     */
    public function destroy(Product $product)
    {
        if ($product->image) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();
        return redirect()->route('products.index')->with('success', 'Koper berhasil dihapus dari katalog!');
    }
}
