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

        // Root question
        $question1Id = DB::table('exercises')->insertGetId([
            'content' => 'Welcome! What can I get you?',
            'parent_id' => null,
            'lesson_id' => 1,
            'created_by' => 1,
            'updated_by' => 1,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        // Answer 1a
        $answer1aId = DB::table('exercises')->insertGetId([
            'content' => 'Can I see the menu, please?',
            'parent_id' => $question1Id,
            'lesson_id' => 1,
            'created_by' => 1,
            'updated_by' => 1,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        // Answer 1b
        $answer1bId = DB::table('exercises')->insertGetId([
            'content' => "What are today's specials?",
            'parent_id' => $question1Id,
            'lesson_id' => 1,
            'created_by' => 1,
            'updated_by' => 1,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        // Question 2 (parent = answer 1a)
        $question2Id = DB::table('exercises')->insertGetId([
            'content' => 'Here is the menu. Would you like a drink?',
            'parent_id' => $answer1aId,
            'lesson_id' => 1,
            'created_by' => 1,
            'updated_by' => 1,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        // Answer 2a
        DB::table('exercises')->insert([
            'content' => "Yes, I'll have a Coke.",
            'parent_id' => $question2Id,
            'lesson_id' => 1,
            'created_by' => 1,
            'updated_by' => 1,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        // Answer 2b
        DB::table('exercises')->insert([
            'content' => "No, thank you.",
            'parent_id' => $question2Id,
            'lesson_id' => 1,
            'created_by' => 1,
            'updated_by' => 1,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        // Question 3 (parent = answer 1b)
        $question3Id = DB::table('exercises')->insertGetId([
            'content' => 'We have grilled salmon and steak.',
            'parent_id' => $answer1bId,
            'lesson_id' => 1,
            'created_by' => 1,
            'updated_by' => 1,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        // Answer 3a
        DB::table('exercises')->insert([
            'content' => "I’ll have the salmon.",
            'parent_id' => $question3Id,
            'lesson_id' => 1,
            'created_by' => 1,
            'updated_by' => 1,
            'created_at' => $now,
            'updated_at' => $now,
        ]);

        // Answer 3b
        DB::table('exercises')->insert([
            'content' => "I’ll have the steak.",
            'parent_id' => $question3Id,
            'lesson_id' => 1,
            'created_by' => 1,
            'updated_by' => 1,
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}
