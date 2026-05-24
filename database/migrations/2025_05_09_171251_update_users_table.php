<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (! Schema::hasColumn('users', 'lesson_progress')) {
            Schema::table('users', function (Blueprint $table) {
                $table->unsignedInteger('lesson_progress')->default(0)->after('email');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('users', 'lesson_progress')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('lesson_progress');
            });
        }
    }
};
