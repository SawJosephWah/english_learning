<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class LessonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        // Use the first category's ID (assumes it exists)
        $categoryId = DB::table('categories')->where('name', 'Restaurant Conversations')->value('id');

        DB::table('lessons')->insert([
            'name' => 'Ordering Food at a Restaurant',
            'sort_order' => 1,
            'category_id' => $categoryId,
            'created_by' => 1,
            'updated_by' => 1,
            'created_at' => $now,
            'updated_at' => $now,
        ]);
    }
}
