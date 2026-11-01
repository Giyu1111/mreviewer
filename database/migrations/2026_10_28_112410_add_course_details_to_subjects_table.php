<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('subjects', function (Blueprint $table) {
            $table->string('code')->nullable()->unique();
            $table->string('section')->default('BSIT 4D');
            $table->string('schedule')->nullable();
            $table->decimal('lecture_hours', 4, 1)->default(0);
            $table->decimal('lab_hours', 4, 1)->default(0);
            $table->decimal('units', 4, 1)->default(0);

            $table->foreignId('instructor_id')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('subjects', function (Blueprint $table) {
            $table->dropConstrainedForeignId('instructor_id');
            $table->dropUnique(['code']);

            $table->dropColumn([
                'code',
                'section',
                'schedule',
                'lecture_hours',
                'lab_hours',
                'units',
            ]);
        });
    }
};
