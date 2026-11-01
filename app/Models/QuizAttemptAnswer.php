<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QuizAttemptAnswer extends Model
{
    protected $fillable = [
        'quiz_attempt_id',
        'question_id',
        'selected_option_id',
        'option_order',
        'question_order',
        'is_correct',
        'answered_at',
    ];

    protected function casts(): array
    {
        return [
            'option_order' => 'array',
            'question_order' => 'integer',
            'is_correct' => 'boolean',
            'answered_at' => 'datetime',
        ];
    }

    public function attempt(): BelongsTo
    {
        return $this->belongsTo(QuizAttempt::class, 'quiz_attempt_id');
    }

    public function question(): BelongsTo
    {
        return $this->belongsTo(Question::class);
    }

    public function selectedOption(): BelongsTo
    {
        return $this->belongsTo(
            QuestionOption::class,
            'selected_option_id'
        );
    }
}
