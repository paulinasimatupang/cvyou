<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('penggunas', function (Blueprint $table) {
            $table->id();
            $table->string('firstnm');
            $table->string('lastnm');
            $table->string('tempatlahir');
            $table->date('tgllahir');
            $table->string('email');
            $table->bigInteger('notelpon');
            $table->string('alamat');
            $table->string('sertifikat');
            $table->string('suratrekomendasi');
            $table->string('portofolio');
            $table->string('pengalaman');
            $table->text('deskripsi');
            $table->string('perusahaan');
            $table->date('tanggal_awal');
            $table->date('tanggal_akhir');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penggunas');
    }
};
