<?php

namespace Tests\Feature\Http\Controllers;

use App\Shippingaddress;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\HttpTestAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ShippingAddressController
 */
class ShippingAddressControllerTest extends TestCase
{
    use HttpTestAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $shippingAddresses = factory(ShippingAddress::class, 3)->create();

        $response = $this->get(route('shippingaddress.index'));

        $response->assertOk();
        $response->assertViewIs('shippingaddress.index');
        $response->assertViewHas('shippingaddresses');
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('shippingaddress.create'));

        $response->assertOk();
        $response->assertViewIs('shippingaddress.create');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ShippingAddressController::class,
            'store',
            \App\Http\Requests\ShippingAddressStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $shippingaddress = $this->faker->word;

        $response = $this->post(route('shippingaddress.store'), [
            'shippingaddress' => $shippingaddress,
        ]);

        $shippingAddresses = Shippingaddress::query()
            ->where('shippingaddress', $shippingaddress)
            ->get();
        $this->assertCount(1, $shippingAddresses);
        $shippingAddress = $shippingAddresses->first();

        $response->assertRedirect(route('shippingaddress.index'));
        $response->assertSessionHas('shippingaddress.id', $shippingaddress->id);
    }


    /**
     * @test
     */
    public function show_displays_view()
    {
        $shippingAddress = factory(ShippingAddress::class)->create();

        $response = $this->get(route('shippingaddress.show', $shippingAddress));

        $response->assertOk();
        $response->assertViewIs('shippingaddress.show');
        $response->assertViewHas('shippingaddress');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $shippingAddress = factory(ShippingAddress::class)->create();

        $response = $this->get(route('shippingaddress.edit', $shippingAddress));

        $response->assertOk();
        $response->assertViewIs('shippingaddress.edit');
        $response->assertViewHas('shippingaddress');
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\ShippingAddressController::class,
            'update',
            \App\Http\Requests\ShippingAddressUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $shippingAddress = factory(ShippingAddress::class)->create();
        $shippingaddress = $this->faker->word;

        $response = $this->put(route('shippingaddress.update', $shippingAddress), [
            'shippingaddress' => $shippingaddress,
        ]);

        $response->assertRedirect(route('shippingaddress.index'));
        $response->assertSessionHas('shippingaddress.id', $shippingaddress->id);
    }


    /**
     * @test
     */
    public function destroy_deletes_and_redirects()
    {
        $shippingAddress = factory(ShippingAddress::class)->create();
        $shippingAddress = factory(Shippingaddress::class)->create();

        $response = $this->get(route('shippingaddress.destroy', $shippingAddress));

        $response->assertRedirect(route('shippingaddress.index'));

        $this->assertDeleted($shippingAddress);
    }
}
