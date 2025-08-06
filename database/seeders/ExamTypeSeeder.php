<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ExamType;

class ExamTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $types = [
            ['name' => 'Unit Test'],
            ['name' => 'Mid Exam'],
            ['name' => 'Final Exam'],
        ];

        foreach ($types as $type) {
            $input = [
                'name' => $type['name']
            ];
            ExamType::create($input);
        }
    }
}
