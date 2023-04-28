<?php

namespace Database\Seeders;

use App\Models\Shift;
use App\Models\Employee;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ShiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $employees = Employee::all();

        foreach ($employees as $employee) {
            $start_time = Carbon::parse('8:00am')->format('H:i:s');
            $end_time = Carbon::parse('4:00pm')->format('H:i:s');

            Shift::create([
                'employee_id' => $employee->id,
                'start_time' => $start_time,
                'end_time' => $end_time,
            ]);
        }
    }
}
