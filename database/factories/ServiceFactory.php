<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Service::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category' => $this->faker->randomElement([
                'Deals',
                'Wills and Inheritance',
                'Statements',
                'Powers of Attorney',
            ]),
            'type' => $this->faker->randomElement([
                'Contract for the sale of motor vehicles',
                'Vehicle donation agreement',
                'Contract for the sale of real estate',
                'Will',
                'Certificate of right to inheritance by law',
                'Statement of consent of the spouse to the transaction',
                'Application for the cancellation of a power of attorney (Certification of the authenticity of a signature on documents)',
                'Power of attorney to drive and (or) dispose of a motor vehicle',
                'Power of attorney to receive pensions and benefits',
            ]),
            'price' => rand(110000, 5900000),
            'two_sided' => rand(0, 1),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
