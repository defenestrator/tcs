<?php

namespace Tests\Feature\Http\Controllers;

use App\Cart;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\HttpTestAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\CartController
 */
class CartControllerTest extends TestCase
{
    use HttpTestAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $carts = factory(Cart::class, 3)->create();

        $response = $this->get(route('cart.index'));

        $response->assertOk();
        $response->assertViewIs('cart.index');
        $response->assertViewHas('carts');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('cart.create'));

        $response->assertOk();
        $response->assertViewIs('cart.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\CartController::class,
            'store',
            \App\Http\Requests\CartStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $cart = $this->faker->word;

        $response = $this->post(route('cart.store'), [
            'cart' => $cart,
        ]);

        $carts = Cart::query()
            ->where('cart', $cart)
            ->get();
        $this->assertCount(1, $carts);
        $cart = $carts->first();

        $response->assertRedirect(route('cart.index'));
        $response->assertSessionHas('cart.id', $cart->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $cart = factory(Cart::class)->create();

        $response = $this->get(route('cart.show', $cart));

        $response->assertOk();
        $response->assertViewIs('cart.show');
        $response->assertViewHas('cart');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $cart = factory(Cart::class)->create();

        $response = $this->get(route('cart.edit', $cart));

        $response->assertOk();
        $response->assertViewIs('cart.edit');
        $response->assertViewHas('cart');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\CartController::class,
            'update',
            \App\Http\Requests\CartUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $cart = factory(Cart::class)->create();
        $cart = $this->faker->word;

        $response = $this->put(route('cart.update', $cart), [
            'cart' => $cart,
        ]);

        $response->assertRedirect(route('cart.index'));
        $response->assertSessionHas('cart.id', $cart->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $cart = factory(Cart::class)->create();
        $cart = factory(Cart::class)->create();

        $response = $this->get(route('cart.destroy', $cart));

        $response->assertRedirect(route('cart.index'));

        $this->assertDeleted($cart);
    }
}
