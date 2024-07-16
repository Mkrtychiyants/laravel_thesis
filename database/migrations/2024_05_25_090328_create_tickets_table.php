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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->integer('seans_id')->default(1);
            $table->integer('seat_id')->default(1);
            $table->integer('price')->default(100);
            $table->integer('is_vip')->default(false);
            $table->integer('is_blocked')->default(false);
            $table->boolean('is_selected')->default(false);
            $table->integer('is_purchased')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
