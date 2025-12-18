<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        // Ambil data atau buat baru jika kosong
        $waNumber = Setting::where('key', 'wa_number')->first();
        $waMessage = Setting::where('key', 'wa_message')->first();
        
        return view('admin.settings.index', compact('waNumber', 'waMessage'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'wa_number' => 'required|numeric',
            'wa_message' => 'required'
        ]);

        Setting::updateOrCreate(['key' => 'wa_number'], ['value' => $request->wa_number]);
        Setting::updateOrCreate(['key' => 'wa_message'], ['value' => $request->wa_message]);

        return back()->with('success', 'Pengaturan WhatsApp berhasil diperbarui!');
    }
}