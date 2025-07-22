<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\holiday_types;

class HolidayTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $holidayTypes = [
            ['name' => 'Public Holiday'],
            ['name' => 'Company Holiday'],
            ['name' => 'Religious Holiday'],
            ['name' => 'National Holiday'],
        ];

       
        foreach ($holidayTypes as $type) {
            holiday_types::create($type);
        }
    }
}
