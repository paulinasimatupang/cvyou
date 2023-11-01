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
        Schema::create('data_pendidikans', function (Blueprint $table) {
            $table->id();
            $table->string('pendidikanformal')->nullable()->default(null);
            $table->string('gelar')->nullable()->default(null);
            $table->string('institusipendidikan')->nullable()->default(null);
            $table->string('prestasiakademik')->nullable()->default(null);
            $table->string('keterampilan')->nullable()->default(null);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_pendidikans');
    }
};