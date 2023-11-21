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
        Schema::create('surfistas', function (Blueprint $table) {
            $table->id('numero');
            $table->string('nome');
            $table->string('pais');
            $table->timestamps();
            $table->dropColumn('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surfistas');
    }
};
