<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EventType;

class EventTypeSeeder extends Seeder
{
    public function run(): void
    {
        $types = [
            'Full Day',
            'Half Day',
            'Few Hours',
        ];

        foreach ($types as $type) {
            EventType::firstOrCreate(['name' => $type]);
        }
    }
}
