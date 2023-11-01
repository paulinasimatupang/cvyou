<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpBerkas extends Model
{
    protected $table = "up_berkas";
    protected $primaryKey = "id";
    protected $fillable = ['id','sertifikat','suratrekomendasi','portofolio'];
}
