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

    public function quizzes() {
        return $this->belongsToMany(Quiz::class, 'quiz_to_quiz_collections', 'quiz_collection_id','quiz_id');
    }

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}
