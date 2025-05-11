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
        Schema::create('event', function (Blueprint $table) {
            $table->id('id_event');
            $table->string('url_event');
            $table->string('nama_event');
            $table->date('tgl_start_event');
            $table->date('tgl_end_event');
            $table->string('lokasi_event')->nullable();
            $table->decimal('harga_event', 10, 2)->nullable();
            $table->text('deskripsi_event')->nullable();
            $table->string('benner_event')->nullable();
            $table->integer('max_vote')->nullable();
            $table->unsignedBigInteger('penyelenggara_id');
            $table->timestamps();

            $table->foreign('penyelenggara_id')->references('id_penyelenggara')->on('penyelenggara')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event');
    }
};
