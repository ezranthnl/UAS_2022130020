<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    use HasFactory;

    protected $table = 'outlets';

    // Menentukan kolom yang bisa diisi
    protected $fillable = ['nama', 'foto', 'alamat'];  // Kolom yang bisa diisi
}
