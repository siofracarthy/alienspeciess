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
        Schema::create('guides', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->date('date_of_publish');
            $table->text('description');
            $table->string('guide_url');
            $table->string('guide_image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guides');
    }
};

// public function down()
// {
//     Schema::table('guides', function (Blueprint $table){

//         $table->dropForeign(['species_id']);
//         $table->dropColumn('species_id')
//     });

// }
