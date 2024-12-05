<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    protected $fillable = ['nama', 'alamat', 'gambar'];
    public function pegawais()
    {
        return $this->hasMany(Pegawai::class);
    }

    public function menus()
    {
        return $this->hasMany(Menu::class);
    }
}
