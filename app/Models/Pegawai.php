<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'pegawai'; // Menyesuaikan dengan nama tabel
    protected $fillable = ['nama', 'posisi', 'gambar', 'outlet_id'];
    public function outlet()
    {
        return $this->belongsTo(Outlet::class);
    }
}
