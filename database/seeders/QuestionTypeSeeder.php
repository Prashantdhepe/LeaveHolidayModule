<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Question_Type;

class QuestionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            ['name' => 'Multiple Choice'],
            ['name' => 'True/False'],
            ['name' => 'Short Answer'],
            ['name' => 'Fill in the Blanks'],
            ['name' => 'Single Choice']
        ];

        foreach ($types as $type) {
            Question_Type::create($type);
        }
    }
}
