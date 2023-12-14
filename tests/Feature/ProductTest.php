<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Product;

class ProductTest extends TestCase
{
    use DatabaseMigrations;
    /**
     * @return void
     * 
     * @test
     */
    public function user_can_browse_products()
    {
        $response = $this->get('/products');
        $response->assertStatus(200);
    }

    /**
    * @test
    */
    public function user_can_show_one_product()
    {
        $product = Product::factory()->create();
        $this->get('/product/' . $product->slug)
            ->assertSee($product->description)
            ->assertSee($product->price);
    }

    



}
