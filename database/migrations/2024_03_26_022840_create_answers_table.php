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
        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            $table->string('content');
            $table->boolean('isCorrect')->default(false);
            $table->timestamps();
            $table->softDeletes();

            $table->unsignedBigInteger('quiz_id');
            $table->foreign('quiz_id')
            ->references('id')
            ->on('quizzes')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('answers');
    }
};
