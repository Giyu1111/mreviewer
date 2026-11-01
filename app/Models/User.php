<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Fields that can be assigned through normal form submissions.
     * Role and account status are deliberately excluded for security.
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_active' => 'boolean',
        ];
    }

    /**
     * Subjects assigned to this instructor.
     */
    public function subjects(): HasMany
    {
        return $this->hasMany(Subject::class, 'instructor_id');
    }

    public function isInstructor(): bool
    {
        return strtolower((string) $this->role) === 'instructor';
    }

    public function isStudent(): bool
    {
        return strtolower((string) $this->role) === 'student';
    }
}
