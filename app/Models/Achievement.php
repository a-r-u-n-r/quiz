<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Achievement extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'achievements'; // Optional if the table name matches the model's plural form.

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'quiz_id', // Add quiz_id to fillable array
        'title',
        'description',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    /**
     * Relationships
     */

    // Example: Link achievements to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Example: Link achievements to quizzes (if related)
    public function quiz()
    {
        return $this->belongsTo(Quiz::class);
    }
}
