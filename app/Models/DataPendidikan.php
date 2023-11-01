<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPendidikan extends Model
{
<<<<<<< Updated upstream
    Protected $fillable = ['id', 'pendidikanformal', 'gelar', 'institusipendidikan', 'prestasiakademik', 'keterampilan'];
}
=======
    protected $table = "data_pendidikans";
    protected $primaryKey = "id";
    protected $fillable = [
        'id','pendidikanformal','gelar','institusipendidikan', 'prestasiakademik', 'Keterampilan'];

    public function data_pribadis()
    {
        return $this->belongsTo(DataPribadi::class);
    }
}
>>>>>>> Stashed changes
