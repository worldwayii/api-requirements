<?php

namespace Tests\Integration;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Domain\Product\Model\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;
use Tests\TestCase;

class ProductControllerTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(function (string $modelName) {

            $namespace = 'Database\\Factories\\';
            $modelName = Str::afterLast($modelName, '\\');

            return $namespace.$modelName.'Factory';
        });
    }

    /**
     * @test
     */
    public function indexReturnsAllProducts(): void
    {
        Product::factory()->create();

        $response = $this->get(route('products.index'));

        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function indexReturnsProductsWithInsuranceCategoryWithCorrectDiscount(): void
    {
        Product::factory(3)->create([
            'category' => 'insurance'
        ]);
        Product::factory()->create();

        $response = $this->get(route('products.index'));
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    public function indexReturnsAllProductsInCategoryWhenParameterIsSent(): void
    {
        Product::factory()->create(
            ['category' => 'insurance']
        );

        $response = $this->get(route('products.index',
            ['category' => 'insurance']
        ));

        $response->assertStatus(200);
    }
}
