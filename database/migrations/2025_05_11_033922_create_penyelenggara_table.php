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
        Schema::create('penyelenggara', function (Blueprint $table) {
            $table->id('id_penyelenggara');
            $table->string('nama_penyelenggara');
            $table->string('logo_penyelenggara')->nullable();
            $table->text('alamat_penyelenggara')->nullable();
            $table->string('nohp_penyelenggara')->nullable();
            $table->string('email_penyelenggara')->nullable();
            $table->string('dokumen_ktp')->nullable();
            $table->string('dokumen_npwp')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penyelenggara');
    }
};
