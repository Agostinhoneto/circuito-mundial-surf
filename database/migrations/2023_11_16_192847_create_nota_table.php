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
        Schema::create('nota', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('onda')->nullable();
            $table->foreign('onda')->references('id')->on('onda')->onDelete('cascade');
            $table->string('notaParcial1');
            $table->string('notaParcial2');
            $table->string('notaParcial3');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nota');
    }
};
