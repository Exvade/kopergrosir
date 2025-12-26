<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Package; // Panggil model Package
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::latest()->get();
        return view('admin.packages.index', compact('packages'));
    }

    public function create()
    {
        return view('admin.packages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required|max:255',
            'package_items' => 'required',
            'image'         => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        $data['is_featured'] = $request->has('is_featured');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('packages', 'public');
        }

        Package::create($data); // Simpan ke tabel packages

        return redirect()->route('admin.packages.index')->with('success', 'Paket Berhasil Ditambahkan!');
    }

    public function edit(Package $package)
    {
        return view('admin.packages.edit', compact('package'));
    }

    public function update(Request $request, Package $package)
    {
        $request->validate([
            'name'          => 'required|max:255',
            'package_items' => 'required',
            'image'         => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $data = $request->all();
        $data['slug'] = \Illuminate\Support\Str::slug($request->name);
        $data['is_featured'] = $request->has('is_featured');

        if ($request->hasFile('image')) {
            // Hapus foto lama jika ada
            if ($package->image && \Illuminate\Support\Facades\Storage::disk('public')->exists($package->image)) {
                \Illuminate\Support\Facades\Storage::disk('public')->delete($package->image);
            }
            $data['image'] = $request->file('image')->store('packages', 'public');
        }

        $package->update($data);

        return redirect()->route('admin.packages.index')->with('success', 'Paket berhasil diperbarui!');
    }

    public function destroy(Package $package)
    {
        // Hapus foto dari storage
        if ($package->image && \Illuminate\Support\Facades\Storage::disk('public')->exists($package->image)) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($package->image);
        }

        $package->delete();

        return redirect()->route('admin.packages.index')->with('success', 'Paket berhasil dihapus!');
    }
}