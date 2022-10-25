<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangPemasok extends Model
{
    // use HasFactory;
    protected $table = 'barang_pemasok';
    public function User(){
        return $this->belongsTo(User::class);
    }
}
