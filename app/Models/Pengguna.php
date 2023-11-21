<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;

class Pengguna extends Model implements Authenticatable
{
    use AuthenticableTrait;
    use HasFactory;

    protected $table = 'penggunas';
    protected $fillable = ['pengguna_id','name','email', 'password',];

    public function dataPribadi()
    {
        $this->hasOne(DataPribadi::class, 'pengguna_id', 'id');
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
        return $this->hasMany(DataPekerjaan::class, 'penggunas_id', 'id');
    }

    public function upBerkas()
    {
        return $this->hasOne(UpBerkas::class, 'pengguna_id', 'id');
    }
}
