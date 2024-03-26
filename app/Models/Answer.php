<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Answer extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'answers';

    protected $fillable = ['content', 'isCorrect'];

    protected $attributes = [
        'isCorrect' => false
    ];

    public function quiz() {
        return $this->belongsTo(Quiz::class);
    }
}
