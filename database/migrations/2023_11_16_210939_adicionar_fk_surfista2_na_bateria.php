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
        Schema::table('baterias', function (Blueprint $table) {
            $table->foreignId('surfista1')->constrained('surfistas')->nullable()->references('numero'); 
            $table->foreignId('surfista2')->constrained('surfistas')->nullable()->references('numero');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
