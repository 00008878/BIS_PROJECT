<?php

namespace Database\Factories;

use App\Models\ServiceRequirement;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceRequirementFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ServiceRequirement::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'service_id' =>  $this->faker->unique()->randomNumber(2),
            'title' => $this->faker->randomElement([
                'PASSPORT',
                'TexPassport',
                'Consent of all owners',
                'Consent of the pledgee, if the property is under pledge',
                'Document confirming the authority of the representative',
                'Availability of information about the heir',
                'A document confirming that the composition of the inheritance belongs to the testator',
                'In case of death of heirs - a death certificate or an extract from the act record',
                'Document confirming the existence of marriage',
                'The decision of the khokim of the district',
                'Consent of guardianship and guardianship authorities',
            ]),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
