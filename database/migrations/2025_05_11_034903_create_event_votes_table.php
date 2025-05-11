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
        Schema::create('event_votes', function (Blueprint $table) {
            $table->id('id_vote');
            $table->string('token_vote');
            $table->unsignedBigInteger('kandidat_id');
            $table->unsignedBigInteger('event_id');
            $table->integer('kuantitas_vote');
            $table->decimal('total_harga_vote', 10, 2)->nullable();
            $table->string('nama_voters');
            $table->string('nohp_voters');
            $table->string('snap_token')->nullable();
            $table->string('metode_pembayaran')->nullable();
            $table->string('status_pembayaran')->nullable();
            $table->text('pesan_voters')->nullable();
            $table->timestamps();

            $table->foreign('kandidat_id')->references('id_kandidat')->on('event_kandidat')->onDelete('cascade');
            $table->foreign('event_id')->references('id_event')->on('event')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_votes');
    }
};
