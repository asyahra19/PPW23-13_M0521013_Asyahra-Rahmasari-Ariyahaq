<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
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
