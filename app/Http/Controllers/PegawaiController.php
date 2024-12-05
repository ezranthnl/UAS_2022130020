<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;

class PegawaiController extends Controller
{
    public function index()
    {
        $pegawais = Pegawai::paginate(6); // Menampilkan 6 pegawai per halaman
        return view('detail-outlet', compact('pegawais'));
    }
}
