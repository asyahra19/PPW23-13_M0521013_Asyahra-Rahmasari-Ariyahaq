<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PetBoarding>
 */
class PetBoardingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $doctorId = Employee::where('jabatan', 'doctor')->pluck('id')->random();

        return [
            'user_id' => User::factory(),
            'pet_name' => $this->faker->name,
            'pet_age' => $this->faker->numberBetween(1, 30),
            'dokter' => $doctorId,
            'entry_date' => $this->faker->date(),
            'exit_date' => $this->faker->optional()->date(),
            'file' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
