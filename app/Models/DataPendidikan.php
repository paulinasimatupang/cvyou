<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPendidikan extends Model
{
    Protected $fillable = ['id', 'pendidikanformal', 'gelar', 'institusipendidikan', 'prestasiakademik', 'keterampilan'];
}