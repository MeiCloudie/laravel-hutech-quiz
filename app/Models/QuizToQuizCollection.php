<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuizToQuizCollection extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'quizToquizCollections';

    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function quizCollection()
    {
        return $this->belongsTo(QuizCollection::class);
    }
}
