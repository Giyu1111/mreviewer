<?php

namespace Database\Seeders;

use App\Models\Question;
use App\Models\QuestionOption;
use App\Models\Subject;
use Illuminate\Database\Seeder;

class SampleQuestionSeeder extends Seeder
{
    public function run(): void
    {
        $subject = Subject::where('slug', 'mathematics')->firstOrFail();

        $questions = [
            [
                'question' => 'What is 12 + 8?',
                'options' => [
                    '18' => false,
                    '20' => true,
                    '22' => false,
                    '24' => false,
                ],
                'explanation' => '12 + 8 = 20.',
            ],
            [
                'question' => 'What is 9 multiplied by 7?',
                'options' => [
                    '56' => false,
                    '63' => true,
                    '72' => false,
                    '81' => false,
                ],
                'explanation' => '9 multiplied by 7 equals 63.',
            ],
            [
                'question' => 'What is 45 divided by 5?',
                'options' => [
                    '8' => false,
                    '9' => true,
                    '10' => false,
                    '15' => false,
                ],
                'explanation' => '45 divided by 5 equals 9.',
            ],
            [
                'question' => 'If x + 4 = 10, what is the value of x?',
                'options' => [
                    '4' => false,
                    '5' => false,
                    '6' => true,
                    '7' => false,
                ],
                'explanation' => 'Subtract 4 from both sides: x = 10 - 4 = 6.',
            ],
            [
                'question' => 'A rectangle is 5 cm long and 3 cm wide. What is its area?',
                'options' => [
                    '8 cm²' => false,
                    '15 cm²' => true,
                    '16 cm²' => false,
                    '20 cm²' => false,
                ],
                'explanation' => 'Area = length × width = 5 × 3 = 15 cm².',
            ],
        ];

        foreach ($questions as $item) {
            $question = Question::updateOrCreate(
                [
                    'subject_id' => $subject->id,
                    'question_text' => $item['question'],
                ],
                [
                    'explanation' => $item['explanation'],
                    'difficulty' => 'easy',
                    'is_active' => true,
                ]
            );

            // Replace only the options belonging to these sample questions.
            QuestionOption::where('question_id', $question->id)->delete();

            $order = 1;

            foreach ($item['options'] as $text => $isCorrect) {
                QuestionOption::create([
                    'question_id' => $question->id,
                    'option_text' => $text,
                    'is_correct' => $isCorrect,
                    'sort_order' => $order++,
                ]);
            }
        }
    }
}
