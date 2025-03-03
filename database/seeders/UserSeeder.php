<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'cif'               => "H01471671",
            'name'              => "Brian Garrido",
            'email'             => 'briangarrido@gmail.com',
            'credit_card'       => fake()->unique()->creditCardNumber(),
            'phone'             => '698972949',
            'address'           => "C/Artesanos",
            'email_verified_at' => now(),

            'currency_iso'      => fake()->currencyCode, // Se usa currency_iso en lugar de currency_id
        ]);
        //User::factory()->count(9)->create();
    }
}
