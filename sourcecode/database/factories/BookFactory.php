<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $jabatan = $this->faker->randomElement(['doctor', 'cashier', 'customer service']);

        return [
            'nama_pegawai' => $this->faker->name,
            'kode_pegawai' => $this->faker->unique()->randomNumber(6),
            'jabatan' => $jabatan,
            'foto' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
