<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPekerjaan extends Model
{
<<<<<<< Updated upstream
    use HasFactory;
=======
    protected $table = "data_pekerjaans";
    protected $primaryKey = "id";
    protected $fillable = [
        'id','pengalaman','deskripsi','perusahaan','tanggal_awal', 'tanggal_akhir'];
    protected $guarded = [];
>>>>>>> Stashed changes
}
