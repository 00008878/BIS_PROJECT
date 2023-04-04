<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Client::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->unique()->randomNumber(2),
            'name' => $this->faker->firstName(),
            'surname' => $this->faker->lastName(),
            'phone' => $this->faker->phoneNumber(),
            'client_status' => 'NEW',
            'birthdate' => $this->faker->date(),
            'gender' => $this->faker->randomElement(['F', 'M']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
