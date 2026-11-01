<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class QuizAttempt extends Model
{
    protected $fillable = [
        'user_id',
        'lesson_id',
        'score',
        'total_questions',
        'started_at',
        'completed_at',
    ];

    protected function casts(): array
    {
        return [
            'score' => 'integer',
            'total_questions' => 'integer',
            'started_at' => 'datetime',
            'completed_at' => 'datetime',
        ];
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function lesson(): BelongsTo
    {
        return $this->belongsTo(Lesson::class);
    }

    public function answers(): HasMany
    {
        return $this->hasMany(QuizAttemptAnswer::class);
    }
}
