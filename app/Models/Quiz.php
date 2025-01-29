<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;

protected $fillable = ['title', 'description', 'start_date', 'is_challenge', /* other fields */];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
    // Achievement Model
    public function quiz()
    {
        return $this->belongsTo(Quiz::class, 'quiz_id');
    }
    public function results()
    {
    return $this->hasMany(QuizResult::class);
    }
}

