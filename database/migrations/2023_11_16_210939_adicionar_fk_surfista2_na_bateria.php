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
        Schema::table('bateria', function (Blueprint $table) {
            $table->foreignId('fk_id_1')->constrained('surfistas')->nullable()->references('numero'); 
            $table->foreignId('fk_id_2')->constrained('surfistas')->nullable()->references('numero');
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
