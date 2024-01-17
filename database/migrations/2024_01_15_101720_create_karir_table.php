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
        Schema::create('karir', function (Blueprint $table) {
            $table->string('karirID', 10)->primary();
            $table->string('namaKarir');
            $table->text('artikelKarir');
            $table->string('userID');
            $table->timestamps();

            $table->foreign('userID')->references('userID')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karir');
    }
};
