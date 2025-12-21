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
        // 1. Validasi Input
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name'        => 'required|max:255',
            'price'       => 'required|numeric|min:0', // Pastikan harga tidak negatif
            'description' => 'required',
            'image'       => 'required|image|mimes:jpg,png,jpeg|max:2048', // Gambar wajib saat buat baru
            
            // Validasi opsional tergantung tipe produk
            'size'          => 'nullable|string|max:255',
            'material'      => 'nullable|string|max:255',
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
        $categories = Category::all(); // Gunakan model Category yang diimpor
        return view('admin.products.edit', compact('product', 'categories'));
    }

    /**
     * Memproses perubahan data koper.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id', // Tambahkan validasi kategori
            'name'        => 'required|max:255',
            'price'       => 'required|numeric|min:0',
            'description' => 'required',
            'image'       => 'nullable|image|mimes:jpg,png,jpeg|max:2048', // Gambar tidak wajib diupdate

            // Validasi ini hanya jika bukan paket, jika paket maka package_items yang divalidasi
            'size'          => $request->has('is_package') ? 'nullable|string|max:255' : 'nullable|string|max:255', // Ubah ke nullable
            'material'      => $request->has('is_package') ? 'nullable|string|max:255' : 'nullable|string|max:255',
            'package_items' => $request->has('is_package') ? 'nullable|string' : 'nullable|string', // Ubah ke nullable
            // 'stock'         => 'required|numeric|min:0', // Jika Anda memiliki field 'stock', pastikan ada di form dan divalidasi
        ]);

        $data = $request->except(['_token', '_method']); // Ambil semua kecuali token dan method
        $data['slug'] = Str::slug($request->name);
        
        // Pastikan checkbox selalu punya nilai (0 atau 1)
        $data['is_package'] = $request->has('is_package');
        $data['is_featured'] = $request->has('is_featured');

        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($product->image && Storage::disk('public')->exists($product->image)) {
                Storage::disk('public')->delete($product->image);
            }
            // Simpan gambar baru
            $data['image'] = $request->file('image')->store('products', 'public');
        }

        // Jika produk diubah dari paket menjadi non-paket, kosongkan package_items
        if (!$data['is_package']) {
            $data['package_items'] = null;
        } else {
            // Jika produk diubah dari non-paket menjadi paket, kosongkan size & material
            $data['size'] = null;
            $data['material'] = null;
        }


        $product->update($data);

        return redirect()->route('products.index')->with('success', 'Katalog berhasil diperbarui!');
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