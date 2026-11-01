<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\QuizAttemptAnswer;
use Illuminate\Validation\ValidationException;

class Lesson extends Model
{
    protected $fillable = [
        'subject_id',
        'lesson_number',
        'title',
        'content',
        'material_path',
        'material_original_name',
        'material_mime_type',
        'material_size',
        'is_published',
    ];

    protected function casts(): array
    {
        return [
            'lesson_number' => 'integer',
            'material_size' => 'integer',
            'is_published' => 'boolean',
        ];
    }

    public function subject(): BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }

    public function questions(): HasMany
    {
        return $this->hasMany(Question::class);
    }
}
