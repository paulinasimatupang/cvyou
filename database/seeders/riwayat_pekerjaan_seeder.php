<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class riwayat_pekerjaan_seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() {
        DB::table('forms')->insert([
            'pengalaman' => 'Konsultan IT',
            'deskripsi' => 'Konsultan IT' ,
            'perusahaan' => 'PT Gameloft',
            'tanggal_awal' => '2003-10-03',
            'tanggal_akhir' => '2010-10-03'
        ]);
    }
}
