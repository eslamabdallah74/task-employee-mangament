<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as FakerFactory;
use \App\Models\Employee;
class EmployeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = FakerFactory::create();

        for ($i = 0; $i < 10; $i++) {
            $employee = new Employee();
            $employee->name = $faker->name;
            $employee->job_id = $faker->randomNumber(1, 10);
            $employee->image = $faker->image(public_path('images'), 400, 300, null, false);
            $employee->starting_date = $faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d');
            $employee->save();
        }
    }
}
