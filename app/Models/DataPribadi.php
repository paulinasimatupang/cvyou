<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataPribadi extends Model
{
<<<<<<< Updated upstream
    use HasFactory;
=======
    protected $table = "data_pribadis";
    protected $primaryKey = "id";
    protected $fillable = [
        'id','datapendidikan_id', 'poto','firstnm','lastnm', 'tempatlahir', 'tgllahir', 'email', 'notelpon', 'alamat'];

    public function data_pendidikans()
    {
        return $this->belongsTo(DataPendidikan::class);
    }
>>>>>>> Stashed changes
}
