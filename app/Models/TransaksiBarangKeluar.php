<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiBarangKeluar extends Model
{
    protected $table = 'transaksi_barang_keluar';
    public function BarangUMKM(){
        return $this->belongsTo(BarangUMKM::class, 'barang_umkm_id', 'id');
    }
    
}
