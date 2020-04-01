<?php

namespace Tests\Feature\Http\Controllers;

use App\Shippingcarrier;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\HttpTestAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ShippingCarrierController
 */
class ShippingCarrierControllerTest extends TestCase
{
    use HttpTestAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $shippingCarriers = factory(ShippingCarrier::class, 3)->create();

        $response = $this->get(route('shippingcarrier.index'));

        $response->assertOk();
        $response->assertViewIs('shippingcarrier.index');
        $response->assertViewHas('shippingcarriers');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('shippingcarrier.create'));

        $response->assertOk();
        $response->assertViewIs('shippingcarrier.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ShippingCarrierController::class,
            'store',
            \App\Http\Requests\ShippingCarrierStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $shippingcarrier = $this->faker->word;

        $response = $this->post(route('shippingcarrier.store'), [
            'shippingcarrier' => $shippingcarrier,
        ]);

        $shippingCarriers = Shippingcarrier::query()
            ->where('shippingcarrier', $shippingcarrier)
            ->get();
        $this->assertCount(1, $shippingCarriers);
        $shippingCarrier = $shippingCarriers->first();

        $response->assertRedirect(route('shippingcarrier.index'));
        $response->assertSessionHas('shippingcarrier.id', $shippingcarrier->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $shippingCarrier = factory(ShippingCarrier::class)->create();

        $response = $this->get(route('shippingcarrier.show', $shippingCarrier));

        $response->assertOk();
        $response->assertViewIs('shippingcarrier.show');
        $response->assertViewHas('shippingcarrier');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $shippingCarrier = factory(ShippingCarrier::class)->create();

        $response = $this->get(route('shippingcarrier.edit', $shippingCarrier));

        $response->assertOk();
        $response->assertViewIs('shippingcarrier.edit');
        $response->assertViewHas('shippingcarrier');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ShippingCarrierController::class,
            'update',
            \App\Http\Requests\ShippingCarrierUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $shippingCarrier = factory(ShippingCarrier::class)->create();
        $shippingcarrier = $this->faker->word;

        $response = $this->put(route('shippingcarrier.update', $shippingCarrier), [
            'shippingcarrier' => $shippingcarrier,
        ]);

        $response->assertRedirect(route('shippingcarrier.index'));
        $response->assertSessionHas('shippingcarrier.id', $shippingcarrier->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $shippingCarrier = factory(ShippingCarrier::class)->create();
        $shippingCarrier = factory(Shippingcarrier::class)->create();

        $response = $this->get(route('shippingcarrier.destroy', $shippingCarrier));

        $response->assertRedirect(route('shippingcarrier.index'));

        $this->assertDeleted($shippingCarrier);
    }
}
