<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function index()
    {
        $tables = Table::all(); // Ambil semua data meja
        return view('reservations.index', compact('tables'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'table_id' => 'required|exists:tables,id',
            'reservation_time' => 'required|date|after:now',
        ]);

        Reservation::create([
            'table_id' => $request->table_id,
            'user_id' => Auth::id(),
            'reservation_time' => $request->reservation_time,
        ]);

        return redirect()->route('reservations.index')->with('success', 'Reservasi berhasil dibuat!');
    }
}
