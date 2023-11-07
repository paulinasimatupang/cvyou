<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPribadi extends Model
{
    use HasFactory;

    protected $table = 'data_pribadis';
    protected $fillable = [
        'pengguna_id', 'poto', 'firstnm', 'lastnm', 'tempatlahir', 'tgllahir', 'email', 'notelpon', 'alamat'];

    public function pengguna()
    {
        $this->belongsTo(Pengguna::class, 'pengguna_id', 'id');
    }
}