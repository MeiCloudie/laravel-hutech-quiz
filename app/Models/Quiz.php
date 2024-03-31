<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Quiz extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'quizzes';

    protected $fillable = ['content', 'explaination'];

    protected $attributes = [];

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    public function quizCollections()
    {
        return $this->belongsToMany(QuizCollection::class, 'quiz_to_quiz_collections', 'quiz_id', 'quiz_collection_id');
    }

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }

    public function records()
    {
        return $this->hasMany(Record::class);
    }
}
