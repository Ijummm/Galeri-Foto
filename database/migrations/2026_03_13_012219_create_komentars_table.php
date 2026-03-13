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
        Schema::create('komentarfoto', function (Blueprint $table) {
            $table->id('komentarID');
            $table->foreignId('fotoID')->constrained('foto', 'fotoID')->onDelete('cascade');
            $table->foreignId('userID')->constrained('users', 'userID')->onDelete('cascade');
            $table->text('isiKomentar');
            $table->date('tanggalKomentar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('komentars');
    }
};
