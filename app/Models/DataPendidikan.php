<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPendidikan extends Model
{
    use HasFactory;

    protected $table = "data_pendidikans";
    protected $fillable = [
        'pengguna_id', 'pendidikanformal', 'gelar', 'institusipendidikan', 'prestasiakademik', 'Keterampilan'];

    public function pengguna()
    {
        $this->hasMany(Pengguna::class, 'pengguna_id', 'id');
    }
}