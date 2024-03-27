<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'rooms';

    protected $fillable = ['code', 'owner_id'];

    protected $attributes = [];

    public function currentQuiz() {
        return $this->belongsTo(Quiz::class);
    }

    public function quizCollection() {
        return $this->belongsTo(QuizCollection::class);
    }
}
