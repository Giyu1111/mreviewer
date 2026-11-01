
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->id();

            $table->foreignId('subject_id')
                ->constrained('subjects')
                ->cascadeOnDelete();

            $table->unsignedTinyInteger('lesson_number');
            $table->string('title');
            $table->longText('content')->nullable();

            // Uploaded lesson material
            $table->string('material_path')->nullable();
            $table->string('material_original_name')->nullable();
            $table->string('material_mime_type')->nullable();
            $table->unsignedBigInteger('material_size')->nullable();

            // Only published lessons are available to students
            $table->boolean('is_published')->default(false);

            $table->timestamps();

            $table->unique(
                ['subject_id', 'lesson_number'],
                'lessons_subject_number_unique'
            );
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('lessons');
    }
};
