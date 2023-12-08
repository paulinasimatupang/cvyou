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
        Schema::create('data_pribadis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pengguna_id')->index()->nullable();
            $table->foreign('pengguna_id')->references('pengguna_id')->on('penggunas')->onDelete('cascade');
            $table->string('poto');
            $table->string('firstnm');
            $table->string('lastnm');
            $table->string('tempatlahir');
            $table->date('tgllahir');
            $table->string('email');
            $table->bigInteger('notelpon');
            $table->string('alamat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_pribadis');
    }
};