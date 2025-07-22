<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\leave_types;

class LeaveTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $leaveTypes = [
            ['name' => 'Sick Leave', 'allowed_per_year' => 12],
            ['name' => 'Casual Leave', 'allowed_per_year' => 8],
            ['name' => 'Annual Leave', 'allowed_per_year' => 20],
            ['name' => 'Maternity Leave', 'allowed_per_year' => 90],
            ['name' => 'Paternity Leave', 'allowed_per_year' => 15],
        ];

        foreach ($leaveTypes as $type) {
            leave_types::create($type);
        }
    }
}
