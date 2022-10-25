<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiBarangMasuk extends Model
{
    // use HasFactory;
    protected $table = 'transaksi_barang_masuk';
    public function BarangUMKM(){
        return $this->belongsTo(BarangUMKM::class, 'barang_umkm_id', 'id');
    }
}
