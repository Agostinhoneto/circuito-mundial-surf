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
        Schema::create('bateria', function (Blueprint $table) {
            $table->id();
            /*
            $table->unsignedBigInteger('surfista_id');
            $table->foreign('surfista_id')->references('numero')->on('surfistas')->onDelete('cascade');
          /*
            $table->unsignedBigInteger('surfista_2')->nullable();
            $table->foreignId('surfista_2')->references('numero')->on('surfistas')->onDelete('cascade');
            */
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bateria');
    }
};
