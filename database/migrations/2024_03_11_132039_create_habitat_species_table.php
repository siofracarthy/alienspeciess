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
        Schema::create('habitat_species', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('habitat_id');
            $table->unsignedBigInteger('species_id');

            $table->foreign('habitat_id')->references('id')->on('habitats')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('species_id')->references('id')->on('species')->onUpdate('cascade')->onDelete('restrict');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('habitat_species');
    }
};
