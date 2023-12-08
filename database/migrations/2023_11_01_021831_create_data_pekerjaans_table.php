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
        Schema::create('data_pekerjaans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pengguna_id')->index()->nullable();
            $table->foreign('pengguna_id')->references('pengguna_id')->on('penggunas')->onDelete('cascade');
            $table->string('pengalaman')->nullable()->default(null);
            $table->text('deskripsi')->nullable()->default(null);
            $table->string('perusahaan')->nullable()->default(null);
            $table->date('tanggal_awal')->nullable()->default(null);
            $table->date('tanggal_akhir')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_pekerjaans');
    }
};