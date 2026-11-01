<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('lessons', function (Blueprint $table) {
            if (! Schema::hasColumn('lessons', 'material_path')) {
                $table->string('material_path')->nullable();
            }

            if (! Schema::hasColumn('lessons', 'material_original_name')) {
                $table->string('material_original_name')->nullable();
            }

            if (! Schema::hasColumn('lessons', 'material_mime_type')) {
                $table->string('material_mime_type')->nullable();
            }

            if (! Schema::hasColumn('lessons', 'material_size')) {
                $table->unsignedBigInteger('material_size')->nullable();
            }
        });
    }

    public function down(): void
    {
        // Keep existing lesson materials safe during rollback.
    }
};
