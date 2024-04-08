<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'rooms';

    protected $fillable = ['code', 'is_closed', 'owner_id'];

    protected $attributes = [
        'is_closed' => false
    ];

    public function currentQuiz()
    {
        return $this->belongsTo(Quiz::class);
    }

    public function quizCollection()
    {
        return $this->belongsTo(QuizCollection::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function records()
    {
        return $this->hasMany(Record::class);
    }

    

    public static function generateCode($length = 6)
    {
        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        return substr(str_shuffle(str_repeat($pool, 5)), 0, $length);
    }
}
