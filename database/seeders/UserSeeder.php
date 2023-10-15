<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('penggunas')->insert([
            'firstnm' => 'Paulina',
            'lastnm' => 'Simatupang',
            'tempatlahir' => 'Cirebon',
            'email' => 'pau@gmail.com',
            'notelpon' => '085959592907',
            'alamat' => 'Bandung',
            'pengalaman' => 'Konsultan IT',
            'deskripsi' => 'Konsultan IT' ,
            'perusahaan' => 'PT Gameloft',
            'tanggal_awal' => '2003-10-03',
            'tanggal_akhir' => '2010-10-03'
        ]);
    }
}
