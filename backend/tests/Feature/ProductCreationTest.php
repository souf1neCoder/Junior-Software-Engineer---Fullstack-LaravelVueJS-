<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductCreationTest extends TestCase
{
    use RefreshDatabase,WithFaker;

    /**
     * A basic feature test example.
     */
    public function test_product_creation(): void
    {
        $data = [
            'name' => $this->faker->name,
            'description' => $this->faker->paragraph,
            'price' => $this->faker->randomFloat(2, 10, 100),
            'categories' => [1, 3],
        ];

        $response = $this->post('/api/products', $data);

        $response->assertStatus(200);

        $this->assertDatabaseHas('products', [
            'name' => $data['name'],
        ]);
    }
}
