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
            $table->string('code')->unique();
            $table->boolean('is_closed')->default(false);
            $table->integer('duration')->default(30);
            $table->timestamps();
            $table->softDeletes();
            
            
            $table->unsignedBigInteger('owner_id');
            $table->unsignedBigInteger('current_quiz_id')->nullable();
            $table->unsignedBigInteger('quiz_collection_id');

            $table->foreign('owner_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');

            $table->foreign('current_quiz_id')
            ->nullable()
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
