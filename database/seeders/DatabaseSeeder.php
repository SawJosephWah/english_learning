<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Run each custom seeder in the correct order
        $this->call([
            UserSeeder::class,
            CategorySeeder::class,
            LessonSeeder::class,
            ExerciseSeeder::class,
        ]);
    }
}
