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
        Schema::create('section_lectures', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('lecture_id');
            $table->unsignedBigInteger('section_id');
            $table->unsignedMediumInteger('order');


            $table->foreign('lecture_id')->references('id')->on('lectures');
            $table->foreign('section_id')->references('id')->on('sections');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('section_lectures');
    }
};
