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
        Schema::table('users', function (Blueprint $table) {
            if (! Schema::hasColumn('users', 'ads_to_play')) {
                $table->unsignedInteger('ads_to_play')->default(0)->after('password');
            }

            if (! Schema::hasColumn('users', 'points')) {
                $table->integer('points')->default(10000)->after('ads_to_play');
            }

            if (! Schema::hasColumn('users', 'authcreatetype')) {
                $table->string('authcreatetype', 20)->default('local')->after('points');
            }

            if (! Schema::hasColumn('users', 'referral_code')) {
                $table->string('referral_code', 20)->nullable()->unique()->after('authcreatetype');
            }

            if (! Schema::hasColumn('users', 'referrer')) {
                $table->string('referrer', 20)->nullable()->index()->after('referral_code');
            }

            if (! Schema::hasColumn('users', 'referral_points')) {
                $table->integer('referral_points')->default(0)->after('referrer');
            }
        });

        Schema::table('questions_and_answers', function (Blueprint $table) {
            if (! Schema::hasColumn('questions_and_answers', 'answer')) {
                $table->string('answer')->nullable()->after('question');
            }

            if (! Schema::hasColumn('questions_and_answers', 'lesson_video')) {
                $table->string('lesson_video')->nullable()->after('material_title');
            }
        });

        if (! Schema::hasTable('waitlist_emails')) {
            Schema::create('waitlist_emails', function (Blueprint $table) {
                $table->id();
                $table->string('emails')->unique();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasTable('waitlist_emails')) {
            Schema::dropIfExists('waitlist_emails');
        }

        Schema::table('questions_and_answers', function (Blueprint $table) {
            if (Schema::hasColumn('questions_and_answers', 'lesson_video')) {
                $table->dropColumn('lesson_video');
            }

            if (Schema::hasColumn('questions_and_answers', 'answer')) {
                $table->dropColumn('answer');
            }
        });

        Schema::table('users', function (Blueprint $table) {
            foreach ([
                'referral_points',
                'referrer',
                'referral_code',
                'authcreatetype',
                'points',
                'ads_to_play',
            ] as $column) {
                if (Schema::hasColumn('users', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};
