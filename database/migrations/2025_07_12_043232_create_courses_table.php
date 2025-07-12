<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\LevelType;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->string('bio');
            $table->string('slug')->unique();
            $table->text('description');
            $table->integer('price');
            $table->integer('final_price');
            $table->json('learnings');
            $table->json('for');
            $table->json('requirments');
            $table->string('thumbnail');
            $table->enum('level',LevelType::getValues());
            $table->unsignedBigInteger('instructor_id');


            $table->foreign('instructor_id')->references('id')->on('users');

            $table->index('title');
            $table->index('level');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
