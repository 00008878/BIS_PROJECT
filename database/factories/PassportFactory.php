<?php

namespace Database\Factories;

use App\Models\Passport;
use Illuminate\Database\Eloquent\Factories\Factory;

class PassportFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Passport::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'client_id' => $this->faker->unique()->randomNumber(2),
            'serial_number' => 'AB' . rand(1000000, 9999999),
            'pinfl' => rand(10000000000000, 99999999999999),
            'name' => $this->faker->firstName(),
            'surname' => $this->faker->lastName(),
            'birth_date' => $this->faker->date(),
            'gender' => $this->faker->randomElement(['F', 'M']),
            'issue_date' => $this->faker->date(),
            'expiry_date' => $this->faker->date(),
            'address' => $this->faker->address(),
            'region' => $this->faker->city(),
            'city_name' => $this->faker->city(),
            'nationality_name' => 'UZBEK',
            'type' => $this->faker->randomElement(['ID', 'PASSPORT']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
