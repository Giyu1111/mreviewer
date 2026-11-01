
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('quiz_attempt_answers', function (Blueprint $table) {
            $table->id();

            $table->foreignId('quiz_attempt_id')
                ->constrained('quiz_attempts')
                ->cascadeOnDelete();

            $table->foreignId('question_id')
                ->constrained('questions')
                ->cascadeOnDelete();

            $table->foreignId('selected_option_id')
                ->nullable()
                ->constrained('question_options')
                ->nullOnDelete();

            // Preserve each question's randomized option order.
            $table->json('option_order')->nullable();

            $table->unsignedSmallInteger('question_order');
            $table->boolean('is_correct')->nullable();
            $table->timestamp('answered_at')->nullable();

            $table->timestamps();

            $table->unique(
                ['quiz_attempt_id', 'question_id'],
                'attempt_question_unique'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('quiz_attempt_answers');
    }
};
