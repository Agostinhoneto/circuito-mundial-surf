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
        Schema::create('baterias', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('surfista1')->constrained('surfistas')->nullable()->references('numero'); 
            $table->foreignId('surfista2')->constrained('surfistas')->nullable()->references('numero');
            $table->timestamps();
            $table->dropColumn('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('baterias');
    }
};
