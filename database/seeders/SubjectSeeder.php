<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Seeder;

class SubjectSeeder extends Seeder
{
    public function run(): void
    {
        $subjects = [
            [
                'code' => 'GE RIZAL',
                'section' => 'BSIT 4D',
                'name' => 'The Life and Works of Rizal',
                'slug' => 'ge-rizal',
                'description' => 'Study the life, works, and legacy of Dr. Jose Rizal.',
                'schedule' => null,
                'lecture_hours' => 3.0,
                'lab_hours' => 0.0,
                'units' => 3.0,
                'instructor_name' => 'PAMUGAS, JASTINE',
                'icon' => '📚',
            ],
            [
                'code' => 'IT 411',
                'section' => 'BSIT 4D',
                'name' => 'Capstone Project and Research 2',
                'slug' => 'it-411',
                'description' => 'Continue the development and research of your capstone project.',
                'schedule' => null,
                'lecture_hours' => 2.0,
                'lab_hours' => 1.0,
                'units' => 3.0,
                'instructor_name' => 'OLAGUIR, SHELLA, C.',
                'icon' => '💻',
            ],
            [
                'code' => 'IT 412',
                'section' => 'BSIT 4D',
                'name' => 'System Integration and Architecture 1',
                'slug' => 'it-412',
                'description' => 'Review system architecture, integration, and related concepts.',
                'schedule' => null,
                'lecture_hours' => 2.0,
                'lab_hours' => 1.0,
                'units' => 3.0,
                'instructor_name' => 'CEMPRON, REYMOND, B.',
                'icon' => '🏗️',
            ],
            [
                'code' => 'IT 413',
                'section' => 'BSIT 4D',
                'name' => 'System Administration and Maintenance',
                'slug' => 'it-413',
                'description' => 'Review system administration, troubleshooting, and maintenance.',
                'schedule' => null,
                'lecture_hours' => 2.0,
                'lab_hours' => 1.0,
                'units' => 3.0,
                'instructor_name' => 'PEQUIT, JOSEPH, M.',
                'icon' => '⚙️',
            ],
            [
                'code' => 'PROF ELEC 3',
                'section' => 'BSIT 4D',
                'name' => 'Enterprise Resource Planning',
                'slug' => 'prof-elec-3',
                'description' => 'Learn how enterprise resource planning systems support business operations.',
                'schedule' => null,
                'lecture_hours' => 2.0,
                'lab_hours' => 1.0,
                'units' => 3.0,
                'instructor_name' => 'UY, SASHA ISABELA',
                'icon' => '📊',
            ],
        ];

        foreach ($subjects as $subject) {
            Subject::updateOrCreate(
                ['slug' => $subject['slug']],
                array_merge($subject, [
                    'is_active' => true,
                    'instructor_id' => null,
                ])
            );
        }

        // Hide the old placeholder categories without deleting records.
        Subject::whereIn('slug', [
            'general-knowledge',
            'mathematics',
            'science',
            'english',
            'logical-reasoning',
            'practice-quizzes',
        ])->update(['is_active' => false]);
    }
}
