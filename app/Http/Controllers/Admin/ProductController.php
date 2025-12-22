<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\Category; // Tambahkan ini

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
    public function create()
    {
        $categories = Category::all(); // Gunakan model Category yang diimpor
        return view('admin.products.create', compact('categories'));
    }

    /**
     * Memproses penyimpanan koper baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name'        => 'required|max:255',
            'price'       => 'required|numeric|min:0',
            'description' => 'required',
            'image'       => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'size'        => 'nullable|string|max:255',
            'material'    => 'nullable|string|max:255',
        ]);
    
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        $data['is_package'] = false; // Selalu false karena ini page produk satuan
        $data['is_featured'] = $request->has('is_featured');
    
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products', 'public');
        }
    
        Product::create($data);
        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan!');
    }
    /**
     * Menampilkan form edit koper.
     */
    public function edit(Product $product)
    {
        $categories = Category::all(); // Gunakan model Category yang diimpor
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Memproses perubahan data koper.
     */
    public function update(Request $request, Product $product)
{
    $request->validate([
        'category_id' => 'required|exists:categories,id',
        'name'        => 'required|max:255',
        'price'       => 'required|numeric|min:0',
        'description' => 'required',
        'image'       => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        'size'        => 'nullable|string|max:255',
        'material'    => 'nullable|string|max:255',
    ]);

    $data = $request->all();
    $data['slug'] = Str::slug($request->name);
    $data['is_featured'] = $request->has('is_featured');

    if ($request->hasFile('image')) {
        if ($product->image && Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }
        $data['image'] = $request->file('image')->store('products', 'public');
    }

    $product->update($data);
    return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui!');
}

    /**
     * Menghapus produk koper.
     */
    public function destroy(Product $product)
    {
        if ($product->image && Storage::disk('public')->exists($product->image)) {
            Storage::disk('public')->delete($product->image);
        }

        $product->delete();
        return redirect()->route('products.index')->with('success', 'Koper berhasil dihapus dari katalog!');
    }
}