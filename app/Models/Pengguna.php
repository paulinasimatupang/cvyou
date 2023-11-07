<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna1 extends Model
{
    protected $table = "penggunas";
    protected $primaryKey = "id";
    protected $fillable = ['id', 'email', 'password'];
}
