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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('owner_id');
            $table->timestamps();
            $table->softDeletes();

            
            $table->unsignedBigInteger('current_quiz_id');
            $table->unsignedBigInteger('quiz_collection_id');

            $table->foreign('current_quiz_id')
            ->references('id')
            ->on('quizzes')
            ->onDelete('cascade');
            $table->foreign('quiz_collection_id')
            ->references('id')
            ->on('quiz_collections')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
