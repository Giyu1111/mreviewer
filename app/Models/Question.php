<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\QuizAttemptAnswer;
use Illuminate\Validation\ValidationException;

class Question extends Model
{
    protected $fillable = [
        'subject_id',
        'lesson_id',
        'question_text',
        'explanation',
        'difficulty',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }

    public function lesson(): BelongsTo
    {
        return $this->belongsTo(Lesson::class);
    }

    public function options(): HasMany
    {
        return $this->hasMany(QuestionOption::class)
            ->orderBy('sort_order');
    }
}
