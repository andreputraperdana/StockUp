<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SebastianBergmann\Type\VoidType;

class Role extends Model
{
    // use HasFactory;
    protected $table = 'role';
    public function User(){
        return $this->hasMany(User::class);
    }
}
