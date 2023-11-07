<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPekerjaan extends Model
{
    use HasFactory;

    protected $table = "data_pekerjaans";
    protected $fillable = [
        'pengguna_id', 'pengalaman', 'deskripsi', 'perusahaan', 'tanggal_awal', 'tanggal_akhir'];

    public function pengguna()
    {
        return $this->belongsTo(Pengguna::class);
    }
}