<?php

namespace Tests\Feature\Http\Controllers;

use App\Shipment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\HttpTestAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ShipmentController
 */
class ShipmentControllerTest extends TestCase
{
    use HttpTestAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $shipments = factory(Shipment::class, 3)->create();

        $response = $this->get(route('shipment.index'));

        $response->assertOk();
        $response->assertViewIs('shipment.index');
        $response->assertViewHas('shipments');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('shipment.create'));

        $response->assertOk();
        $response->assertViewIs('shipment.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ShipmentController::class,
            'store',
            \App\Http\Requests\ShipmentStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $shipment = $this->faker->word;

        $response = $this->post(route('shipment.store'), [
            'shipment' => $shipment,
        ]);

        $shipments = Shipment::query()
            ->where('shipment', $shipment)
            ->get();
        $this->assertCount(1, $shipments);
        $shipment = $shipments->first();

        $response->assertRedirect(route('shipment.index'));
        $response->assertSessionHas('shipment.id', $shipment->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $shipment = factory(Shipment::class)->create();

        $response = $this->get(route('shipment.show', $shipment));

        $response->assertOk();
        $response->assertViewIs('shipment.show');
        $response->assertViewHas('shipment');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $shipment = factory(Shipment::class)->create();

        $response = $this->get(route('shipment.edit', $shipment));

        $response->assertOk();
        $response->assertViewIs('shipment.edit');
        $response->assertViewHas('shipment');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ShipmentController::class,
            'update',
            \App\Http\Requests\ShipmentUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $shipment = factory(Shipment::class)->create();
        $shipment = $this->faker->word;

        $response = $this->put(route('shipment.update', $shipment), [
            'shipment' => $shipment,
        ]);

        $response->assertRedirect(route('shipment.index'));
        $response->assertSessionHas('shipment.id', $shipment->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $shipment = factory(Shipment::class)->create();
        $shipment = factory(Shipment::class)->create();

        $response = $this->get(route('shipment.destroy', $shipment));

        $response->assertRedirect(route('shipment.index'));

        $this->assertDeleted($shipment);
    }
}
