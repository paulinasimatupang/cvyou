<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataSkill extends Model
{
    protected $table = "data_skills";
    protected $primaryKey = "id";
    protected $fillable = ['id','skills','rating'];
}
