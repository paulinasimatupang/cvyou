<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    use HasFactory;

    protected $table = 'penggunas';
    protected $fillable = ['email', 'password'];

    public function dataPribadi()
    {
        return $this->hasOne(DataPribadi::class, 'pengguna_id', 'id');
    }

    public function dataSkill()
    {
        return $this->hasOne(DataSkill::class, 'pengguna_id', 'id');
    }

    public function dataPendidikan()
    {
        return $this->hasMany(DataPendidikan::class, 'pengguna_id', 'id');
    }

    public function dataPekerjaan()
    {
        return $this->hasMany(DataPekerjaan::class, 'pengguna_id', 'id');
    }

    public function upBerkas()
    {
        return $this->hasOne(UpBerkas::class, 'pengguna_id', 'id');
    }
}