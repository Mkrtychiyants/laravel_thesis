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
        Schema::create('seans', function (Blueprint $table) {
            $table->id();
            $table->integer('room_id')->default(1);
            $table->integer('movie_id')->default(1);;
            $table->dateTime('start');
            $table->dateTime('finish');
            $table->timestamps();
        });
  
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seans');
    }
};
