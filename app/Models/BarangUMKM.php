<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangUMKM extends Model
{
    // use HasFactory;
    protected $table = 'barang_umkm';
    public function User(){
        return $this->belongsTo(User::class);
    }

    public function TransaksiBarangMasuk(){
        return $this->hasMany(TransaksiBarangMasuk::class, 'barang_umkm_id', 'id');
    }

    // public function TransaksiBarangKeluar(){
    //     return $this->hasMany(TransaksiBarangKeluar::class, 'barang_umkm_id', 'id');
    // }
}
