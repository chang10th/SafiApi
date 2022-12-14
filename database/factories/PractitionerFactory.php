<?php

namespace Database\Factories;

use App\Models\Practitionerstate;
use App\Models\Sectordistrict;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Practitionner>
 */
class PractitionerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'lastname'=>$this->faker->lastName,
            'firstname'=>$this->faker->firstName,
            'city'=>$this->faker->city,
            'email'=>$this->faker->email,
            'address'=>$this->faker->streetAddress,
            'tel'=>$this->faker->phoneNumber,
            'notorietyCoeff'=>$this->faker->randomNumber(2),
            'complementarySpeciality'=>$this->faker->randomElement([null,null,'homéopathie','urgences','psychiatrie','pédiatrie','osthéopathie','médecine sportive','gérontologie','angéiologie','allergologie','acupuncture']),
            'registeredAppliMeetingOnline' => $this->faker->boolean(),
            'sectordistrict_id'=>Sectordistrict::inRandomOrder()->first()->id,
            'practitionerstate_id'=>Practitionerstate::inRandomOrder()->first()->id
        ];
    }
}
