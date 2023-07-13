<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;
use App\Models\Book;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Borrower>
 */
class BorrowerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $doctorId = Book::where('jabatan', 'doctor')->pluck('id')->random();

        return [
            'user_id' => User::factory(),
            'pet_name' => $this->faker->name,
            'pet_age' => $this->faker->numberBetween(1, 10),
            'dokter' => $doctorId,
            'entry_date' => $this->faker->date(),
            'exit_date' => $this->faker->optional()->date(),
            'file' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}