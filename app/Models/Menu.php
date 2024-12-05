<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ['nama', 'harga', 'deskripsi', 'gambar', 'outlet_id'];

    public function outlet()
    {
        return $this->belongsTo(Outlet::class);
    }
}

