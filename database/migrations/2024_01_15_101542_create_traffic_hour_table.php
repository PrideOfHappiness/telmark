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
        Schema::create('traffic_login', function (Blueprint $table) {
            $table->id('trafficID');
            $table->string('userID');
            $table->dateTime('login')->nullable();
            $table->dateTime('logout')->nullable();
            $table->timestamps();

            $table->foreign('userID')->references('userID')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('traffic_hour');
    }
};
