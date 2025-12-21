<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index()
    {
        $banners = Banner::latest()->get();
        return view('admin.banners.index', compact('banners'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
            'link'  => 'nullable|url'
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('banners', 'public');
        }

        $data['is_active'] = $request->has('is_active');
        
        Banner::create($data);

        return back()->with('success', 'Banner berhasil ditambahkan!');
    }

    // FUNGSI EDIT (Toggle Aktif/Nonaktif)
    public function update(Request $request, Banner $banner)
{
    // 1. Jika ini adalah "Quick Toggle" (Klik tombol Aktif/Nonaktif di tabel)
    if ($request->has('is_active') && !$request->has('title')) {
        $banner->update([
            'is_active' => $request->is_active ?? 0
        ]);
        return back()->with('success', 'Status banner berhasil diubah!');
    }

    // 2. Jika ini adalah Update Full dari Modal Edit
    $request->validate([
        'title' => 'required|max:255',
        'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        'link'  => 'nullable|url'
    ]);

    $data = $request->only(['title', 'link']);

    // Logika Ganti Gambar
    if ($request->hasFile('image')) {
        if ($banner->image) {
            \Storage::disk('public')->delete($banner->image);
        }
        $data['image'] = $request->file('image')->store('banners', 'public');
    }

    // Pastikan is_active tetap aman (jika di modal tidak ada checkbox is_active, 
    // kita biarkan status lamanya atau ambil dari request jika ada)
    if ($request->has('is_active')) {
        $data['is_active'] = $request->is_active;
    }

    $banner->update($data);

    return back()->with('success', 'Detail banner berhasil diperbarui!');
}

    // FUNGSI DELETE
    public function destroy(Banner $banner)
    {
        // 1. Hapus file fisik gambar dari folder storage agar tidak menumpuk
        if ($banner->image) {
            Storage::disk('public')->delete($banner->image);
        }

        // 2. Hapus data dari database
        $banner->delete();

        return back()->with('success', 'Banner berhasil dihapus selamanya!');
    }
}