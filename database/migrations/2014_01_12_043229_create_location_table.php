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
        Schema::create('location', function (Blueprint $table) {
            $table->string('locationID', 10)->primary();
            $table->string('namaCabang');
            $table->string('alamat');
            $table->string('no_telp', 20);
            $table->string('email');
            $table->text('url_maps')->nullable();
            $table->enum('status', ['Cabang', 'Dummy', 'Pusat']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('location');
    }
};
