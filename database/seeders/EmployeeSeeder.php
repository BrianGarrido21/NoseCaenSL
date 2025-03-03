<?php

namespace Database\Seeders;

use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Employee::create([
            'dni' => fake()->unique()->numerify('########') . strtoupper(fake()->randomLetter()),
            'name' => 'Chema Gaitan',
            'email' => 'chemagaitan@gmail.com',
            'phone' => fake()->unique()->phoneNumber(),
            'address' => fake()->address(),
            'password' => bcrypt('password'),
        ]);
        $admin->assignRole('administrator');
        //Employee::factory()->count(9)->create();
    }
}
