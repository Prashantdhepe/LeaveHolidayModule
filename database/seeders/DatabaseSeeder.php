<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
       $this->call([
            EventTypeSeeder::class,
            ExamTypeSeeder::class,
            HolidayTypeSeeder::class,
            LeaveTypeSeeder::class,
            StandardSeeder::class,
            SubjectSeeder::class,
            HolidaySeeder::class,
            LeaveSeeder::class,
            QuestionTypeSeeder::class,
            SubjectChapterTopicSeeder::class
       ]);
    }
}
