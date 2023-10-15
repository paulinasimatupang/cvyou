<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pengguna extends Authenticatable
{
    protected $table = 'penggunas';

    protected $fillable = [
        'firstnm',
        'lastnm',
        'password',
        'tempatlahir',
        'email',
        'notelpon',
        'alamat',
        'pendidikanformal',
        'gelar',
        'institusipendidikan',
        'prestasiakademik',
        'keterampilan',
       
    ];
    use HasFactory;
}
