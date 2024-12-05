<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['outlet_id', 'nomor_meja', 'nama', 'metode_pembayaran'];

    public function details()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public function outlet()
    {
        return $this->belongsTo(Outlet::class);
    }
}
