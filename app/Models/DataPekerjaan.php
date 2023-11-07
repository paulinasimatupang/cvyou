<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPekerjaan extends Model
{
    protected $table = "data_pekerjaans";
    protected $primaryKey = "id";
    protected $fillable = [
        'id','pengalaman','deskripsi','perusahaan','tanggal_awal', 'tanggal_akhir'];
    protected $guarded = [];
}
