<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement(['Toyota Camry', 'Ford Mustang', 'BMW 3 Series', 'Chevrolet Corvette', 'Honda Accord']),
            'brand' => $this->faker->randomElement(['Toyota', 'Ford', 'BMW', 'Chevrolet', 'Honda']),
            'colour' => $this->faker->colorName,
            'plat_num' => $this->faker->unique()->regexify('[A-Z0-9]{6}'),
            'capacity' => $this->faker->numberBetween(2, 8),
            'fuel' => $this->faker->randomElement(['Gasoline', 'Diesel']),
            'price' => $this->faker->numberBetween(50, 200),
            'car_img' => '1703436206_Kia_Sportage_Fwd.png',
        ];
    }
}
