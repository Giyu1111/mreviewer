<?php

namespace App\Console\Commands;

use App\Models\Subject;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateInstructorAccount extends Command
{
    protected $signature = 'instructor:create';

    protected $description = 'Create an instructor account and assign one subject';

    public function handle(): int
    {
        $name = trim((string) $this->ask('Instructor full name'));
        $email = strtolower(trim((string) $this->ask('Instructor email')));
        $code = strtoupper(trim((string) $this->ask('Subject code')));

        if ($name === '') {
            $this->error('Instructor name is required.');

            return self::FAILURE;
        }

        if (! filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->error('Enter a valid email address.');

            return self::FAILURE;
        }

        if (User::where('email', $email)->exists()) {
            $this->error('That email address is already registered.');

            return self::FAILURE;
        }

        $subject = Subject::whereRaw('UPPER(code) = ?', [$code])
            ->where('is_active', true)
            ->first();

        if (! $subject) {
            $this->error('Subject not found. Check the subject code.');

            return self::FAILURE;
        }

        if ($subject->instructor_id !== null) {
            $this->error('This subject already has an assigned instructor.');

            return self::FAILURE;
        }

        $password = (string) $this->secret('Enter a temporary password (minimum 8 characters)');
        $confirmation = (string) $this->secret('Confirm the password');

        if (strlen($password) < 8) {
            $this->error('The password must contain at least 8 characters.');

            return self::FAILURE;
        }

        if ($password !== $confirmation) {
            $this->error('The passwords do not match.');

            return self::FAILURE;
        }

        $instructor = new User;
        $instructor->name = $name;
        $instructor->email = $email;
        $instructor->password = Hash::make($password);
        $instructor->role = 'instructor';
        $instructor->is_active = true;
        $instructor->save();

        $subject->instructor_id = $instructor->id;
        $subject->instructor_name = $instructor->name;
        $subject->save();

        $this->newLine();
        $this->info('Instructor account created successfully.');
        $this->line('Name: '.$instructor->name);
        $this->line('Email: '.$instructor->email);
        $this->line('Assigned subject: '.$subject->code.' - '.$subject->name);
        $this->line('Role: instructor');

        return self::SUCCESS;
    }
}
