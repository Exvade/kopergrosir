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
        $products = Product::latest()->get();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Menampilkan form tambah koper.
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Memproses penyimpanan koper baru.
     */
    public function store(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
            'size' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048', // Max 2MB
        ]);

        // 2. Olah Data
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);

        // 3. Logika Upload Gambar
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
            $data['image'] = $imagePath;
        }

        // 4. Simpan ke Database
        Product::create($data);

        // 5. Redirect dengan Pesan Sukses
        return redirect()->route('products.index')->with('success', 'Koper berhasil ditambahkan ke katalog!');
    }

    /**
     * Menampilkan form edit koper.
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
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

        if ($request->hasFile('image')) {
            // Hapus foto lama jika ada foto baru yang diupload
            if ($product->image) {
                Storage::disk('public')->delete($product->image);
            }
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($data);

        return redirect()->route('products.index')->with('success', 'Data koper berhasil diperbarui!');
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
