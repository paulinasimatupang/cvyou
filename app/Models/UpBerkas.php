<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpBerkas extends Model
{
    use HasFactory;

    protected $table = "up_berkas";
    protected $fillable = [
        'pengguna_id', 'jenisberkas', 'judul', 'keterangan', 'berkas'];

    public function pengguna()
    {
        $this->belongsTo(Pengguna::class, 'pengguna_id', 'id');
    }
}