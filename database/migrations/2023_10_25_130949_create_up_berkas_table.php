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
        Schema::create('up_berkas', function (Blueprint $table) {
            $table->id();
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
        Schema::dropIfExists('up_berkas');
    }
};