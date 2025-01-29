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
        Schema::table('achievements', function (Blueprint $table) {
            $table->unsignedBigInteger('quiz_id')->nullable(); // Add quiz_id column
        });
    }
    
    public function down()
    {
        Schema::table('achievements', function (Blueprint $table) {
            $table->dropColumn('quiz_id'); // Drop quiz_id column if rolled back
        });
    }
    
};
