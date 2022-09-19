<?php

namespace Database\Factories;

use App\Domain\Product\Model\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        static $number = 000001;
        return [
            'sku' => $number++,
            'name' => $this->faker->word(),
            'category' => $this->faker->word(),
            'price' => $this->faker->randomFloat(2)
        ];
    }

}
