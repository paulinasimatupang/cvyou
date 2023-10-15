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
            $table->string('password');
            $table->string('tempatlahir')->nullable();
            $table->string('email');
            $table->bigInteger('notelpon')->nullable();
            $table->string('alamat')->nullable();
            $table->string('pendidikanformal')->nullable();
            $table->string('gelar')->nullable();
            $table->string('institusipendidikan')->nullable();
            $table->string('prestasiakademik')->nullable();
            $table->string('keterampilan')->nullable();
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
