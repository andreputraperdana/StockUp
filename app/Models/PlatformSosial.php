<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlatformSosial extends Model
{
    protected $table = 'platform_sosial';
    public function User(){
        return $this->belongsTo(User::class);
    }
}
