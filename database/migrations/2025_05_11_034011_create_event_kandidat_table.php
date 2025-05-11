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
        Schema::create('event_kandidat', function (Blueprint $table) {
            $table->id('id_kandidat');
            $table->string('no_kandidat');
            $table->string('foto_kandidat')->nullable();
            $table->text('deskripsi_kandidat')->nullable();
            $table->text('biografi_kandidat')->nullable();
            $table->unsignedBigInteger('event_id');
            $table->timestamps();

            $table->foreign('event_id')->references('id_event')->on('event')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('event_kandidat');
    }
};
