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
        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->timestamps();

            $table->unsignedBigInteger('room_id');
            $table->unsignedBigInteger('quiz_id');
            $table->unsignedBigInteger('answer_id');
            
            $table->foreign('room_id')
            ->references('id')
            ->on('rooms')
            ->onDelete('cascade');

            $table->foreign('quiz_id')
            ->references('id')
            ->on('quizzes')
            ->onDelete('cascade');

            $table->foreign('answer_id')
            ->references('id')
            ->on('answers')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('records');
    }
};
