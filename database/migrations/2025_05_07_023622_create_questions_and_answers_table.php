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
        Schema::create('questions_and_answers', function (Blueprint $table) {
            $table->id();
            $table->integer('learning_cycle')->nullable();
            $table->string('material')->nullable();
            $table->string('material_title')->nullable();
            $table->string('question')->nullable();
            $table->string('correct_answer')->nullable();
            $table->string('option_1')->nullable();    
            $table->string('option_2')->nullable();
            $table->string('option_3')->nullable();
            $table->string('option_4')->nullable();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions_and_answers');
    }
};
