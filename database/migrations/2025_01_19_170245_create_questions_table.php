<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('questions', function (Blueprint $table) {
        $table->id();
        $table->foreignId('quiz_id')->constrained()->onDelete('cascade');
        $table->text('question_text');
        $table->string('option_a');
        $table->string('option_b');
        $table->string('option_c');
        $table->string('option_d');
        $table->string('correct_option'); // Stores A, B, C, or D
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('questions');
}

};
