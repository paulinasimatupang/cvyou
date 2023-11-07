<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPendidikan extends Model
{
    protected $table = "data_pendidikans";
    protected $primaryKey = "id";
    protected $fillable = [
        'id','pendidikanformal','gelar','institusipendidikan','prestasiakademik','keterampilan'];
    protected $guarded = [];
}
