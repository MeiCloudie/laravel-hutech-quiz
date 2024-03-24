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

    public $timestamps = false; 

    // protected $attributes = [
    // ];

    // public function answers() {
    //     return $this->hasMany(Answer::class);
    // }
}
