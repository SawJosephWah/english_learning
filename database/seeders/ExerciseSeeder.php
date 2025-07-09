<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ExerciseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        $lessonId = DB::table('lessons')->where('name', 'Ordering Food at a Restaurant')->value('id');

        // Question 1
        $q1 = DB::table('exercises')->insertGetId([
            'content' => 'Welcome! What can I get you?',
            'parent_id' => null,
            'lesson_id' => $lessonId,
            'created_by' => 1,
            'updated_by' => 1,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        // Answer 1a
        $a1a = DB::table('exercises')->insertGetId([
            'content' => 'Can I see the menu, please?',
            'parent_id' => $q1,
            'lesson_id' => $lessonId,
            'created_by' => 1,
            'updated_by' => 1,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        // Answer 1b
        $a1b = DB::table('exercises')->insertGetId([
            'content' => "What are today's specials?",
            'parent_id' => $q1,
            'lesson_id' => $lessonId,
            'created_by' => 1,
            'updated_by' => 1,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        // Question 2 (child of answer 1a)
        $q2 = DB::table('exercises')->insertGetId([
            'content' => 'Here is the menu. Would you like a drink?',
            'parent_id' => $a1a,
            'lesson_id' => $lessonId,
            'created_by' => 1,
            'updated_by' => 1,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('exercises')->insert([
            [
                'content' => "Yes, I'll have a Coke.",
                'parent_id' => $q2,
                'lesson_id' => $lessonId,
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'content' => "No, thank you.",
                'parent_id' => $q2,
                'lesson_id' => $lessonId,
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ]
        ]);

        // Question 3 (child of answer 1b)
        $q3 = DB::table('exercises')->insertGetId([
            'content' => 'We have grilled salmon and steak.',
            'parent_id' => $a1b,
            'lesson_id' => $lessonId,
            'created_by' => 1,
            'updated_by' => 1,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        DB::table('exercises')->insert([
            [
                'content' => "I’ll have the salmon.",
                'parent_id' => $q3,
                'lesson_id' => $lessonId,
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'content' => "I’ll have the steak.",
                'parent_id' => $q3,
                'lesson_id' => $lessonId,
                'created_by' => 1,
                'updated_by' => 1,
                'created_at' => $now,
                'updated_at' => $now,
            ]
        ]);
    }
}
