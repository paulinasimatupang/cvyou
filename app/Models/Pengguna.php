<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna1 extends Model
{
    protected $table = "pengguna";
    protected $primaryKey = "id";
    Protected $fillable = ['id', 'email', 'password'];
}
