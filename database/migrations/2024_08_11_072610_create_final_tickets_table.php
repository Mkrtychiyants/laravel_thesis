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
        Schema::create('final_tickets', function (Blueprint $table) {
            $table->id();
            $table->integer('seans_id')->default(1);
            $table->integer('price')->default(100)->nullable();
            $table->string('seats')->unique();
            $table->integer('row')->default(1);
            $table->string('dateTime')->nullable();
            $table->timestamps();

            $table->foreign('seans_id')->references('id')->on('seans');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('final_tickets');
    }
};
