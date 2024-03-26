<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class QuizCollection extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'quiz_collections';

    protected $fillable = ['name'];

    public function quizToQuizCollections() {
        return $this->hasMany(QuizToQuizCollection::class);
    }
}
