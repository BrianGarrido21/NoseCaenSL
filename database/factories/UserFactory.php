<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Country; // Se usará para generar el country_id
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    // Indica el modelo que se va a generar
    protected $model = User::class;

    public function definition()
    {
        return [
            'cif'               => $this->faker->unique()->regexify('[A-Z]\d{8}'),
            'name'              => $this->faker->name,
            'email'             => $this->faker->unique()->safeEmail,
            'credit_card'       => $this->faker->unique()->creditCardNumber(),
            'phone'             => $this->faker->phoneNumber,
            'address'           => $this->faker->address,
            'email_verified_at' => now(),
            // Se crea un registro en la tabla paises y se asigna su id
            'country_id' => function () {
                return Country::inRandomOrder()->value('id');

            },
            'currency_iso'      => 'ltl',
            'remember_token'    => Str::random(10),
        ];
    }
}
