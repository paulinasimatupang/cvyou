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
            $table->string('pendidikanformal')->nullable()->default(null);
            $table->string('gelar')->nullable()->default(null);
            $table->string('institusipendidikan')->nullable()->default(null);
            $table->string('prestasiakademik')->nullable()->default(null);
            $table->string('keterampilan')->nullable()->default(null);
            $table->string('pengalaman')->nullable()->default(null);
            $table->text('deskripsi')->nullable()->default(null);
            $table->string('perusahaan')->nullable()->default(null);
            $table->date('tanggal_awal')->nullable()->default(null);
            $table->date('tanggal_akhir')->nullable()->default(null);
            $table->string('sertifikat')->nullable()->default(null);
            $table->string('suratrekomendasi')->nullable()->default(null);
            $table->string('portofolio')->nullable()->default(null);
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
