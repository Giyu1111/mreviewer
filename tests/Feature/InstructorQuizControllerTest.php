<?php

namespace Tests\Feature;

use App\Models\Lesson;
use App\Models\Question;
use App\Models\QuestionOption;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Foundation\Testing\LazilyRefreshDatabase;
use Tests\TestCase;

class InstructorQuizControllerTest extends TestCase
{
    use LazilyRefreshDatabase;

    public function test_instructor_creates_a_lesson_quiz_question(): void
    {
        [$instructor, $lesson] = $this->createInstructorLesson();

        $response = $this->actingAs($instructor)->post(
            route('instructor.lessons.quiz.store', $lesson),
            [
                'question_text' => 'Who wrote Noli Me Tangere?',
                'explanation' => 'José Rizal wrote the novel.',
                'difficulty' => 'easy',
                'options' => [
                    ['text' => 'José Rizal'],
                    ['text' => 'Andrés Bonifacio'],
                    ['text' => 'Emilio Aguinaldo'],
                    ['text' => 'Apolinario Mabini'],
                ],
                'correct_option' => 0,
            ]
        );

        $response->assertRedirect();
        $this->assertDatabaseHas('questions', [
            'lesson_id' => $lesson->id,
            'question_text' => 'Who wrote Noli Me Tangere?',
        ]);
        $this->assertDatabaseHas('question_options', [
            'option_text' => 'José Rizal',
            'is_correct' => true,
        ]);
    }

    public function test_student_starts_a_quiz_after_instructor_creates_ten_questions(): void
    {
        [, $lesson] = $this->createInstructorLesson();
        $student = $this->createUser('student');

        foreach (range(1, 10) as $number) {
            $question = Question::query()->create([
                'subject_id' => $lesson->subject_id,
                'lesson_id' => $lesson->id,
                'question_text' => "Question {$number}",
                'difficulty' => 'medium',
                'is_active' => true,
            ]);

            foreach (range(1, 4) as $optionNumber) {
                QuestionOption::query()->create([
                    'question_id' => $question->id,
                    'option_text' => "Option {$optionNumber}",
                    'is_correct' => $optionNumber === 1,
                    'sort_order' => $optionNumber,
                ]);
            }
        }

        $response = $this->actingAs($student)->post(route('quiz.start', [
            'slug' => $lesson->subject->slug,
            'lessonNumber' => $lesson->lesson_number,
        ]));

        $response->assertRedirect();
        $this->assertDatabaseHas('quiz_attempts', [
            'user_id' => $student->id,
            'lesson_id' => $lesson->id,
            'total_questions' => 10,
        ]);
        $this->assertDatabaseCount('quiz_attempt_answers', 10);
    }

    /** @return array{User, Lesson} */
    private function createInstructorLesson(): array
    {
        $instructor = $this->createUser('instructor');
        $subject = Subject::query()->create([
            'name' => 'Life and Works of Rizal',
            'slug' => 'life-and-works-of-rizal',
            'code' => 'GE RIZAL',
            'instructor_id' => $instructor->id,
        ]);
        $lesson = Lesson::query()->create([
            'subject_id' => $subject->id,
            'lesson_number' => 1,
            'title' => 'Understanding Rizal Law',
            'is_published' => true,
        ]);

        return [$instructor, $lesson];
    }

    private function createUser(string $role): User
    {
        $user = User::factory()->create();
        $user->forceFill(['role' => $role])->save();

        return $user;
    }
}
