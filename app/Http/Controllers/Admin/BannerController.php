<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() {
        $banners = \App\Models\Banner::latest()->get();
        return view('admin.banners.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048', // Validasi gambar wajib
            'link'  => 'nullable|url'
        ]);

        $data = $request->all();

        // Pastikan proses upload ini berjalan
        if ($request->hasFile('image')) {
            // Simpan gambar dan ambil path-nya
            $path = $request->file('image')->store('banners', 'public');
            $data['image'] = $path; // Masukkan path ke array data untuk disimpan ke DB
        }

        $data['is_active'] = $request->has('is_active');
        
        \App\Models\Banner::create($data);

        return back()->with('success', 'Banner Image berhasil diunggah!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, \App\Models\Banner $banner) {
        $banner->update($request->all());
        return back()->with('success', 'Banner berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(\App\Models\Banner $banner) {
        $banner->delete();
        return back()->with('success', 'Banner dihapus!');
    }
}
