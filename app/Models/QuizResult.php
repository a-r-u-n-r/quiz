<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizResult extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'quiz_id',
        'score',
    ];

    /**
     * Get the user that owns the quiz result.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the quiz that this result belongs to.
     */
    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }
}
