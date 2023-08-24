<?php

namespace Database\Factories;

use App\Models\BijiKopi;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BijiKopi>
 */
class BijiKopiFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BijiKopi::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => fake()->numberBetween(1, 1000),
            'nama_biji_kopi' => fake()->city(),
            'aroma_id' => fake()->numberBetween(1, 5),
            'warna_id' => fake()->numberBetween(1, 5),
            'fisik_id' => fake()->numberBetween(1, 5),
            'kadar_air_id' => fake()->numberBetween(1, 5)

        ];
    }
}
