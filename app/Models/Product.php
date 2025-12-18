<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id', 'name', 'slug', 'description', 
        'price', 'material', 'size', 'image', 
        'is_package', 'package_items', 'is_featured'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function getWhatsAppLink()
    {
        $nomorWA = "628123456789"; // Ini nanti bisa diambil dari tabel Settings
        $pesan = "Halo Admin, saya ingin bertanya tentang koper *" . $this->name . "* dengan harga Rp" . number_format($this->price, 0, ',', '.') . ". Apakah masih tersedia?";

        return "https://api.whatsapp.com/send?phone=" . $nomorWA . "&text=" . urlencode($pesan);
    }
}
