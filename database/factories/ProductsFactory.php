<?php

namespace Database\Factories;

use App\Models\Categories;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Products>
 */
class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' =>$this->faker->word(),
            'img' =>$this->faker->imageUrl(),
            'price' =>$this->faker->randomFloat(2, 10, 100),
            'description' =>$this->faker->sentence(),
            'category_id' =>Categories::inRandomOrder()->first()->id
        ];
    }
}