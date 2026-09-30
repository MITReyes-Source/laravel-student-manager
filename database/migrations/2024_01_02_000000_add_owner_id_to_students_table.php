<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// USE THIS ONE INSTEAD of the "create_students_table" migration if your Lesson 3
// students table already exists and just needs an owner column added.
// Delete/skip this file if you're using the fresh create_students_table migration above.
return new class extends Migration
{
    public function up(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->foreignId('owner_id')->nullable()->after('id')->constrained('users')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropConstrainedForeignId('owner_id');
        });
    }
};
