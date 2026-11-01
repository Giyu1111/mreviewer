<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subject extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'icon',
        'is_active',
        'code',
        'section',
        'schedule',
        'lecture_hours',
        'lab_hours',
        'units',
        'instructor_id',
        'instructor_name',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'lecture_hours' => 'decimal:1',
            'lab_hours' => 'decimal:1',
            'units' => 'decimal:1',
        ];
    }

    public function instructor(): BelongsTo
    {
        return $this->belongsTo(User::class, 'instructor_id');
    }

    public function lessons(): HasMany
    {
        return $this->hasMany(Lesson::class);
    }
}
