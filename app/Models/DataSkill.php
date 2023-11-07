<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataSkill extends Model
{
    protected $table = "data_skills";
    protected $fillable = [
        'pengguna_id','skills','rating'];

    public function pengguna()
    {
        $this->belongsTo(Pengguna::class, 'pengguna_id', 'id');
    }
}