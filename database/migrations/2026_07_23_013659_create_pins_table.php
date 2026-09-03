<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Membuat tabel pins
     */
    public function up(): void
    {
        Schema::create('pins', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade');

            $table->string('title');

            $table->text('description')
                ->nullable();

            $table->string('media');

            // Jenis media: foto, video, atau audio
            $table->enum('media_type', [
                'image',
                'video',
                'audio'
            ]);

            $table->timestamps();
        });
    }

    /**
     * Menghapus tabel pins
     */
    public function down(): void
    {
        Schema::dropIfExists('pins');
    }
};