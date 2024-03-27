<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Record extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'records';

    protected $fillable = ['user_id'];

    protected $attributes = [
    ];

    public function quiz() {
        return $this->belongsTo(Quiz::class);
    }

    public function room() {
        return $this->belongsTo(Room::class);
    }

    public function answer() {
        return $this->belongsTo(Answer::class);
    }
}
